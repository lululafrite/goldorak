<?php
    
    include_once '../Model/connexion.class.php';
    $MyUserConnect = new userConnect();

    $MyUserConnect->SetUserConnect('Guest');
    $MyUserConnect->SetConnexion(false);
    
    $_SESSION['pseudoConnect'] = "Guest";
    $_SESSION['typeConnect'] = "Guest";
    $_SESSION['subscriptionConnect'] = "Vénusia";
    $_SESSION['avatarConnect'] = 'avatar_membre_white.webp';
    $_SESSION['connexion'] = false;
    
    include_once '../common/utilies.php';
    routeToHomePage();
    
?>
