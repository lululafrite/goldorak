<?php
    if ($_SESSION['typeConnect'] != "Administrator") {
        
        if($_SESSION['local']===true){
            
            echo '<script>window.location.href = "http://goldorak/index.php?page=error_page";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
        
        }
        exit();
    }
?>