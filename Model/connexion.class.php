<?php
	class userConnect
    {
        public function __construct()
        {
        }
        
        private $type;
        public function getUserConnect()
        {
            if(is_null($this->type)) //is_null($_SESSION['type']))
            {
                $this->type = 'Guest';
                $_SESSION['typeConnect'] = 'Guest';
            }
            return $this->type; // $_SESSION['type'];
        }

        public function SetUserConnect($new)
        {
            $_SESSION['typeConnect'] = $new;
            $this->type = $new;
        }
        
        private $connexion;
        public function getConnexion()
        {
            $_SESSION['connexion'] = $this->connexion;
            return $_SESSION['connexion'];
        }

        public function SetConnexion($new)
        {
            $_SESSION['connexion'] = $new;
            $this->connexion = $new;
        }

        private $dataConnect;
        public function queryConnect($email,$pw){

            require('../Controller/ConfigConn.php');

            try {
                    $stmt = $bdd->prepare("SELECT `pseudo`,
                                                    `avatar`,
                                                    `user_type`.`type` AS `type`,
                                                    `subscription`.`subscription` AS `subscription`

                                            FROM `user`

                                            LEFT JOIN `user_type`
                                                ON `user`.`id_type` = `user_type`.`id_type`

                                            LEFT JOIN `subscription`
                                                ON `user`.`id_subscription` = `subscription`.`id_subscription`

                                            WHERE `email` = :email AND `password` = :password");
                
                    // Bind parameters
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $pw, PDO::PARAM_STR);
                
                    // Execute the query
                    $stmt->execute();
                
                    // Fetch the result
                    $this->dataConnect = $stmt->fetch();
                
                    // Check if the result exists
                    //if ($this->dataConnect) {
                        
                        return $this->dataConnect;

                    //} else {

                        //echo '<script>window.location.href = "http://goldorak/index.php?page=error_page";</script>';
                        //return false;

                    //}

                } catch (PDOException $e) {
                    
                    echo "Error in the query: " . $e->getMessage();
                    $MyUserConnect->SetConnexion(false);

                }
        }
    }
?>