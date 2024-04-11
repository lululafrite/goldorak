<?php
    include_once '../module/debug.php'; // Debugging add-ons: Comment before uploading

    session_start();
    require '../vendor/autoload.php'; // add-on Vendor

    include_once '../module/variable.php'; // Superglobal variables (mainly from SESSION)
    include_once '../module/head.php'; // Load the marker <head>
?>

<body class="bg-black p-0 m-0 text-light">

    <?php include_once '../module/header.php'; // Load the marker <header> ?>

    <main>
        <?php include_once('../module/router.php'); // loaded the page router ?>
    </main>

    <?php include_once '../module/footer.php';  // Load the marker <footer> ?>

    <script src='js/library.js'></script>

</body>

</html>