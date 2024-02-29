<?php include('../Controller/connexion.controller.php'); ?>


<div class="container">

    <div class="row">
        
        <div class="mx-auto d-flex justify-content-center">

            <form class="bg-dark bg-opacity-75 m-5 p-5 rounded-4" action="/index.php?page=connexion" method="post">
                
                <fieldset class="">
                    
                    <legend class="text-center fs-1 text-light mb-3" >Connexion</legend>

                    <div class="form-group mb-3">
                        <label class="text-light w-100" for="email">email</label>
                        <input class="" type="email" id="email" name="email" placeholder="Saisissez votre email">
                    </div>

                    <div class="form-group mb-3">
                        <label class="text-light w-100" for="password">mot de passe</label>
                        <input class="" type="password" id="password" name="password" placeholder="Saisissez votre mot de passe">
                    </div>

                    <div class="form-group my-5">
                        <input class="btn btn-lg btn-primary fs-3" type="submit" name="envoyer" id="envoyer" value="Se connecter">
                    </div>

                </fieldset>
                
                <p ><a href="/index.php?page=connexion">Mot de passe oublié ?</a></p>

            </form>

        </div>

    </div>

</div>