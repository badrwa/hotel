<?php
include_once "Employee.class.php";
include_once "Departement.class.php";

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $salaire = $_POST['salaire'];
    $Nom = $_POST['nom_departement'];
    $address = $_POST['address'];

    if ($nom != null && $prenom != null && $salaire != null && $Nom != null && $address != null) {
        $employee = new Employee($nom, $prenom, $salaire);
        $employee->ajouter_employee();

        $departement = new Departement($Nom, $address);
        $departement->ajouter_departement();

        header("location:liste_de_employee.php");
    } else {
        echo "Fill in all the fields";
    }
}
?>

