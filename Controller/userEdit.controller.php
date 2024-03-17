<?php

    include_once('../Model/user.class.php');
    include_once('../common/utilies.php');

//***********************************************************************************************
// Echapper les variables
//***********************************************************************************************
    
    $nav_new_user = isset($_POST['nav_new_user']) ? true : false;
    $bt_userEdit_new = isset($_POST['bt_userEdit_new']) ? true : false;
    $bt_userEdit_delete = isset($_POST['bt_userEdit_delete']) ? true : false;
    $bt_userEdit_cancel = isset($_POST['bt_userEdit_cancel']) ? true : false;
    $bt_userEdit_save = isset($_POST['bt_userEdit_save']) ? true : false;
    $btn_monCompte = isset($_POST['btn_monCompte']) ? true : false;

    $btn_avatar = isset($_POST['btn_avatar']) ? true : false;
    
    $btn_venusia = isset($_POST['btn_venusia']) ? true : false;
    $btn_actarus = isset($_POST['btn_actarus']) ? true : false;
    $btn_goldorak = isset($_POST['btn_goldorak']) ? true : false;

    $newError = isset($_GET['newError']) ? escapeInput($_GET['newError']) : false;

//***********************************************************************************************
// Daclaration de variables
//***********************************************************************************************

    if($nav_new_user){

        $_SESSION['newUser'] = true;

    }else if ($bt_userEdit_new){

        $_SESSION['newUser'] = true;

    }else if($btn_venusia){
        
        $_SESSION['subscription'] = 'Vénusia';
        $_SESSION['newMember'] = true;
        $_SESSION['newUser'] = true;

    }else if($btn_actarus){
        
        $_SESSION['subscription'] = 'Actarus';
        $_SESSION['newMember'] = true;
        $_SESSION['newUser'] = true;

    }else if($btn_goldorak){
        
        $_SESSION['subscription'] = 'Goldorak';
        $_SESSION['newMember'] = true;
        $_SESSION['newUser'] = true;

    }
    
    $_SESSION['theTable'] = 'user';
    
    $changeAvatar = false;
    
    $MyUser = new User();
    $MyUser->setNewUser($_SESSION['newUser']);

    $users = array();
    $user = array(
        "id_user" => ''
    );
    $users[0] = $user;

    //***********************************************************************************************
    // traitement du téléchargement des images 
    //***********************************************************************************************
    
        if($btn_avatar){
            
            $uploadDirectory = './img/avatar/';
    
            $_SESSION['uploadAvatar'] = isset($_POST['txt_userEdit_avatar']) ? escapeInput($_POST['txt_userEdit_avatar']) : false;

            $_SESSION['uploadAvatar'] = isset($_FILES["fileAvatar"]) ? escapeInput($_FILES["fileAvatar"]["error"]) : false;
    
            if ($_SESSION['uploadAvatar'] == UPLOAD_ERR_OK){
    
                $_SESSION['uploadAvatar'] = isset($_FILES["fileAvatar"]) ? escapeInput($_FILES["fileAvatar"]["name"]) : false;
                $sourceFile = isset($_FILES["fileAvatar"]) ? escapeInput($_FILES["fileAvatar"]["tmp_name"]) : false;
                $destinationFile = $uploadDirectory . basename($_SESSION['uploadAvatar']);
                unset($_FILES["fileAvatar"]);
    
            }else{
    
                echo "<script>alert('Aucune image n'a été sélectionnée ou une erreur s'est produite.');</script>";
                
            }
    
            if(move_uploaded_file($sourceFile, $destinationFile)){
    
                echo "<script>alert('L\'image a été uploadée avec succès.');</script>";
    
            }else{
    
                echo "<script>alert('Désolé, une erreur s'est produite lors de l'upload de l'image.');</script>";
            
            }
    
            $changeAvatar = true;
        }

    //***********************************************************************************************
    // traitement CRUD
    //***********************************************************************************************

    if($bt_userEdit_save && $_SESSION['errorFormUser'] === false){
        
        //Récupération des valeurs des input du formulaire

        $_SESSION['id_user'] = isset($_POST['txt_userEdit_id']) ? escapeInput($_POST['txt_userEdit_id']) : '';
        $_SESSION['name'] = isset($_POST['txt_userEdit_name']) ? escapeInput($_POST['txt_userEdit_name']) : '';
        $_SESSION['surname'] = isset($_POST['txt_userEdit_surname']) ? escapeInput($_POST['txt_userEdit_surname']) : '';
        $_SESSION['pseudo'] = isset($_POST['txt_userEdit_pseudo']) ? escapeInput($_POST['txt_userEdit_pseudo']) : '';
        $_SESSION['email'] = isset($_POST['txt_userEdit_email']) ? escapeInput($_POST['txt_userEdit_email']) : '';
        $_SESSION['phone'] = isset($_POST['txt_userEdit_phone']) ? escapeInput($_POST['txt_userEdit_phone']) : '';
        $_SESSION['type_'] = isset($_POST['list_userEdit_type']) ? escapeInput($_POST['list_userEdit_type']) : '';
        $_SESSION['avatar'] = isset($_POST['txt_userEdit_avatar']) ? escapeInput($_POST['txt_userEdit_avatar']) : '';
        $_SESSION['subscription'] = isset($_POST['list_userEdit_subscription']) ? escapeInput($_POST['list_userEdit_subscription']) : '';
        $_SESSION['password'] = isset($_POST['txt_userEdit_password']) ? escapeInput($_POST['txt_userEdit_password']) : '';

        $MyUser->setName(strtoupper($_SESSION['name']));
        $MyUser->setSurname(ucfirst(strtolower($_SESSION['surname'])));
        $MyUser->setPseudo($_SESSION['pseudo']);
        $MyUser->setEmail($_SESSION['email']);
        $MyUser->setPhone($_SESSION['phone']);

        if($_SESSION['typeConnect'] ==='Administrator'){

            $MyUser->setType($_SESSION['type_']);

        }else{

            $MyUser->setType('Member');

        }

        $MyUser->setAvatar($_SESSION['avatar']);
        $MyUser->setSubscription($_SESSION['subscription']);
        $MyUser->setPassword($_SESSION['password']);
        
        if($_SESSION['newUser']){
                
            $MyUser->setId($MyUser->addUser());
            $_SESSION['newUser'] = false;
            $MyUser->setNewUser(false);

            if($_SESSION['newMember']){

                $_SESSION['newMember'] = false;
                $_SESSION['typeConnect'] = 'Member';
                $_SESSION['pseudoConnect'] = $_SESSION['pseudo'];
                $_SESSION['avatarConnect'] = $_SESSION['avatar'];
                $_SESSION['subscriptionConnect'] = $_SESSION['subscription'];
                $_SESSION['connexion'] = true;

                routeToHomePage();

            }else{

                echo '<script>alert("L\'enregistrement est effectué!");</script>';

            }

        }else{

            $MyUser->updateUser($_SESSION['id_user']);

            if ($_SESSION['updateMoncompte']){

                $_SESSION['pseudoConnect'] = $_SESSION['pseudo'];
                $_SESSION['avatarConnect'] = $_SESSION['avatar'];
                $_SESSION['subscriptionConnect'] = $_SESSION['subscription'];

            }

        }

    }else if($bt_userEdit_cancel){
        
        $_SESSION['newUser'] = false;
        
        routeToUserPage();

    }else if(($bt_userEdit_new && !$_SESSION['errorFormUser']) || ($_SESSION['newUser'] && !$_SESSION['errorFormUser'])){
        
        $user = array(
            "id_user" => '',
            "name" => '',
            "surname" => '',
            "pseudo" => '',
            "email" => '',
            "phone" => '',
            "type" => 'Member',
            "avatar" => 'avatar_membre_white.webp',
            "subscription" => $_SESSION['subscription'],
            "password" => ''
        );
        $users[0] = $user;

        $_SESSION['newUser'] = true;
        $MyUser->setNewUser(true);
        $newUser = true;

    }else if($bt_userEdit_delete){
        
        $_SESSION['id_user'] = isset($_POST['txt_userEdit_id']) ? escapeInput($_POST['txt_userEdit_id']) : '';
        
        if ($MyUser->deleteUser($_SESSION['id_user'])){

            if($_SESSION['typeConnect'] === 'Member'){

                $_SESSION['id_user'] = '';
                $_SESSION['name'] = '';
                $_SESSION['surname'] = '';
                $_SESSION['pseudo'] = 'Guest';
                $_SESSION['email'] = '';
                $_SESSION['phone'] = '## ## ## ## ##';
                $_SESSION['type'] = 'Guest';
                $_SESSION['avatar'] = 'avatar_membre_white.webp';
                $_SESSION['subscription'] = 'Vénusia';
                $_SESSION['password'] =  '';
                $_SESSION['connexion'] = false;

            }

            echo '<script>alert(\'Cet enregistrement est correctement supprimé de la base de données!\');</script>';
            
            routeAfterDelete();

        }

    }else if($newError && !$_SESSION['errorFormUser']){
        
        $user = array(
            "id_user" => $_SESSION['id_user'],
            "name" => $_SESSION['name'],
            "surname" => $_SESSION['surname'],
            "pseudo" => $_SESSION['pseudo'],
            "email" => $_SESSION['email'],
            "phone" => $_SESSION['phone'],
            "type" => $_SESSION['type_'],
            "avatar" => $_SESSION['avatar'],
            "subscription" => $_SESSION['subscription'],
            "password" => $_SESSION['password']
        );
        $users[0] = $user;

        $_SESSION['newUser'] = true;
        $MyUser->setNewUser(true);
        $newUser = true;
        $newError = false;

    }

    if($_SESSION['errorFormUser']===false){

        if(!$_SESSION['newUser']){
            
            if($btn_monCompte){

                $users = $MyUser->get('`pseudo` = \'' . $_SESSION['pseudoConnect'] . '\'');
                $_SESSION['updateMoncompte'] = true;

            }else{

                $_SESSION['id_user'] = isset($_POST['txt_userEdit_id']) ? escapeInput($_POST['txt_userEdit_id']) : '';
                if(!empty($_SESSION['id_user'])){
                    
                    $MyUser->setId($_SESSION['id_user']);

                }else if($users[0]['id_user'] != ''){

                    $MyUser->setId($users[0]['id_user']);

                }
                // Requete SELECT permettant de récupérer les données de l'utilisateur en fonction de l'id traité ci-dessus
                $users = $MyUser->get('`id_user` = \'' . $MyUser->getId() . '\'');

            }

        }

    }
        
    if($changeAvatar === true){

        $users[0]['avatar'] = $_SESSION['uploadAvatar'];
        $_SESSION['avatar'] = $_SESSION['uploadAvatar'];

        $changeAvatar = false;

    }

    //Traiment de la BD pour récupérer les données destinées à l'input liste type
    include('../Model/type.class.php');
    $Types = new Type();
    $MyType = $Types->get(1,'type', 'ASC', 0, 50);
    unset($Types);

    //Traiment de la BD pour récupérer les données destinées à l'input liste subscription
    include('../Model/subscription.class.php');
    $Subscriptions = new Subscription();
    $MySubscription = $Subscriptions->get(1,'subscription', 'ASC', 0, 50);
    unset($Subscriptions);

?>