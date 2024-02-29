<form action="" method="post">

    <div class="d-sm-flex justify-content-sm-between p-3 mx-2 mb-2 mt-2 mx-md-5 bgDark border border-secondary border-3 rounded-4">

        <div class="container d-flex flex-column">
            
        <label for="select_car_brand" class="form-label text-light">Marque :</label>
            <select class="form-select fw-bolder rounded-3" id="select_car_brand" name="select_car_brand">
            <?php
                if(isset($_POST['select_car_brand'])){
                    $_SESSION['criteriaBrand'] = $_POST['select_car_brand'];
                }
            ?>
                <option value='<?php echo $_SESSION['criteriaBrand']; ?>'><?php echo $_SESSION['criteriaBrand']; ?></option>";
                <option value='Selectionnez une marque'>Selectionnez une marque</option>
            <?php

                include('../Model/brand.class.php');
                $Brands = new Brand();
                $MyBrand = $Brands->get(1,'name', 'ASC', 0, 50);
                unset($Brands);
                for($i=0;$i != count($MyBrand)-1;$i++) { ?>
                    <option value="<?php echo $MyBrand[$i]['name']; ?>"><?php echo $MyBrand[$i]['name']; ?></option>
            <?php } ?>
            </select>

        </div>

        <div class="container d-flex flex-column">

        <label for="select_car_model" class="form-label text-light">Modèle :</label>
            <select class="form-select fw-bolder rounded-3" id="select_car_model" name="select_car_model">
            <?php
                if(isset($_POST['select_car_model'])){
                    $_SESSION['criteriaModel'] = $_POST['select_car_model'];
                }
            ?>
                <option value='<?php echo $_SESSION['criteriaModel']; ?>'><?php echo $_SESSION['criteriaModel']; ?></option>";
                <option value='Selectionnez un modele'>Selectionnez un modele</option>";
            <?php

                include('../Model/model.class.php');
                $Models = new Model();
                $MyModel = $Models->get(1,'name', 'ASC', 0, 50);
                unset($Models);
                for($i=0;$i != count($MyModel)-1;$i++) { ?>
                    <option value="<?php echo $MyModel[$i]['name']; ?>"><?php echo $MyModel[$i]['name']; ?></option>
            <?php } ?>
            </select>

        </div>

        <div class="container d-flex flex-column">

        <label for="select_car_mileage" class="form-label text-light">Kms MAX :</label>
            <select class="form-select fw-bolder rounded-3" id="select_car_mileage" name="select_car_mileage">
            <?php
                if(isset($_POST['select_car_mileage'])){
                    $_SESSION['criteriaMileage'] = $_POST['select_car_mileage'];
                }
            ?>
                
                <option value='<?php echo $_SESSION['criteriaMileage']; ?>'><?php echo $_SESSION['criteriaMileage']; ?></option>";
                
                <option value='Selectionnez un kilometrage maxi'>Selectionnez un kilometrage maxi</option>
                <option value="10000">10000 km</option>
                <option value="20000">20000 km</option>
                <option value="30000">30000 km</option>
                <option value="40000">40000 km</option>
                <option value="50000">50000 km</option>
                <option value="60000">60000 km</option>
                <option value="70000">70000 km</option>
                <option value="80000">80000 km</option>
                <option value="90000">90000 km</option>
                <option value="100000">100000 km</option>
                <option value="150000">150000 km</option>
                <option value="200000">200000 km</option>
            </select>

        </div>

        <div class="container d-flex flex-column">

            <label for="select_car_price" class="form-label text-light">Prix MAX :</label>
            <select class="form-select fw-bolder rounded-3" id="select_car_price" name="select_car_price">
            <?php
                if(isset($_POST['select_car_price'])){
                    $_SESSION['criteriaPrice'] = $_POST['select_car_price'];
                }
            ?>
                
                <option value='<?php echo $_SESSION['criteriaPrice']; ?>'><?php echo $_SESSION['criteriaPrice']; ?></option>";
                
                <option value='Selectionnez un prix maxi'>Selectionnez un prix maxi</option>
                <option value="2500">2500 €</option>
                <option value="5000">5000 €</option>
                <option value="6000">6000 €</option>
                <option value="7000">7000 €</option>
                <option value="8000">8000 €</option>
                <option value="9000">9000 €</option>
                <option value="10000">10000 €</option>
                <option value="12500">12500 €</option>
                <option value="15000">15000 €</option>
                <option value="15500">17500 €</option>
                <option value="20000">20000 €</option>
                <option value="25000">25000 €</option>
                <option value="30000">30000 €</option>
                <option value="35000">35000 €</option>
                <option value="40000">40000 €</option>
                <option value="45000">45000 €</option>
                <option value="50000">50000 € et +</option>
            </select>

        </div>
        
        <div class="container d-flex flex-column  w-50 w-sm-25">
            <label for="btn-SearchCar" class="form-label text-light text-dark">Rechercher</label>
            <button class="btn btn-lg btn-primary px-3 py-2" type="submit" id="btn-SearchCar" name="btn-SearchCar">Rechercher</button>
        </div>

    </div>
</form>