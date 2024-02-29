<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Comment
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id;
		public function getId()
		{
			return $this->id;
		}
		public function setId($new)
		{
			$this->id = $new;
		}

		//-----------------------------------------------------------------------

		private $date_;
		public function getDate_()
		{
			return $this->date_;
		}
		public function setDate_($new)
		{
			$this->date_ = $new;
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

		private $rating;
		public function getRating()
		{
			return $this->rating;
		}
		public function setRating($new)
		{
			$this->rating = $new;
		}

		//-----------------------------------------------------------------------

		private $comment;
		public function getComment()
		{
			return $this->comment;
		}
		public function setComment($new)
		{
			$this->comment = $new;
		}

		//-----------------------------------------------------------------------

		private $id_menber;
		public function getIdMember()
		{
			return $this->id_menber;
		}
		public function setIdMember($new)
		{
			$this->id_menber = $new;
		}

		//-----------------------------------------------------------------------

		private $theComment;
		public function getComments($idComment)
		{
			include('../Controller/ConfigConnGP.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			/*
			    $sql = $bdd->query("SELECT
										`comment`.`id_comment`,
										`comment`.`date_`,
										`user`.`pseudo` AS `pseudo`,
										`comment`.`rating`,
										`comment`.`comment`,
										`user`.`avatar` AS `avatar`,
										`comment`.`id_member`

									FROM `comment`

									LEFT JOIN `user`
										ON `user`.`id_user` = `comment`.`id_member`

									LEFT JOIN `user` AS `userAvatar`
										ON `userAvatar`.`id_user` = `comment`.`id_member`
									
									WHERE `comment`.`id_comment`=$idComment
								");

				$this->theComment[] = $sql->fetch();
				return $this->theComment;
			*/

				// Préparez la requête avec un paramètre
				$sql = $bdd->prepare("SELECT
											`comment`.`id_comment`,
											`comment`.`date_`,
											`user`.`pseudo` AS `pseudo`,
											`comment`.`rating`,
											`comment`.`comment`,
											`user`.`avatar` AS `avatar`,
											`comment`.`id_member`
										
										FROM `comment`

										LEFT JOIN `user`
											ON `user`.`id_user` = `comment`.`id_member`
										LEFT JOIN `user` AS `userAvatar`
											ON `userAvatar`.`id_user` = `comment`.`id_member`
										
										WHERE `comment`.`id_comment` = :idComment");

				// Liaison du paramètre
				$sql->bindParam(':idComment', $idComment, PDO::PARAM_INT);

				// Exécution de la requête
				$sql->execute();

				// Récupération du résultat dans un tableau
				$this->theComment[] = $sql->fetch();

				// Fermeture de la requête
				$sql->closeCursor();

				// Retourne le tableau
				return $this->theComment;

			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $CommentList;
		public function get($whereClause, $orderBy = 'date_', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 30)
		{
			include('../Controller/ConfigConnGP.php');
			
			try
			{
				// Préparez la requête avec des paramètres
				$sql = $bdd->prepare("SELECT 
											`comment`.`id_comment`,
											`comment`.`date_`,
											`user`.`pseudo` AS `pseudo`,
											`comment`.`rating`,
											`comment`.`comment`,
											`user`.`avatar` AS `avatar`,
											`comment`.`id_member`
										FROM `comment`
										
										LEFT JOIN `user`
											ON `user`.`id_user` = `comment`.`id_member`
										LEFT JOIN `user` AS `userAvatar`
											ON `userAvatar`.`id_user` = `comment`.`id_member`
										
										WHERE $whereClause
										ORDER BY $orderBy $ascOrDesc
										LIMIT :firstLine, :linePerPage
									");

				// Liaison des paramètres
				$sql->bindParam(':firstLine', $firstLine, PDO::PARAM_INT);
				$sql->bindParam(':linePerPage', $linePerPage, PDO::PARAM_INT);

				// Exécution de la requête
				$sql->execute();
				
				while ($this->CommentList[] = $sql->fetch());

				// Fermeture de la requête
				$sql->closeCursor();

				// Retourne le tableau
				return $this->CommentList;

			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------
		private $idComment;
		public function addComment()
		{
			include('../Controller/ConfigConnGP.php');

			try{

				// Requête préparée
				$query = $bdd->prepare("SELECT `comment`.`id_comment`
										FROM  `comment`
										WHERE `comment`.`date_` = :date_
										AND `comment`.`pseudo` = :pseudo
										AND `comment`.`rating` = :rating
										AND `comment`.`comment` = :comment");

				// Liaison des valeurs
				$query->bindParam(':date_', $this->date_);
				$query->bindParam(':pseudo', $this->pseudo);
				$query->bindParam(':rating', $this->rating);
				$query->bindParam(':comment', $this->comment);

				// Exécution de la requête
				$query->execute();

				// Récupération du résultat
				$result = $query->fetch(PDO::FETCH_ASSOC);

				if (!$result) {


					$query = $bdd->prepare("INSERT INTO `comment` (`date_`, `pseudo`, `rating`, `comment`) VALUES (:date_, :pseudo, :rating, :comment)");

					// Liaison des valeurs
					$query->bindParam(':date_', $this->date_);
					$query->bindParam(':pseudo', $this->pseudo);
					$query->bindParam(':rating', $this->rating);
					$query->bindParam(':comment', $this->comment);

					// Exécution de la requête
					$query->execute();
					
					$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = $bdd->query("SELECT MAX(`id_comment`) AS idMax FROM `comment`");
					$result = $sql->fetch(PDO::FETCH_ASSOC);
					$this->id = $result['idMax'];

					echo '<script>alert("L\'enregistrement est effectué!");</script>';
				}

			}catch (Exception $e){
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateComment($idComment)
		{
			include('../Controller/ConfigConnGP.php');
			try
			{
				// Requête préparée
				$query = $bdd->prepare("UPDATE `comment`
				SET `date_` = :date_,
					`pseudo` = :pseudo,
					`rating` = :rating,
					`comment` = :comment
				WHERE `id_comment` = :idComment");

				// Liaison des valeurs
				$query->bindParam(':date_', $this->date_);
				$query->bindParam(':pseudo', $this->pseudo);
				$query->bindParam(':rating', $this->rating);
				$query->bindParam(':comment', $this->comment);
				$query->bindParam(':idComment', $idComment);

				// Exécution de la requête
				$query->execute();
				
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------
		
		public function deleteComment($id)
		{
			include('../Controller/ConfigConnGP.php');

			try {
				// Requête préparée pour la sélection
				$query = $bdd->prepare("SELECT `comment`.`id_comment`
										FROM  `comment`
										WHERE `comment`.`id_comment` = :id");

				// Liaison de la valeur
				$query->bindParam(':id', $id);

				// Exécution de la requête
				$query->execute();

				// Récupération du résultat
				$id_comment = $query->fetch(PDO::FETCH_COLUMN);

				// Vérification si l'ID existe
				if ($id_comment !== false) {
					// Requête préparée pour la suppression
					$deleteQuery = $bdd->prepare('DELETE FROM comment WHERE id_comment = :id_comment');

					// Liaison de la valeur
					$deleteQuery->bindParam(':id_comment', $id_comment);

					// Exécution de la requête de suppression
					$deleteQuery->execute();

					echo '<script>alert("Cet enregistrement est supprimé!");</script>';
				} else {
					// L'ID n'existe pas, gestion de l'erreur si nécessaire
					echo '<script>alert("L\'enregistrement avec cet ID n\'existe pas!");</script>';
				}
			} catch (Exception $e) {
				echo "Erreur de la requête : " . $e->getMessage();
			}

			$bdd = null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddComment()
        {
            if(is_null($_SESSION['addComment']))
            {
                $_SESSION['addComment']=false;
            }
            return $_SESSION['addComment'];
        }
        public function setAddSchedules($new)
        {
            $_SESSION['addComment']=$new;
        }

	}
	
?>