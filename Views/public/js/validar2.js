





function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}


function validateForm(){ 

    var nombreevento = document.contactForm.nombreevento.value;
    var generalinfo = document.contactForm.generalinfo.value;
    var tematica = document.contactForm.tematica.value;
    var responsable = document.contactForm.responsable.value;
    

    
    var nombreeventoErr = generalinfoErr= tematicaErr = responsableErr =  true;



 // Validate nombre
   if(nombreevento == "") {
        printError("nombreeventoErr", "Por favor ingrese el Nombre del Evento");
    } else {
        var regex = /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,100}$/;
        //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
        if(regex.test(nombreevento) === false) {
            printError("nombreeventoErr", "Por favor ingrese su Nombre Completo valido y con Max 100 letras");
            
        } else {
            printError("nombreeventoErr", "");
            nombreeventoErr = false;
        }
    }
    if(generalinfo == "") {
        printError("generalinfoErr", "Por favor ingrese la Descripción");
    } else {
        var regex = /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,800}$/;
        //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
        if(regex.test(generalinfo) === false) {
            printError("generalinfoErr", "Por favor ingrese una Descripción valida y con Max 800");
        } else {
            printError("generalinfoErr", "");
            generalinfoErr = false;
        }
    }

    if(tematica == "") {
        printError("tematicaErr", "Por favor ingrese la Tematica");
    } else {
        var regex = /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,100}$/;
        //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
        if(regex.test(tematica) === false) {
            printError("tematicaErr", "Por favor ingrese una Tematica valida y con Max 100 letras");
        } else {
            printError("tematicaErr", "");
            tematicaErr = false;
        }
    }

    if(responsable == "") { 
        printError("responsableErr", "Por favor ingrese el Responsable");
    } else {
        var regex = /^[ A-Za-zäÄëËïÏöÖüÜáéíóúáéíóúÁÉÍÓÚÂÊÎÔÛâêîôûàèìòùÀÈÌÒÙ1234567890ñÑ.,-]{5,100}$/;
        //var regex = /^[a-zA-áéíóúñüàè]{5,50}$/;
        if(regex.test(responsable) === false) {
            printError("responsableErr", "Por favor ingrese un Responsable valido y con Max 100 letras");
        } else {
            printError("responsableErr", "");
            responsableErr = false;
        }
    }


   


    if ((nombreeventoErr  || generalinfoErr || tematicaErr  || responsableErr ) == true) {
        return false;
    } else {
        //var dataPreview = "Validación Correcta";

        //alert(dataPreview);
    }


};

