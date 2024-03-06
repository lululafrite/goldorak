<?php
    
    // La variable $_SESSION['local'] mettre à false si online et à true si serveur local
    // Cette variable agit sur le controleur 'ConfigConnGP.php' pour les paramètres de connexion
    $_SESSION['local']=true;

    if (!isset($_SESSION['typeConnect'])) {
        
        $_SESSION['connexion'] = false;
        $_SESSION['typeConnect']= 'Guest';
        $_SESSION['pseudoConnect']= 'Guest';
        $_SESSION['avatarConnect']= 'avatar_membre_white.webp';
        $_SESSION['subscriptionConnect'] = 'Vénusia';
        
        $_SESSION['updateMoncompte'] = false;

/********************************************************************** */
/******************* VARIABLES USER *********************************** */
/********************************************************************** */

        //$_SESSION['userConnected'] = 'Guest';

        $_SESSION['addUser'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['newMember'] = false;

        $_SESSION['id_user'] = '';
        $_SESSION['name'] = '';
        $_SESSION['surname'] = '';
        $_SESSION['pseudo'] = 'Guest';
        $_SESSION['email'] = '';
        $_SESSION['phone'] = '## ## ## ## ##';
        $_SESSION['type'] = 'Guest';
        $_SESSION['avatar'] = 'avatar_membre_white.webp';
        $_SESSION['subscription'] = 'Vénusia';
        $_SESSION['password'] =  '';

        $_SESSION['errorFormUser'] = false;

        //Variable critères de recharche user
        $_SESSION['criteriaName'] = '';
        $_SESSION['criteriaPseudo'] = '';
        $_SESSION['criteriaType'] = 'Selectionnez un type';

        $_SESSION['uploadAvatar'] = '';

/********************************************************************** */
/******************* VARIABLES USER *********************************** */
/********************************************************************** */

        $_SESSION['laPage'] = 1;
        $_SESSION['firstLine'] = 0;
        $_SESSION['ligneParPage'] = 3;
        $_SESSION['nbOfPage'] = 1;
        $_SESSION['nbOfProduct'] = 1;
        $_SESSION['NextOrPrevious'] = false;

        $_SESSION['theTable'] = 'car';

        $_SESSION['addCar'] = false;
        $_SESSION['newCar'] = false;
        $_SESSION['errorFormCar'] = false;
        $_SESSION['carBrand'] = '_';
        $_SESSION['carModel'] = '_';
        $_SESSION['carMotorization'] = '_';
        $_SESSION['carSold'] = 'Oui';
        //Variable critères de recharche car
        $_SESSION['criteriaBrand'] = 'Selectionnez une marque';
        $_SESSION['criteriaModel'] = 'Selectionnez un modele';
        $_SESSION['criteriaMileage'] = 'Selectionnez un kilometrage maxi';
        $_SESSION['criteriaPrice'] = 'Selectionnez un prix maxi';

        $_SESSION['addBrand'] = false;
        $_SESSION['addModel']=false;
        $_SESSION['addMotorization']=false;

        $_SESSION['whereClause'] = 1;

        //$_SESSION['local']=true;
        $_SESSION['timeZone']="Europe/Paris";
    }
?>