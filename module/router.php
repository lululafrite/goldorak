<?php
    include_once '../common/utilies.php'; // Fonctions communes

    $page = isset($_GET['page']) ? escapeInput($_GET['page']) : 'home';
    
    if ($page === 'home'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        include_once 'view/home.php';

    }elseif ($page === 'user'){

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

    }elseif($page === 'product'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['btn_monCompte'] = false;
        $_SESSION['newUser'] = false;

        include_once 'view/product.php';

    }elseif ($page === 'productEdit'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['btn_monCompte'] = false;
        $_SESSION['newUser'] = false;

        if($_SESSION['typeConnect'] === "Administrator" || $_SESSION['typeConnect'] === "User" ){
            include_once 'view/productEdit.php';
        }else{
            pageUnavailable();
        }

    }elseif($page === 'media'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        if($_SESSION['typeConnect'] != "Guest"){
            require_once 'view/media.php';
        }else{
            pageUnavailable();
        }

    }elseif($page === 'events'){

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;

        require_once 'view/events.php';

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

    }else {

        $_SESSION['updateMoncompte'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['btn_monCompte'] = false;
        
        include_once 'errorPage/unknownPage.php';

    }

?>