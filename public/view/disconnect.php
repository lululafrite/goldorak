<?php
    
    include_once '../model/connexion.class.php';
    $MyUserConnect = new UserConnect();

    $MyUserConnect->SetUserConnect('Guest');
    $MyUserConnect->SetConnexion(false);
    
    $_SESSION['pseudoConnect'] = "Guest";
    $_SESSION['typeConnect'] = "Guest";
    $_SESSION['subscriptionConnect'] = "Vénusia";
    $_SESSION['avatarConnect'] = 'avatar_membre_white.webp';
    $_SESSION['connexion'] = false;
    
    include_once('../common/utilies.php');

    $_SESSION['jwt'] = tokenJwt($_SESSION['pseudoConnect'], $_SESSION['SECRET_KEY']);
    
    routeToHomePage();
    
?>
