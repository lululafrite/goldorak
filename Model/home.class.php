<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Home
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id_home;
		public function getId()
		{
			return $this->id_home;
		}
		public function setId($new)
		{
			$this->id_home = $new;
		}

		//-----------------------------------------------------------------------

		private $titre1;
		public function getTitre1()
		{
			return $this->titre1;
		}
		public function setTitre1($new)
		{
			$this->titre1 = $new;
		}

		//-----------------------------------------------------------------------

		private $titre_chapter1;
		public function getTitre_chapter1()
		{
			return $this->titre_chapter1;
		}
		public function setTitre_chapter1($new)
		{
			$this->titre_chapter1 = $new;
		}

		//-----------------------------------------------------------------------

		private $chapter1;
		public function getChapter1()
		{
			return $this->chapter1;
		}
		public function setChapter1($new)
		{
			$this->chapter1 = $new;
		}

		//-----------------------------------------------------------------------

		private $img_chapter1;
		public function getImg_chapter1()
		{
			return $this->img_chapter1;
		}
		public function setImg_chapter1($new)
		{
			$this->img_chapter1 = $new;
		}

		//-----------------------------------------------------------------------

		private $titre_chapter2;
		public function getTitre_chapter2()
		{
			return $this->titre_chapter2;
		}
		public function setTitre_chapter2($new)
		{
			$this->titre_chapter2 = $new;
		}

		//-----------------------------------------------------------------------

		private $chapter2;
		public function getChapter2()
		{
			return $this->chapter2;
		}
		public function setChapter2($new)
		{
			$this->chapter2 = $new;
		}

		//-----------------------------------------------------------------------

		private $img_chapter2;
		public function getImg_chapter2()
		{
			return $this->img_chapter2;
		}
		public function setImg_chapter2($new)
		{
			$this->img_chapter2 = $new;
		}

		//-----------------------------------------------------------------------

		private $theHome;
		public function getHome($îdHome)
		{
			include('../Controller/ConfigConn.php');
            date_default_timezone_set($_SESSION['timeZone']);
			
			try
			{
			    $sql = $bdd->query("SELECT
										`home`.`id_home`,
										`home`.`titre1`,
										`home`.`titre_chapter1`,
										`home`.`chapter1`,
										`home`.`img_chapter1`,
										`home`.`titre_chapter2`,
										`home`.`chapter2`,
										`home`.`img_chapter2`

									FROM `home`
									
									WHERE `home`.`id_home`=$îdHome
								");

				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theHome[] = $sql->fetch();
				return $this->theHome;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $homeList;
		public function get($whereClause, $orderBy = 'id_home', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include('../Controller/ConfigConn.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`home`.`id_home`,
										`home`.`titre1`,
										`home`.`titre_chapter1`,
										`home`.`chapter1`,
										`home`.`img_chapter1`,
										`home`.`titre_chapter2`,
										`home`.`chapter2`,
										`home`.`img_chapter2`

									FROM `home`

									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->homeList[] = $sql->fetch());
				return $this->homeList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateHome($idHome)
		{
			include('../Controller/ConfigConn.php');
			try{
				$stmt = $bdd->prepare("UPDATE `home`
				SET `titre1` = ?,
					`titre_chapter1` = ?,
					`chapter1` = ?,
					`img_chapter1` = ?,
					`titre_chapter2` = ?,
					`chapter2` = ?,
					`img_chapter2` = ?
					
				WHERE `id_home` = ?");

				$stmt->execute([$this->titre1,
						$this->titre_chapter1,
						$this->chapter1,
						$this->img_chapter1,
						$this->titre_chapter2,
						$this->chapter2,
						$this->img_chapter2,
						$idHome]);
							
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (PDOException $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function deleteHome($id)
		{
			include('../Controller/ConfigConn.php');

			try
			{
			    $bdd->exec('DELETE FROM home WHERE id_home =' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddHome()
        {
            if(is_null($_SESSION['addHome']))
            {
                $_SESSION['addHome']=false;
            }
            return $_SESSION['addHome'];
        }
        public function setAddHome($new)
        {
            $_SESSION['addHome']=$new;
        }

	}
	
?>