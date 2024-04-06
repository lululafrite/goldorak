function setInputValue(inputId, value) {
    const monInput = document.getElementById(inputId);
    if (monInput) {
        monInput.value = value;
    }
}

function colorBgList(input, color){
    document.addEventListener('DOMContentLoaded', function() {
        let myInput = document.getElementById(input);
        myInput.style.backgroundColor = color;
    });
}

function verifInputEmpty(input){
    
    const myInput = document.getElementById(input);
    
    if(myInput.value.trim() === ''){
        
        return true;

    }else{
        
        return false;

    }

}

function veriList(input , datalist){

    let myInput = document.getElementById(input);
    let myDatalist = document.getElementById(datalist);

    let isValid = Array.from(myDatalist.options).some(function(option) {
        return option.value === myInput.value;
    });

    if(isValid){
        return true;
    }else{
        return false;
    }
}

function verifPassword(input){

    const passwordInput = document.getElementById(input).value;

    // Vérifier que la longueur est de 8 caractères
    if (passwordInput.length < 8) {
        //alert("Le mot de passe doit contenir au moins 8 caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmi les suivants (_-/*-@!)");
        return false;
    }

    //Vérifier au moins une majuscule, une minuscule, un chiffre, et un caractère spécial
    const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[_\-/*-@!])[\w\-/*-@!]{8,255}$/;
    
    if (!regex.test(passwordInput)) {
        //alert("Le mot de passe doit contenir au moins 8 caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmi les suivants (_-/*-@!)");
        return false;
    }

    return true;

}

function compareValueInput(input1, input2){

    const value1 = document.getElementById(input1).value;
    const value2 = document.getElementById(input2).value;

    if(value1 === value2){
        return true;
    }
    else{
        return false;
    }

}