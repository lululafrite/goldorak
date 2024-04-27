//Permet de remplir les input avec une valeur quelquonque. Utile si l'on a cliqué sur le bouton nouveau et que l'on veut annuler. 

function retour() {

    setInputValue('txt_userEdit_id', '1');
    setInputValue('list_userEdit_subscription', 'Vénusia');
    setInputValue('txt_userEdit_name', '_');
    setInputValue('txt_userEdit_surname', '_');
    setInputValue('txt_userEdit_pseudo', '_');
    setInputValue('txt_userEdit_email', '_@gmail.com');
    setInputValue('txt_userEdit_phone', '## ## ## ## ##');
    setInputValue('txt_userEdit_avatar', 'avatar_membre_white.webp');
    setInputValue('list_userEdit_type', 'Member');
    setInputValue('txt_userEdit_password', 'Abc123/*-');
    setInputValue('txt_userEdit_confirm', 'Abc123/*-');

    return;
}

//Initialise les couleurs input list

colorBgList('list_userEdit_subscription','#DADADA');
colorBgList('list_userEdit_type','#DADADA');

//vérifier la cohérence des valeurs des inputs

function validateInput(input , datalist, myLabel, myMessage){

    const myInput = document.getElementById(input);
    const errorMessage = document.getElementById(myLabel);
    //let isValid = false;
    let isError = false;
    
    if(datalist != ''){
        
        if(veriList(input , datalist)){

            isError = false;

        }else{

            isError = true;

        }

    }else{
    
        if(verifInputEmpty(input)){
            
            isError = true;

        }else if(input === 'txt_userEdit_password'){
            
            if (verifPassword('txt_userEdit_password')){
            
                isError = false;

            }else{

                isError = true;

            }

        }else if(input === 'txt_userEdit_confirm'){
            
            if (compareValueInput('txt_userEdit_password', input)){

                isError = false;

            }else{

                isError = true;

            }

        }
        
    }

    if(isError){

        errorMessage.textContent = myMessage;
        errorMessage.style.color = 'red';
        myInput.style.background = '#FFB4B4';
        return false;

    }else{

        errorMessage.textContent = myMessage;
        errorMessage.style.color = '#000000';
        
        if(datalist!=''){
            myInput.style.background = '#DADADA';
        }else{
            myInput.style.background = '#ffffff';
        }

        return true;
    }
}

/*********************************************************************************************
****** Annuler la soumission du formulaire si une erreur subsiste dans l'un des champs *******
*********************************************************************************************/

document.getElementById('formUserEdit').addEventListener('submit', function (event) {

    //event.preventDefault();

    // Identifier l'élément déclencheur de l'événement
    //const submitButton = document.getElementById('btn_avatar');

    // Afficher ou utiliser des informations sur l'élément déclencheur
    //console.log("Le bouton qui a déclenché la soumission est : ", submitButton.tagName);

    //event.preventDefault();
    
    // Récupère l'ID du bouton soumetteur
    var submitButton = event.submitter.id;
    
    // Faites ce que vous devez avec l'ID récupéré
    //console.log("ID du bouton soumetteur :", submitButton);
    
    let isError = false;
    const MessageAvatar = "Selectionnez image valide (.webp, .png ou .jpg). Les dimensions recommandées sont 70px sur 70px.";
        

    if(submitButton != 'btn_avatar'){

        console.log("ID du bouton soumetteur n'est pas btn_avatar :", submitButton);

        const MessageSubscription = "Saisissez une formule dans la liste de choix.";
        const MessageName = "Saisissez le Nom (50 caractères maximum).";
        const MessageSurname = "Saisissez le Prénom (50 caractères maximum).";
        const MessagePseudo = "Saisissez le pseudonyme (20 caractères maximum).";
        const MessageEmail = "Saisissez l'adresse email (255 caractères maximum).";
        const MessagePhone = "Saisissez le N° de téléphone.";
        const MessageType = "Selectionnez le type d'utilisateur dans la liste de choix.";
        const MessagePassword = "Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@";
        

        if (!validateInput('list_userEdit_subscription', 'datalist_userEdit_subscription', 'labelMessageSubscription', MessageSubscription)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_name', '', 'labelMessageName', MessageName)){
            isError = true;
        }
        
        if (!validateInput('txt_userEdit_surname', '', 'labelMessageSurname', MessageSurname)){
            isError = true;
        }

        if (!validateInput('txt_userEdit_pseudo', '', 'labelMessagePseudo', MessagePseudo)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_email', '', 'labelMessageEmail', MessageEmail)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_phone', '', 'labelMessagePhone', MessagePhone)) {
            isError = true;
        }

        if (!validateInput('list_userEdit_type', 'datalist_userEdit_type', 'labelMessageType', MessageType)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_avatar', '', 'labelMessageavatar', MessageAvatar)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_password', '', 'labelMessagePassword', MessagePassword)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_confirm', '', 'labelMessageConfirm', MessagePassword)) {
            isError = true;
        }

    }else{

        console.log("ID du bouton soumetteur :", submitButton);

        if (!validateInput('txt_userEdit_avatar', '', 'labelMessageavatar', MessageAvatar)) {
            isError = true;
        }

    }

    let messageAlerte = 'toto Vous avez un ou plusieurs champs dont la valeur n\'est pas conforme. Veuillez vérifier et corriger le ou les champs concernés';
    
    if (isError === true){
        event.preventDefault();
        alert (messageAlerte)
        isError = false;
    }

});