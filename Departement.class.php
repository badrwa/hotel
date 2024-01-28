<?php
include_once "Utils.class.php";

class Departement
{
    public $Nom;
    public $address;

    function __construct($Nom, $address)
    {
        $this->Nom = $Nom;
        $this->address = $address;
    }

    function ajouter_departement()
    {
        try {
            $cnx = Utils::connect_db();
            $rp = $cnx->prepare("INSERT INTO departement(Nom, address) VALUES (?, ?)");
            $rp->execute([$this->Nom, $this->address]);
        } catch (\Throwable $th) {
            echo "Erreur de connexion base de donnees " . $th->getMessage();
        }
    }

    public static function all()
    {
        try {
            $cnx = Utils::connect_db();
            $rp = $cnx->prepare("SELECT * FROM departement");
            $rp->execute();
            $resultat = $rp->fetchAll();
            return $resultat;
        } catch (\Throwable $th) {
            echo "Erreur de selection des departements " . $th->getMessage();
        }
    }


    
}

if (isset($_POST['submit'])) {
    $Nom = $_POST['nom_departement'];
    $address = $_POST['address'];
}
?>
