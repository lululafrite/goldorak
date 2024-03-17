<?php
    
    // La variable $_SESSION['local'] mettre à false si online et à true si serveur local
    // Cette variable agit sur le controleur 'ConfigConnGP.php' pour les paramètres de connexion
    $_SESSION['local']=true;

    if (!isset($_SESSION['typeConnect'])) {

/********************************************************************** */
/******************* VARIABLES CONNEXION *************************** */
/********************************************************************** */
        
        $_SESSION['connexion'] = false;
        $_SESSION['typeConnect']= 'Guest';
        $_SESSION['pseudoConnect']= 'Guest';
        $_SESSION['avatarConnect']= 'avatar_membre_white.webp';
        $_SESSION['subscriptionConnect'] = 'Vénusia';
        
        $_SESSION['updateMoncompte'] = false;

/********************************************************************** */
/******************* VARIABLES USER *********************************** */
/********************************************************************** */

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
        
        $_SESSION['newUser'] = false;
        $_SESSION['newMember'] = false;

        $_SESSION['errorFormUser'] = false;

        $_SESSION['uploadAvatar'] = '';

/********************************************************************** */
/******************* VARIABLES PAGINATION ***************************** */
/********************************************************************** */

        $_SESSION['laPage'] = 1;
        $_SESSION['firstLine'] = 0;
        $_SESSION['ligneParPage'] = 3;
        $_SESSION['nbOfPage'] = 1;
        $_SESSION['nbOfProduct'] = 1;
        $_SESSION['NextOrPrevious'] = false;

        $_SESSION['theTable'] = 'user';

/********************************************************************** */
/******************* VARIABLES CRITERIA SEARCH ************************ */
/********************************************************************** */
        $_SESSION['criteriaName'] = '';
        $_SESSION['criteriaPseudo'] = '';
        $_SESSION['criteriaType'] = 'Selectionnez un type';

        $_SESSION['whereClause'] = 1;

/********************************************************************** */
/************************* VARIABLES OTHER **************************** */
/********************************************************************** */

        $_SESSION['timeZone']="Europe/Paris";
    }
?>