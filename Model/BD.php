<?php


$connect = new PDO("mysql:host=localhost;dbname=evento", "root", "");
$connect->exec("set names utf8");

class basedatos
{
	public $Servidor = "mysql:host=localhost";
	public $Sesion = "root";
	public $Contrasena = "";
	public $Instancia = "evento";
	public $Conexion; //Mantiene la conexión con la base de datos
	public $Lectura; //Mantiene el puntero de consulta de la tabla

	public $errorAdicionar; //En caso de error al adicionar registro, este tendrá el código de error.
	public $errorActualizar; //En caso de error al actualizar registro, este tendrá el código de error.
	public $errorBorrar; //En caso de error al borrar registro, este tendrá el código de error.

	public function Conectar()
	{
		if (isset($this->Conexion)) return true; //Si ya está definida la conexión
		try {
			//Usando PDO (PHP Data Objects) para conectarse.
			//Parámetros: "mysql:host:servidor;dbname=instancia", "usuario", "contraseña", codificación de caracteres

			//$Conexion será un Database Handle(manejador de la base de datos)
			$this->Conexion = new PDO($this->Servidor . ";dbname=" . $this->Instancia, $this->Sesion, $this->Contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$this->Conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $UnError) {
			echo $UnError->getMessage();
			return false;
		}
		return true;
	}

	public function TraeTodosLosRegistros($SQL)
	{
		$this->Conectar();
		$Sentencia = $this->Conexion->prepare($SQL);
		$Sentencia->execute(); //Ejecuta la consulta 
		//Trae los resultados de la consulta dentro de un arreglo
		//¡OJO! los trae todos. Use LIMIT en la sentencia SQL para traer lotes
		return $Sentencia->fetchAll();
	}

	public function PrepararLectura($SQL)
	{
		$this->Conectar();
		$this->Lectura = $this->Conexion->prepare($SQL);
		$this->Lectura->execute(); //Ejecuta la consulta
	}

	public function TraeRegistroARegistro()
	{
		return $this->Lectura->fetch();
	}

	public function TotalRegistros($Tabla)
	{
		$this->Conectar();
		$Sentencia = $this->Conexion->prepare("SELECT TABLE_ROWS FROM information_schema.TABLES WHERE TABLES.TABLE_SCHEMA = '" . $this->Instancia . "' AND TABLE_NAME = '" . $Tabla . "'");
		$Sentencia->execute(); //Ejecuta la consulta
		return $Sentencia->fetchColumn();
	}

	//Borra un registro dado el valor de la llave, los parámetros son:
	//tabla, campo llave primaria, valor llave primaria
	public function BorrarRegistro($tabla, $where)
	{
		$this->Conectar();
		$SQL = "DELETE FROM " . $tabla . " WHERE " . $where;
		$Sentencia = $this->Conexion->prepare($SQL); //Prepara el borrado

		try {
			$Sentencia->execute();  //Ejecuta el borrado
			return true;
		} catch (Exception $e) {
			$this->errorBorrar = implode(" | ", $Sentencia->errorinfo());
			return false;
		}
	}

	//Adiciona un registro. Estos son los parámetros:
	//Tabla, listado de campos, valores de esos campos
	public function AdicionarRegistro($tabla, $Campos, $Valores)
	{
		$this->Conectar();

		$cadCampos = '';
		$cadParam = '';
		for ($cont = 0; $cont < count($Campos); $cont++) {
			$cadCampos .= $Campos[$cont] . ",";
			$cadParam  .= "?,";
		}
		$cadCampos = substr($cadCampos, 0, -1); //quitar la última coma
		$cadParam = substr($cadParam, 0, -1); //quitar la última coma
		$SQL = "INSERT INTO " . $tabla . "(" . $cadCampos . ") values(" . $cadParam . ")";

		$Sentencia = $this->Conexion->prepare($SQL); //Prepara la adición

		//Pone los valores
		for ($cont = 0; $cont < count($Valores); $cont++) {
			$Sentencia->bindValue($cont + 1, $Valores[$cont]);
		}

		try {
			$Sentencia->execute();  //Ejecuta la inserción
			return true;
		} catch (Exception $e) {
			$this->errorAdicionar = implode(" | ", $Sentencia->errorinfo());
			echo "ERROR:" . $this->errorAdicionar . "<P>" . "SQL:" . $SQL . "<P>";
			return false;
		}
	}

	//Actualiza un registro. Estos son los parámetros:
	//Tabla, listado de campos, valores de esos campos, campo llave, valores de ese campo llave
	public function ActualizarRegistro($tabla, $Campos, $Valores, $Llave)
	{
		$this->Conectar();

		$cadCampos = '';
		$cadParam = '';
		$SQL = "UPDATE " . $tabla . " SET ";
		for ($cont = 0; $cont < count($Campos); $cont++) {
			$SQL .= $Campos[$cont] . "=?,";
		}
		$SQL = substr($SQL, 0, -1); //quitar la última coma
		$SQL .= $Llave;
		$Sentencia = $this->Conexion->prepare($SQL); //Prepara la adición

		//Pone los valores a actualizar
		for ($cont = 0; $cont < count($Valores); $cont++) {
			$Sentencia->bindValue($cont + 1, $Valores[$cont]);
		}

		try {
			$Sentencia->execute();  //Ejecuta la actualización
			return true;
		} catch (Exception $e) {
			$this->errorActualizar = implode(" | ", $Sentencia->errorinfo());
			return false;
		}
	}

	//Retorna la lista de valores de una tabla
	function ListaValores($campo, $tabla, $campoValor, $campoDescripcion)
	{
		$Listado = '<select class="form-control" name="' . $campo . '" id="' . $campo . '">';
		$BD = new basedatos();
		$BD->PrepararLectura("SELECT " . $campoValor . ", " . $campoDescripcion . " FROM " . $tabla . " ORDER BY " . $campoDescripcion);
		while (($registros = $BD->TraeRegistroARegistro()) != null) {
			$Listado .= '<option value="' . $registros[0] . '">' . $registros[1] . '</option>';
		}
		$Listado .= '</select>';
		return $Listado;
	}

	//Retorna la lista de valores de una tabla con un valor por defecto señalado
	function ListaValoresDef($campo, $tabla, $campoValor, $campoDescripcion, $valordefecto)
	{
		$Listado = '<select class="form-control" name="' . $campo . '" id="' . $campo . '">';
		$BD = new basedatos();
		$BD->PrepararLectura("SELECT " . $campoValor . ", " . $campoDescripcion . " FROM " . $tabla . " ORDER BY " . $campoDescripcion);
		while (($registros = $BD->TraeRegistroARegistro()) != null) {
			if ($registros[0] == $valordefecto)
				$Listado .= '<option value="' . $registros[0] . '" selected="selected">' . $registros[1] . '</option>';
			else
				$Listado .= '<option value="' . $registros[0] . '">' . $registros[1] . '</option>';
		}
		$Listado .= '</select>';
		return $Listado;
	}
}

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'evento');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link->set_charset('utf8');
if ($link == false) {

	die("ERROR EN LA CONEXION" . mysqli_connect_error());
}

function conexion()
{
	$servidor = "localhost";
	$usuario = "root";
	$password = "";
	$bd = "evento";

	$conexion = mysqli_connect($servidor, $usuario, $password, $bd, array(MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	return $conexion;
}
