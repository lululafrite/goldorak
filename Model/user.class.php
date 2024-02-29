<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class User
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

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

		private $type;
		public function getType()
		{
			return $this->type;
		}
		public function setType($new)
		{
			$this->type = $new;
		}

		//-----------------------------------------------------------------------

		private $newUser;
		public function getNewUser()
		{
			if(empty($_SESSION['newUser'])){
				$_SESSION['newUser'] = false;
				$this->newUser = false;
			}
			return $_SESSION['newUser'];
		}
		public function setNewUser($new)
		{
			$_SESSION['newUser'] = $new;
			$this->newUser = $new;
		}

		//-----------------------------------------------------------------------

		private $listPseudo;
		public function getPseudoUser()
		{
			include('../Controller/ConfigConnGP.php');

			try
			{
			    $sql = $bdd->query("SELECT `pseudo` FROM `user` ORDER BY `pseudo` ASC");

				while ($this->listPseudo[] = $sql->fetch());
				return $this->listPseudo;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $theUser;
		public function getUser($îdUser)
		{
			include('../Controller/ConfigConnGP.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			    $sql = $bdd->query("SELECT
										`user`.`id_user`,
										`user`.`name`,
										`user`.`surname`,
										`user`.`pseudo`,
										`user`.`email`,
										`user`.`phone`,
										`user`.`password`,
										`user_type`.`type` AS `type`

									FROM `user`

									LEFT JOIN `user_type`
										ON `user`.`id_type` = `user_type`.`id_type`
									
									WHERE `user`.`id_user`=$îdUser
								");

				
				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theUser[] = $sql->fetch();
				return $this->theUser;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $userList;
		public function get($whereClause, $orderBy = 'name', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include('../Controller/ConfigConnGP.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`user`.`id_user`,
										`user`.`name`,
										`user`.`surname`,
										`user`.`pseudo`,
										`user`.`email`,
										`user`.`phone`,
										`user`.`password`,
										`user_type`.`type` AS `type`
									FROM
										`user`
									LEFT JOIN `user_type` ON `user`.`id_type` = `user_type`.`id_type`
									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->userList[] = $sql->fetch());
				return $this->userList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function addUser()
		{
			include('../Controller/ConfigConnGP.php');

			try {
					$bdd->exec("INSERT INTO `user`(`name`,`surname`,`pseudo`,`email`,`phone`,`password`,`id_type`)
							VALUES('" . $this->name . "',
									'" . $this->surname . "',
									'" . $this->pseudo . "',
									'" . $this->email . "',
									'" . $this->phone . "',
									'" . $this->password . "',
									(SELECT `id_type` FROM `user_type` WHERE `type`='" . $this->type . "'))");

				$sql = $bdd->query("SELECT `id_user` FROM `user` WHERE `email`='" . $this->email . "'");
				$id_user = $sql->fetch();
				$this->id_user = intval($id_user['id_user']);
				return intval($id_user['id_user']);

			} catch (Exception $e) {
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateUser($idUser)
		{
			include('../Controller/ConfigConnGP.php');
			try
			{
				$bdd->exec("UPDATE `user` SET
								`name` = '" . $this->name . "',
								`surname` = '" . $this->surname . "',
								`pseudo` = '" . $this->pseudo . "',
								`email` = '" . $this->email . "',
								`phone` = '" . $this->phone . "',
								`password` = '" . $this->password . "',
								`id_type` = (SELECT `id_type` FROM `user_type` WHERE `type`='" . $this->type . "')
							WHERE `id_user` = " . intval($idUser) . "
							");
				
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$this->setType('Administrator');

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function deleteUser($id)
		{
			include('../Controller/ConfigConnGP.php');

			try
			{
			    $bdd->exec('DELETE FROM user WHERE id_user=' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
				echo '<script>window.location.href = "http://garageparrot/index.php?page=user";</script>';
				echo '<script>window.location.href = "http://www.follaco.fr/index.php?page=user";</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}
		
		private $userExist;
		public function verifUser($email)
		{
			include('../Controller/ConfigConnGP.php');

			try
			{
			    $sql = $bdd->query("SELECT COUNT(*) AS `number`
									FROM
										`user`
									WHERE
										`email` = '" . $email . "'
								");

				while ($this->userExist[] = $sql->fetch());
				return $this->userExist[0][0];
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddUser()
        {
            if(is_null($_SESSION['addUser']))
            {
                $_SESSION['addUser']=false;
            }
            return $_SESSION['addUser'];
        }
        public function setAddUser($new)
        {
            $_SESSION['addUser']=$new;
        }

	}
	
?>