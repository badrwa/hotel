
<?php
include_once "Utils.class.php";
 class Departement{
    public $nom;
    public $address;
    function __construct($nom, $address ) {
        $this->nom = $nom;
        $this->address = $address ;

        }


     function ajouter_departement() {
try {
   $cnx = Utils:: connecter_db();
    $rp= $cnx->prepare("insert into departement(nom,address) value(?,?)");
   $rp->execute([$this->nom,$this->address]);
 }catch (\Throwable $th) {
    echo "Erreur de connexion base de donnees ".$th->getMessage();
}   
} 
 

}
?>
