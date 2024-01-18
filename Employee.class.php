<?php
include_once "Departement.class.php";
 class Employee{
    public $nom;
    public $prenom;
    public $salaire;
    function __construct($nom, $prenom ,$salair) {
        $this->nom = $nom;
        $this->prenom = $prenom ;
        $this->salaire = $salair;
        }

        function ajouter_employee() {
try {
    $cnx= Utils:: connecter_db();
    $rp= $cnx->prepare("insert into employe(nom,prenom,salaire) value(?,?,?)");
   $rp->execute([$this->nom,$this->prenom,$this->salaire]);
} catch (\Throwable $th) {
    echo "Erreur de connexion base de donnees ".$th->getMessage();
}
        }


}
?>