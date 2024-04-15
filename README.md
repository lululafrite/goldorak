# Site web du Club Goldorak

Pour visualiser ce site, rendez-vous à l'adresse suivante : https://www.follaco.fr/goldorak/public/index.php?page=home

Ce site a pour objet de faire connaitre l'association destinée aux passionnés de Goldorak, manga à l'énorme succès des années 80. Le site propose des actualités, des photos, des vidéos, des juex, des produits dérivés et beaucoup d'autres informations. Vous y trouverez également les l’actualité sur goldorak et les événement à venir organisés par l’association.

Le manuel ci-dessous d'écrit uniquement les étapes principales à respecter pour travailler en local ou en online.
Pour accéder aux documents du dossier technique :
php.txt : https://www.follaco.fr/goldorak/public/Dossier_Technique/php.txt
launch.txt : https://www.follaco.fr/goldorak/public/Dossier_Technique/launch.txt
bdd_goldorak.sql : https://www.follaco.fr/goldorak/public/Dossier_Technique/bdd_goldorak.sql

POUR TRAVAILLER EN LOCAL

Installez WAMPSERVER avec php 8.2 et mariadb 10.11.5
Assurez-vous que la base de données mariadb soit accéssible sur le port 3307
Configurez le fichier php.ini en utilisant le modèle tuto/php. Cette configuration est importante pour le téléchargement des images et pour activer xdebug.
Utiliser l'extension PDO
Clonez le projet avec GIT dans le dossier wwww de wampserver
Pour VS CODE, installez les extentions suivantes :
Composer
Mysql Autocomplete
php debug
php extension pack
php intelephense
Configurez le fichier launch.json de VS Code
Référez-vous au fichier Dossier_Techinique/launch.txt
Base de données (mariadb)
Concervez votre utilisateur 'root' sans mot de passe avec tous les privilèges
Créer le schéma nommé 'goldorak'
Importer le fichier bdd_goldorak.sql dans votre schéma
Agir sur le fichier Public/index.php Tout en haut du fichier Public/index.php :
Décommentez la ligne : include_once '../module/debug.php';
Dans le fichier module/variable.php, passez la variable $_SESSION['local'] à true. Exemple : $_SESSION['local']=true; Cette variable agit sur la classe 'dbConnect.class.php' pour les paramètres de connexion (true pour local et false pour online).
PS : il y a 4 types de profil : Le visiteur (Guest), le Membre (Member), l'employé (User) et l'administrateur (Administrator).
Les Membres, les utilisateurs et les administrateurs doivent se connecter avec un identifiant (email) et un mot de passe.
L'utilisateur posséde des privilèges de modérateur sur les commentaires. Seuls les commentaires non filtrés sont affichés
L'administrateur a les mêmes privilèges que l'utilisateur avec en plus, la possibilité de modifier le contenu de la page d'accueil, de créer des nouveaux profils pouvant-être : Member, User ou administrator et peut également changer l'état de modération d'un commentaire (Attention, un commentaire supprimé ne peu plus être récupéré).
Des profil par défaut sont déjà disponibles :
User | ID : user@gmail.com | PW : User123/
Administrator | ID : admin@gmail.com | PW : Admin123/
Membre adhérant à la formule :
Vénusia | ID : venusia@gmail.com | PW : Venusia123/
Actarus | ID : actarus@gmail.com | PW : Actarus123/
Goldorak | ID : goldorak@gmail.com | PW : Goldorak123/

POUR TRAVAILLER ONLINE

Agir sur le fichier Public/index.php Tout en haut du fichier Public/index.php :
Décommentez la ligne : //include_once '../module/debug.php';
Dans le fichier module/variable.php, passez la variable $_SESSION['local'] à false. Exemple : $_SESSION['local']=false; Cette variable agit sur  la classe 'dbConnect.class.php' pour les paramètres de connexion (true pour local et false pour online).
Utilisateur de la Base de données
Produire un utilisateur possédant tous les privilèges avec un nom d'utilisateur différent de root et un mot de passe sécurisé.
Uploadez le projet sur le serveur online
Avec filezilla, updoadez les dossiers et fichier disponible dans github https://github.com/lululafrite/goldorak.git git clone https://github.com/lululafrite/goldorak.git
PS : il y a 4 types de profil : Le visiteur (Guest), le Membre (Member), l'employé (User) et l'administrateur (Administrator).
Les Membres, les utilisateurs et les administrateurs doivent se connecter avec un identifiant (email) et un mot de passe.
L'utilisateur posséde des privilèges de modérateur sur les commentaires. Seuls les commentaires non filtrés sont affichés
L'administrateur a les mêmes privilèges que l'utilisateur avec en plus, la possibilité de modifier le contenu de la page d'accueil, de créer des nouveaux profils pouvant-être : Member, User ou administrator et peut également changer l'état de modération d'un commentaire (Attention, un commentaire supprimé ne peu plus être récupéré).
Des profil par défaut sont déjà disponibles :
User | ID : user@gmail.com | PW : User123/
Administrator | ID : admin@gmail.com | PW : Admin123/
Membre adhérant à la formule :
Vénusia | ID : venusia@gmail.com | PW : Venusia123/
Actarus | ID : actarus@gmail.com | PW : Actarus123/
Goldorak | ID : goldorak@gmail.com | PW : Goldorak123/