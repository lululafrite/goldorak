<?php
    // décommenter les 2 lignes ci-dessous pour débogage inline et offline 
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    // décommenter la lignes ci-dessous pour débogage offline avec VS Code (installer l'extention xdebug et parametrer php.ini)
    xdebug_break();

    session_start();

    include_once '../vendor/autoload.php';
    include_once '../Elements/_00_variable.php';
    
    //$page = $_GET['page']?? 'home';
    //La syntaxe ci-dessus est équivalente celle ci-dessous
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    include_once '../Elements/_01_head.php';
?>

<body class="bg-black p-0 m-0 text-light">

<?php
    include_once '../Elements/_02_header.php';
?>

<script>

    var pageTitle = document.title;

    if (window.location.href.includes("home")) {
        pageTitle = "Club Goldorak - Accueil";
    } else if (window.location.href.includes("user")) {
        pageTitle = "Club Goldorak - contacts";
    } else if (window.location.href.includes("user_edit")) {
        pageTitle = "Club Goldorak - Editer Contact";
    } else if (window.location.href.includes("product")) {
        pageTitle = "Club Goldorak - Les produits";
    } else if (window.location.href.includes("product_edit")) {
        pageTitle = "Club Goldorak - Editer les produits";
    }else if (window.location.href.includes("media")) {
        pageTitle = "Club Goldorak - Les médias";
    } else if (window.location.href.includes("connexion")) {
        pageTitle = "Club Goldorak - connexion";
    } else if (window.location.href.includes("disconnect")) {
        pageTitle = "Club Goldorak - Déconnexion";
    } else if (window.location.href.includes("error_page")) {
        pageTitle = "Club Goldorak - Page inaccessible";
    } else if (window.location.href.includes("error_unknown_page")) {
        pageTitle = "Club Goldorak - Page inéxistante";
    } 

    document.getElementById("pageTitle").innerText = pageTitle;
    
</script>

<main>
    
    <?php
        if ($page === 'home'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/index.php';
        }elseif ($page === 'user'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/user.php';
        }elseif ($page === 'user_edit'){
            include_once 'view/user_edit.php';
        }elseif($page === 'product'){
            $_SESSION['updateMoncompte'] = false;
            require_once 'view/product.php';
        }elseif ($page === 'product_edit'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/product_edit.php';
        }elseif($page === 'media'){
            $_SESSION['updateMoncompte'] = false;
            require_once 'view/media.php';
        }elseif($page === 'events'){
            $_SESSION['updateMoncompte'] = false;
            require_once 'view/pageEvents.php';
        }elseif ($page === 'commander'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/commandant.php';
        }elseif ($page === 'goldorakgo'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/goldorakgo.php';
        }elseif ($page === 'adherer'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/adherer.php';
        }elseif ($page === 'connexion'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/connexion.php';
        }elseif ($page === 'disconnect'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/disconnect.php';
        }elseif ($page === 'error_page'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/error_access_page.php';
        }elseif ($page === 'error_unknown_page'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/error_unknown_page.php';
        }elseif($page === '404'){
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/error_unknown_page.php';
        }else {
            $_SESSION['updateMoncompte'] = false;
            include_once 'view/error_unknown_page.php';
        }
    ?>
</main>

<?php
    include_once '../Elements/_03_footer.php';
    $_SESSION['NextOrPrevious'] = false;
?>

<!-- -------- FILE ASSET JAVASCRIPT FOR BOOTSTRAP (STANDARD AND POPPER) --------- -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


</body>

</html>