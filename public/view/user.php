<?php include('../Controller/user.controller.php'); ?>

<div class="mt-5">
    <?php include('../Elements/_05_select_page.php'); ?>
</div>

<div class="container">

    <section class="m-0 d-flex flex-wrap justify-content-between">

    <?php for($i=0;$i != count($users)-1;$i++) { ?>

    <article class="border rounded-4 ps-3 my-5">
        <form action="/index.php?page=user_edit" method="post">
            <div class="div__user--img">
                <table class='table__user--img'>
                    <tr>
                        <td class="tdLabel text-end text-light border border-0 pe-1">ID:</td>
                        <td class="tdText border border-0"><input type="text" name='txt_userEdit_id'  class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['id_user'];?>'></td>
                    </tr>
                    <tr>
                        <td class="tdLabel text-end border border-0 pe-1">Nom:</td>
                        <td class="tdText border border-0"><input type="text" name="txt_user_name" class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['name'];?>'></td>
                    </tr>
                    <tr>
                        <td class="tdLabel text-end border border-0 pe-1">Prénom:</td>
                        <td class="tdText border border-0"><input type="text" name="txt_user_surname" class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['surname'];?>'></td>
                    </tr>
                </table>
            </div>

            <div class="div__user--data">
                <table class='table__user--data'>
                    <tr>
                        <td class="tdLabel text-end border border-0 pe-1">Pseudo:</td>
                        <td class="tdText border border-0"><input type="text" name="txt_user_pseudo" class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['pseudo'];?>'></td>
                    </tr>
                    <tr>
                        <td class="tdLabel text-end border border-0 pe-1">Email:</td>
                        <td class="tdText border border-0"><input type="email" name="txt_user_email" class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['email'];?>'></td>
                    </tr>
                    <tr>
                        <td class="tdLabel text-end border border-0 pe-1">Phone:</td>
                        <td class="tdText border border-0"><input type="tel" name="txt_user_phone" class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['phone'];?>'></td>
                    </tr>
                    <tr>
                        <td class="tdLabel text-end border border-0 pe-1">type:</td>
                        <td class="tdText border border-0"><input type="tel" name="txt_user_type" class="bg-transparent text-light text-start ps-2" readonly value='<?php echo $users[$i]['type'];?>'></td>
                    </tr>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-1 mb-3">
                <button type="submit" class='btn btn-primary fs-3 mt-3' name='bt_user_edit'>Editer</button>
            </div>
        </form>
    </article>

    <?php } ?>

    </section>
</div>

<div class="mb-5">
    <?php include('../Elements/_05_select_page.php'); ?>
</div>
