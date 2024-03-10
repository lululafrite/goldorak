<?php
    include_once '../Elements/_00_debug.php'; // Debugging add-ons: Comment before uploading

    session_start();
    include_once '../vendor/autoload.php'; // add-on Vendor

    include_once '../Elements/_00_variable.php'; // Superglobal variables (mainly from SESSION)
    include_once '../Elements/_01_head.php'; // Load the marker <head>
?>

<script src="js/index.js"></script>

<body class="bg-black p-0 m-0 text-light">

    <?php include_once '../Elements/_02_header.php'; // Load the marker <header> ?>

    <main>
        <?php include_once('../Elements/_11_router.php'); // loaded the page router ?>
    </main>

    <?php
        include_once '../Elements/_03_footer.php';  // Load the marker <footer>
        $_SESSION['NextOrPrevious'] = false;
    ?>

    <script src='js/library.js'></script>

</body>

</html>