<?php

if (isset($_POST['envoyer'])) {

    include_once('../model/connexion.class.php');

    $MyUserConnect = new UserConnect();

    $emptyCell = false;
    $emptyEmail = false;

    if (isset($_POST["email"]) && empty($_POST["email"])) {
        $emptyCell = true;
        $emptyEmail = true;
    }

    if (isset($_POST["password"]) && empty($_POST["password"])) {
        $emptyCell = true;
    }

    if (!$emptyCell) {

        try {

            $data = $MyUserConnect->queryConnect($_POST["email"], $_POST["password"]);

            if ($data) {

                $MyUserConnect->SetUserConnect($data['type']);
                $_SESSION['typeConnect'] = $data['type'];
                $_SESSION['pseudoConnect'] = $data['pseudo'];
                $_SESSION['avatarConnect'] = $data['avatar'];
                $_SESSION['subscriptionConnect'] = $data['subscription'];
                $_SESSION['connexion'] = true;
                $MyUserConnect->SetConnexion(true);
                
                
                include_once('../common/utilies.php');

                $_SESSION['jwt'] = tokenJwt($_SESSION['pseudoConnect'], $_SESSION['SECRET_KEY']);

                routeToHomePage();

            } else {

                $MyUserConnect->SetUserConnect('guest');
                $_SESSION['connexion'] = false;
                $MyUserConnect->SetConnexion(false);
                $_SESSION['subscription'] = "Vénusia";

                echo "<script>alert('Cet identifiant n'existe pas!');</script>";

            }

        } catch (Exception $e) {

            echo "error in the query : " . $e->getMessage();

            $MyUserConnect->SetUserConnect('guest');
            $MyUserConnect->SetConnexion(false);
            $_SESSION['connexion'] = false;
            $_SESSION['subscription'] = "Vénusia";
        }

    } else {

        if ($emptyEmail) {

            echo "<script>alert('Le champ email est vide, veuillez saisir votre adresse email');</script>";

        } else {

            echo "<script>alert('Le champ mot de passe est vide, veuillez saisir votre mot de passe');</script>";

        }

        $MyUserConnect->SetUserConnect('guest');
        $MyUserConnect->SetConnexion(false);
        $_SESSION['connexion'] = false;
        $_SESSION['subscription'] = "Vénusia";

    }

}

?>

