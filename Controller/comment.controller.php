<?php
    include('../Model/comment.class.php');
    $comments = new Comment();
    if(isset($_POST['bt_save_comment'])){
        
        $comments->setDate_(date("Y-m-d"));
        $comments->setPseudo($_POST['txt_comment_pseudo']);
        $comments->setRating($_POST['selectedRating']);
        $comments->setComment($_POST['txt_comment_comment']);

        $comments->addComment();
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