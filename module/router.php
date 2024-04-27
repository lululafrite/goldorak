<?php
    include_once '../common/utilies.php'; // Fonctions communes
    
    use \Firebase\JWT\JWT;
    
    $jwt1 = JWT::jsondecode($_SESSION['jwt']);
    $jwt2 = JWT::jsondecode(tokenJwt($_SESSION['pseudoConnect'], $_SESSION['SECRET_KEY']));

    $page = isset($_GET['page']) ? escapeInput($_GET['page']) : 'home';
    
    if ($page === 'home'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'view/home.php';

    }elseif($page === 'events'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        require_once 'view/events.php';

    }elseif ($page === 'adherer'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'view/adherer.php';

    }elseif ($page === 'connexion'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'view/connexion.php';

    }elseif ($page === 'disconnect'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        if($_SESSION['typeConnect'] != "Guest"){
            include_once 'view/disconnect.php';
        }else{
            pageUnavailable();
        }

    }elseif ($page === 'accessPage'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;
        
        include_once 'errorPage/accessPage.php';

    }elseif ($page === 'unknownPage'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'errorPage/unknownPage.php';

    }elseif ($page === 'timeExpired'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'errorPage/timeExpired.php';

    }elseif($page === ''){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'errorPage/unknownPage.php';

    }elseif(is_null($page)){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;
        
        include_once 'errorPage/unknownPage.php';

    }elseif(empty($page)){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;
        
        include_once 'errorPage/unknownPage.php';

    }else if($jwt2->{'delay'} - $jwt1->{'delay'} <= $_SESSION['delay']){

        if ($page === 'user'){

            $_SESSION['updateMoncompte'] = false;
            $_SESSION['newUser'] = false;
            $_SESSION['btn_monCompte'] = false;

            if($_SESSION['typeConnect'] === "Administrator"){
                include_once 'view/user.php';
            }else{
                pageUnavailable();
            }

        }elseif ($page === 'userEdit'){

            $_SESSION['updateMoncompte'] = false;
            //$_SESSION['btn_monCompte'] = false;
            //$_SESSION['newUser'] = false;
            include_once 'view/userEdit.php';

        }elseif($page === 'media'){

            $_SESSION['updateMoncompte'] = false;
            $_SESSION['newUser'] = false;
            $_SESSION['btn_monCompte'] = false;

            if($_SESSION['typeConnect'] != "Guest"){
                require_once 'view/media.php';
            }else{
                pageUnavailable();
            }

        }elseif ($page === 'commander'){

            $_SESSION['updateMoncompte'] = false;
            $_SESSION['newUser'] = false;
            $_SESSION['btn_monCompte'] = false;

            if($_SESSION['subscriptionConnect'] === "Goldorak" ){
                include_once 'view/commander.php';
            }else{
                pageUnavailable();
            }

        }elseif ($page === 'goldorakgo'){

            $_SESSION['updateMoncompte'] = false;
            $_SESSION['newUser'] = false;
            $_SESSION['btn_monCompte'] = false;

            if($_SESSION['subscriptionConnect'] != "Vénusia" ){
                include_once 'view/goldorakgo.php';
            }else{
                pageUnavailable();
            }

        }

    }else if($_SESSION['pseudoConnect'] != 'Guest'){

        $_SESSION['typeConnect'] = 'Guest';
        $_SESSION['pseudoConnect'] = 'Guest';
        $_SESSION['avatarConnect'] = 'avatar_membre_white.webp';
        $_SESSION['subscriptionConnect'] = 'Vénusia';
        $_SESSION['connexion'] = false;
        
        timeExpired();

    }else {

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;
        
        include_once 'errorPage/unknownPage.php';

    }

?>