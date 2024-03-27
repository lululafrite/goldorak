<?php
    include_once '../module/_00_debug.php'; // Debugging add-ons: Comment before uploading

    session_start();
    include_once '../vendor/autoload.php'; // add-on Vendor

    include_once '../module/_00_variable.php'; // Superglobal variables (mainly from SESSION)
    include_once '../module/_01_head.php'; // Load the marker <head>
?>

<body class="bg-black p-0 m-0 text-light">

    <?php include_once '../module/_02_header.php'; // Load the marker <header> ?>

    <main>
        <?php include_once('../module/_11_router.php'); // loaded the page router ?>
    </main>

    <?php include_once '../module/_03_footer.php';  // Load the marker <footer> ?>

    <script src='js/library.js'></script>

</body>

</html>