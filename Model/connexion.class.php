<?php
	class userConnect
    {        
        private $type;
        public function getUserConnect()
        {
            if(is_null($this->type))
            {
                $this->type = 'Guest';
                $_SESSION['typeConnect'] = 'Guest';
            }
            return $this->type;
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

			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();

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
                
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $pw, PDO::PARAM_STR);
                
                    $stmt->execute();

                    $this->dataConnect = $stmt->fetch();
                    return $this->dataConnect;

                } catch (PDOException $e) {
                    
                    echo "Error in the query: " . $e->getMessage();
                    $MyUserConnect->SetConnexion(false);

                }
        }
    }
?>