<?php

class Model
{ // Début de la Classe

    private $bd;

    private static $instance = null;

    /*
     * Constructeur créant l'objet PDO et l'affectant à $bd
     */
    private function __construct()
    { // Fonction qui sert à faire le lien avec la BDD

        $dsn = "mysql:host=localhost;dbname=bd_livres"; // Coordonnées de la BDD
        $login = "root"; // Identifiant d'accès à la BDD
        $mdp = ""; // Mot de passe d'accès à la BDD
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->query("SET NAMES 'utf8'");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }


    // get_model()

    public static function get_model()
    { // Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller (équivalent de $connex)
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_all_livres()
    {

        $r = $this->bd->prepare("SELECT * FROM livres");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    //* Affichage titres
    public function get_all_titres()
    {

        $r = $this->bd->prepare("SELECT DISTINCT Titre FROM livres");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_titres_list()
    {
        $list = $_POST['titre'];
        $r = $this->bd->prepare("SELECT * FROM livres WHERE Titre = :Titre");
        $r->bindParam(':Titre', $list);
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    //* Affichage auteurs
    public function get_all_auteurs()
    {

        $r = $this->bd->prepare("SELECT DISTINCT Nom_auteur FROM livres");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_auteurs_list()
    {
        $list = $_POST['titre'];
        $r = $this->bd->prepare("SELECT * FROM livres WHERE Nom_auteur = '$list'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    //* Affichage pour les éditeurs
    public function get_all_editeurs()
    {

        $r = $this->bd->prepare("SELECT DISTINCT Editeur FROM livres");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_editeurs_list()
    {
        $list = $_POST['editeur'];
        $r = $this->bd->prepare("SELECT * FROM livres WHERE Editeur = '$list'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    //* Affichage fournisseurs
    public function get_all_fournisseurs()
    {

        $r = $this->bd->prepare("SELECT * FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_raison_sociale()
    {
        $r = $this->bd->prepare("SELECT DISTINCT raison_sociale FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_raison_sociale_list()
    {
        $list = $_POST['raison_sociale'];
        $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE raison_sociale = '$list'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_localite()
    {
        $r = $this->bd->prepare("SELECT DISTINCT localite FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_localite_list()
    {
        $list = $_POST['localite'];
        $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE localite = '$list'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_pays()
    {
        $r = $this->bd->prepare("SELECT DISTINCT pays FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_pays_list()
    {
        $list = $_POST['pays'];
        $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE pays = '$list'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    //* Insertion formulaire 
    public function get_insert_livre()
    {
        header('Location: Views/view_insert_livre.php');
    }

    //* Traitement formulaire
    public function get_traitement_insert_livre()
    {
        $ISBN = $_POST['isbn'];
        $Titre = $_POST['titre'];
        $Theme = $_POST['theme'];
        $NombrePages = $_POST['nbpages'];
        $Format = $_POST['format'];
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $Editeur = $_POST['editeur'];
        $Annee = $_POST['annee'];
        $Prix = $_POST['prix'];
        $Langue = $_POST['langue'];
        $r = $this->bd->prepare("INSERT INTO `livres`(`ISBN`, `Titre`, `Theme`, `Nb_pages`, `Format`, `Nom_auteur`, `Prenom_auteur`, `Editeur`, `Annee_edition`, `Prix`, `Langue`) 
        VALUES (:ISBN, :Titre, :Theme, :NombrePages, :Format, :Nom, :Prenom, :Editeur, :Annee, :Prix, :Langue)");
        $r->bindParam(':ISBN', $ISBN);
        $r->bindParam(':Titre', $Titre);
        $r->bindParam(':Theme', $Theme);
        $r->bindParam(':NombrePages', $NombrePages);
        $r->bindParam(':Format', $Format);
        $r->bindParam(':Nom', $Nom);
        $r->bindParam(':Prenom', $Prenom);
        $r->bindParam(':Editeur', $Editeur);
        $r->bindParam(':Annee', $Annee);
        $r->bindParam(':Prix', $Prix);
        $r->bindParam(':Langue', $Langue);
        $r->execute();
    }

}