<?php
    
    if ($_SESSION['pseudoConnect'] === "Guest") {
        if($_SESSION['local']){
            echo '<script>window.location.href = "http://goldorak/index.php?page=error_page";</script>';
            //header("Location: index.php?page=error_page");
            exit;
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
            //header("Location: https://www.follaco.fr/index.php?page=error_page");
            exit;
        }
        exit();
    }
    
    include('../Model/connexion.class.php');
    $MyUserConnect = new userConnect();

    $MyUserConnect->SetUserConnect('Guest');
    $MyUserConnect->SetConnexion(false);
    
    $_SESSION['pseudoConnect'] = "Guest";
    $_SESSION['typeConnect'] = "Guest";
    $_SESSION['subscriptionConnect'] = "Vénusia";
    $_SESSION['avatarConnect'] = 'avatar_membre_white.webp';
    $_SESSION['connexion'] = false;

    if($_SESSION['local']){
        echo '<script>window.location.href = "http://goldorak/index.php?page=home";</script>';
        //header("Location: index.php?page=home");
        exit;
    }
    else{
        echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=home";</script>';
        //header("Location: https://www.follaco.fr/index.php?page=home");
        exit;
    }
?>
