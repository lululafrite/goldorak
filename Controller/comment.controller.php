<?php
    include_once('../common/utilies.php');
    include_once('../model/comment.class.php');
    
    $comments = new Comment();

    if(isset($_POST['bt_save_comment'])){

        $pseudo_ = escapeInput($_POST['txt_comment_pseudo']);
        $rating_ = escapeInput($_POST['selectedRating']);
        $comment_ = escapeInput($_POST['txt_comment_comment']);
        
        if($comment_ != ""){

            $comments->setDate_(date("Y-m-d"));
            $comments->setPseudo($pseudo_);
            $comments->setRating($rating_);
            $comments->setComment($comment_);

            $comments->addComment();

        }else{

            echo "<script>alert('Le champ commentaire ne peut pas être vide!!! Resaisissez votre commentaire et selectionnez une étoile de 1 à 5.');</script>";

        }

        unset($_POST['bt_save_comment']);

    }else if(isset($_POST['bt_comment_delete'])){
        
        $comments->deleteComment($_POST['txt_comment_id']);
        unset($_POST['bt_comment_delete']);

    }else if(isset($_POST['bt_comment_validate'])){
        
        $comments->modereComment($_POST['txt_comment_id'], 2);
        unset($_POST['bt_comment_validate']);

    }else if(isset($_POST['bt_comment_refuse'])){
        
        $comments->modereComment($_POST['txt_comment_id'], 1);
        unset($_POST['bt_comment_refuse']);

    }

    if($_SESSION['typeConnect'] === 'Administrator'){
        $Comment = $comments->get(1,'date_','DESC','0','50');
    }else if($_SESSION['typeConnect'] === 'User'){
        $Comment = $comments->get('`publication` = 0','date_','DESC','0','50');
    }else{
        $Comment = $comments->get('`publication` = 2','date_','DESC','0','50');
    }
?>