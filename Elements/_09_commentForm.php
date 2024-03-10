<?php include_once "../Controller/comment.controller.php"; ?>

<table class="table table-dark table-bordered">

    <form action="" method="post">

        <tbody>

            <tr class="table-active">

                <td class="text-end">
                    <label class="form-label" for="comment_name">Pseudo</label>
                </td>

                <td>
                    <input class="form-control bg-dark text-light fs-4" type="text" id="txt_comment_pseudo" name="txt_comment_pseudo" placeholder="Saisissez votre pseudonyme" readonly value="<?php echo $_SESSION['pseudoConnect']; ?>">
                </td>

            </tr>

            <tr class="table-active">

                <td class="text-end">
                    <label class="form-label" for="comment_description">Description</label>
                </td>

                <td>
                    <textarea class="form-control fs-4" name="txt_comment_comment" id="txt_comment_comment" rows="3" placeholder="Saisissez votre commentaire"></textarea>
                </td>

            </tr>

            <tr class="table-active">

                <td colspan="2">

                    <div class="container mt-1 text-center">

                        <span>Cliquez sur une étoile pour évaluer le club</span>
                        
                        <div class="rating" onclick="handleRating(event)">
                            <i class="fas fa-star" data-rating="1"></i>
                            <i class="fas fa-star" data-rating="2"></i>
                            <i class="fas fa-star" data-rating="3"></i>
                            <i class="fas fa-star" data-rating="4"></i>
                            <i class="fas fa-star" data-rating="5"></i>
                        </div>

                        <div class="d-flex justify-content-center align-items-center">
                            <label class="me-3" for="selectedRating">Votre note : </label>
                            <input class="bg-transparent text-light" type="text" id="selectedRating" name="selectedRating" style="text-align: left; width:15px;" readonly value="1">
                            <label class="me-3" for="selectedRating">/ 5</label>
                        </div>

                    </div>

                </td>

            </tr>

            </tr>

                <td class="text-center" colspan="2">
                    <?php if($_SESSION['typeConnect'] != 'Guest'){ ?>
                        <button class="btn btn btn-primary fs-4" type="submit" id="bt_save_comment" name="bt_save_comment">Envoyer</button>
                    <?php }else{echo "Inscrivez-vous pour laisser un commentaire";}?>
                </td>

            </tr>

        </tbody>

    </form>

</table>

<script src="js/rating.js"></script>