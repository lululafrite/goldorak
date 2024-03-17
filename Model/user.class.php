<?php

	class User
	{
		private $id_user;
		public function getId()
		{
			return $this->id_user;
		}
		public function setId($new)
		{
			$this->id_user = $new;
		}

		//-----------------------------------------------------------------------

		private $name;
		public function getName()
		{
			return $this->name;
		}
		public function setName($new)
		{
			$this->name = $new;
		}

		//-----------------------------------------------------------------------

		private $surname;
		public function getSurname()
		{
			return $this->surname;
		}
		public function setSurname($new)
		{
			$this->surname = $new;
		}

		//-----------------------------------------------------------------------

		private $pseudo;
		public function getPseudo()
		{
			return $this->pseudo;
		}
		public function setPseudo($new)
		{
			$this->pseudo = $new;
		}

		//-----------------------------------------------------------------------

		private $email;
		public function getEmail()
		{
			return $this->email;
		}
		public function setEmail($new)
		{
			$this->email = $new;
		}

		//-----------------------------------------------------------------------

		private $phone;
		public function getPhone()
		{
			return $this->phone;
		}
		public function setPhone($new)
		{
			$this->phone = $new;
		}

		//-----------------------------------------------------------------------

		private $password;
		public function getPassword()
		{
			return $this->password;
		}
		public function setPassword($new)
		{
			$this->password = $new;
		}

		//-----------------------------------------------------------------------

		private $avatar;
		public function getAvatar()
		{
			return $this->avatar;
		}
		public function setAvatar($new)
		{
			$this->avatar = $new;
		}

		//-----------------------------------------------------------------------

		private $subscription;
		public function getSubscription()
		{
			return $this->subscription;
		}
		public function setSubscription($new)
		{
			$this->subscription = $new;
		}
	
		private function getSubscriptionId() {

			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);
			
			$stmt = $bdd->prepare("SELECT `id_subscription` FROM `subscription` WHERE `subscription` = ?");
			$stmt->execute([$this->subscription]);
			$result = $stmt->fetch();
			return $result['id_subscription'];

		}

		//-----------------------------------------------------------------------

		private $type;
		public function getType()
		{
			return $this->type;
		}
		public function setType($new)
		{
			$this->type = $new;
		}
	
		private function getUserTypeId() {

			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			$stmt = $bdd->prepare("SELECT `id_type` FROM `user_type` WHERE `type` = ?");
			$stmt->execute([$this->type]);
			$result = $stmt->fetch();
			return $result['id_type'];

		}

		//-----------------------------------------------------------------------

		private $newUser;
		public function getNewUser()
		{
			return $this->newUser;
		}
		public function setNewUser($new)
		{
			$this->newUser = $new;
		}

		//-----------------------------------------------------------------------

		private $listPseudo;
		public function getPseudoUser()
		{
			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			try {
				// Utilisation d'une requête préparée pour améliorer la sécurité même si aucun paramètre n'est utilisé ici
				$stmt = $bdd->prepare("SELECT `pseudo` FROM `user` ORDER BY `pseudo` ASC");

				// Exécutez la requête
				$stmt->execute();

				$this->listPseudo = [];
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$this->listPseudo[] = $row['pseudo'];
				}

				return $this->listPseudo;
			} catch (Exception $e) {
				echo "Erreur de la requete : function getPseudoUser() :" . $e->getMessage();
			}

			$bdd = null;
		}

		//-----------------------------------------------------------------------

		private $theUser;
		public function getUser($idUser)
		{
			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			date_default_timezone_set($_SESSION['timeZone']);

			try
			{
				$stmt = $bdd->prepare("SELECT
										`user`.`id_user`,
										`user`.`name`,
										`user`.`surname`,
										`user`.`pseudo`,
										`user`.`email`,
										`user`.`phone`,
										`user`.`password`,
										`user`.`avatar`,
										`subscription`.`subscription` AS 'subscription',
										`user_type`.`type` AS `type`

									FROM `user`

									LEFT JOIN `subscription`
										ON `user`.`id_subscription` = `subscription`.`id_subscription`

									LEFT JOIN `user_type`
										ON `user`.`id_type` = `user_type`.`id_type`

									WHERE `user`.`id_user` = :idUser");

				$stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);

				$stmt->execute();

				$this->theUser = $stmt->fetch(PDO::FETCH_ASSOC);

				return $this->theUser;

			} catch (Exception $e) {

				echo "Erreur de la requete : function getUser(\$idUser) :" . $e->GetMessage();

			}

			$bdd = null;
		}

		//-----------------------------------------------------------------------

		private $userList;
		public function get($whereClause, $orderBy = 'name', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			try
			{

				$sqlString = "SELECT
								`user`.`id_user`,
								`user`.`name`,
								`user`.`surname`,
								`user`.`pseudo`,
								`user`.`email`,
								`user`.`phone`,
								`user`.`password`,
								`user`.`avatar`,
								`subscription`.`subscription` AS 'subscription',
								`user_type`.`type` AS `type`

							FROM `user`

							LEFT JOIN `subscription`
								ON `user`.`id_subscription` = `subscription`.`id_subscription`

							LEFT JOIN `user_type`
								ON `user`.`id_type` = `user_type`.`id_type`

							WHERE " . $whereClause . " 
							ORDER BY " . $orderBy . " " . $ascOrDesc . " 
							LIMIT :firstLine, :linePerPage";

				$stmt = $bdd->prepare($sqlString);

				// Lier les paramètres pour LIMIT
				$stmt->bindParam(':firstLine', $firstLine, PDO::PARAM_INT);
				$stmt->bindParam(':linePerPage', $linePerPage, PDO::PARAM_INT);

				$stmt->execute();

				$this->userList = [];
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$this->userList[] = $row;
				}

				return $this->userList;

			} catch (Exception $e) {

				echo "Erreur de la requete : function get(\$whereClause, \$orderBy = 'name', \$ascOrDesc = 'ASC', \$firstLine = 0, \$linePerPage = 13) : " . $e->GetMessage();

			}

			$bdd = null;
		}

		//-----------------------------------------------------------------------

		public function addUser() {

			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);
	
			try
			{
				// Vérifier si l'email existe déjà
				$stmt = $bdd->prepare("SELECT `id_user` FROM `user` WHERE `email` = ?");
				$stmt->execute([$this->email]);
				$result = $stmt->fetch();
	
				if(!$result){
					// Vérifier si le pseudonyme existe déjà
					$stmt = $bdd->prepare("SELECT `id_user` FROM `user` WHERE `pseudo` = ?");
					$stmt->execute([$this->pseudo]);
					$result = $stmt->fetch();
	
					if(!$result){
						// Insérer un nouvel utilisateur
						$stmt = $bdd->prepare("INSERT INTO `user`(`name`,
																`surname`,
																`pseudo`,
																`email`,
																`phone`,
																`password`,
																`avatar`,
																`id_subscription`,
																`id_type`)
											  VALUES(?,?,?,?,?,?,?,?,?)");

						$stmt->execute([$this->name, $this->surname, $this->pseudo, $this->email, $this->phone, $this->password,
										$this->avatar, $this->getSubscriptionId(), $this->getUserTypeId()]);
	
						// Récupérer l'ID de l'utilisateur nouvellement inséré
						try{
							$stmt = $bdd->prepare("SELECT MAX(`id_user`) AS max_id FROM `user`");
							$stmt->execute();
							$id_user_ = $stmt->fetch(PDO::FETCH_ASSOC);
							
							$this->id_user = intval($id_user_['max_id']);
							return $this->id_user;

						}catch (PDOException $e){
							echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
						}

					} else {

						echo "<script>alert('Ce pseudonyme est existant! Saisissez un autre pseudonyme');</script>";
						return false;

					}

				}else{

					echo "<script>alert('Ce courriel est existant! Saisissez un autre courriel');</script>";
					
					include_once('../common/utilies.php');
					returnNewError();

				}
			}
			catch (Exception $e)
			{
				echo "Erreur de la requête function addUser() : " . $e->getMessage();
			}
			finally
			{
				$bdd = null;
			}
		}

		//-----------------------------------------------------------------------

		public function updateUser($idUser){

			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			try
			{
				$stmt = $bdd->prepare("UPDATE `user` SET
										`name` = :name,
										`surname` = :surname,
										`pseudo` = :pseudo,
										`email` = :email,
										`phone` = :phone,
										`password` = :password,
										`avatar` = :avatar,
										`id_subscription` = (SELECT `id_subscription` FROM `subscription` WHERE `subscription` = :subscription),
										`id_type` = (SELECT `id_type` FROM `user_type` WHERE `type` = :type)
									WHERE `id_user` = :id_user");

				$stmt->bindParam(':name', $this->name);
				$stmt->bindParam(':surname', $this->surname);
				$stmt->bindParam(':pseudo', $this->pseudo);
				$stmt->bindParam(':email', $this->email);
				$stmt->bindParam(':phone', $this->phone);
				$stmt->bindParam(':password', $this->password);
				$stmt->bindParam(':avatar', $this->avatar);
				$stmt->bindParam(':subscription', $this->subscription);
				$stmt->bindParam(':type', $this->type);
				$stmt->bindParam(':id_user', $idUser, PDO::PARAM_INT);

				$stmt->execute();
				
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete  : function updateUser(\$idUser) :" . $e->GetMessage();
			}

			$bdd=null;
		}


		//-----------------------------------------------------------------------

		public function deleteUser($id)
		{
			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			try
			{

				$stmt = $bdd->prepare('DELETE FROM user WHERE id_user = :id_user');
			
				$stmt->bindParam(':id_user', $id, PDO::PARAM_INT);
			
				$stmt->execute();

				$bdd=null;
				return true;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
				$bdd=null;
				return false;
			}

		}
		
		private $userExist;
		public function verifUser($email)
		{
			include_once('../Model/dbConnect.class.php');
			$dbConnect_ = new dbConnect();
			$bdd = $dbConnect_->connectionDb();
            unset($dbConnect_);

			try
			{

				$stmt = $bdd->prepare("SELECT COUNT(*) AS `number`
									FROM `user`
									WHERE `email` = :email");

				$stmt->bindParam(':email', $email);

				$stmt->execute();

				$this->userExist = $stmt->fetch(PDO::FETCH_ASSOC);

				return $this->userExist['number'];

			}
			catch (Exception $e)
			{

				echo "Erreur de la requete : function verifUser(\$email) :" . $e->GetMessage();

			}

			$bdd = null;
		}

	}
	
?>