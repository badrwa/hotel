<?php
include_once "Utils.class.php";

class Employee
{
    public $nom;
    public $prenom;
    public $salaire;

    function __construct($nom, $prenom, $salaire)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->salaire = $salaire;
    }

    function ajouter_employee()
    {
        try {
            $cnx = Utils::connect_db();
            $rp = $cnx->prepare("INSERT INTO employe(nom, prenom, salaire) VALUES (?, ?, ?)");
            $rp->execute([$this->nom, $this->prenom, $this->salaire]);
        } catch (\Throwable $th) {
            echo "Erreur de connexion base de donnees " . $th->getMessage();
        }
    }

    public static function all()
    {
        try {
            $cnx = Utils::connect_db();
            $rp = $cnx->prepare("SELECT * FROM employe");
            $rp->execute();
            $resultat = $rp->fetchAll();
            return $resultat;
        } catch (\Throwable $th) {
            echo "Erreur de selection des employes " . $th->getMessage();
        }
    }



}

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $salaire = $_POST['salaire'];
}
?>
