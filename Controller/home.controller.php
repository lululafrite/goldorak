<?php

    include('../Model/home.class.php');
    include_once('../common/utilies.php');

    $homes = new Home();
    
    //escape input
    $_SESSION['titre1'] = isset($_POST['txt_titre1']) ? $_POST['txt_titre1'] : '';
    $_SESSION['titre_chapter1'] = isset($_POST['txt_titre_chapter1']) ? $_POST['txt_titre_chapter1'] : '';
    $_SESSION['chapter1'] = isset($_POST['txt_chapter1']) ? $_POST['txt_chapter1'] : '';
    $_SESSION['img_chapter1'] = isset($_POST['txt_img_chapter1']) ? $_POST['txt_img_chapter1'] : '';
    $_SESSION['titre_chapter2'] = isset($_POST['txt_titre_chapter2']) ? $_POST['txt_titre_chapter2'] : '';
    $_SESSION['chapter2'] = isset($_POST['txt_chapter2']) ? $_POST['txt_chapter2'] : '';
    $_SESSION['img_chapter2'] = isset($_POST['txt_img_chapter2']) ? $_POST['txt_img_chapter2'] : '';
    
    $btn_home_save = isset($_POST['btn_home_save']) ? true : false;
    unset($_POST['btn_home_save']);

    if($btn_home_save){
        saveHome($homes);
    }

    $home = $homes->get(1,'id_home','DESC','0','10');

    //***********************************************************************************************
    // traitement du téléchargement des images 
    //***********************************************************************************************

    $btn_img_chapter1 = isset($_POST['btn_img_chapter1']) ? true : false;
    unset($_POST['btn_img_chapter1']);

    if($btn_img_chapter1){

        if (uploadImg('newImgChapter1','txt_img_chapter1','file_img_chapter1')){

            $home[0]['img_chapter1'] = $_SESSION['newImgChapter1'];
            $_SESSION['img_chapter1'] = $_SESSION['newImgChapter1'];
            saveHome($homes);

        }else{

            echo "<script>alert('Désolé, une erreur s\'est produite lors de l\'upload de l\'image.');</script>";

        }

    }

    $btn_img_chapter2 = isset($_POST['btn_img_chapter2']) ? true : false;
    unset($_POST['btn_img_chapter2']);

    if($btn_img_chapter2){

        if (uploadImg('newImgChapter2','txt_img_chapter2','file_img_chapter2')){

            $home[0]['img_chapter2'] = ($_SESSION['newImgChapter2']);
            $_SESSION['img_chapter2'] = $_SESSION['newImgChapter2'];
            saveHome($homes);

        }else{

            echo "<script>alert('Désolé, une erreur s\'est produite lors de l\'upload de l\'image.');</script>";

        }

    }

    function saveHome($object){
        
        $object->setTitre1($_SESSION['titre1']);

        $object->setTitre_Chapter1($_SESSION['titre_chapter1']);
        $object->setChapter1($_SESSION['chapter1']);
        $object->setImg_chapter1($_SESSION['img_chapter1']);

        $object->setTitre_Chapter2($_SESSION['titre_chapter2']);
        $object->setChapter2($_SESSION['chapter2']);
        $object->setImg_chapter2($_SESSION['img_chapter2']);

        $object->updateHome(1);

    }

?>