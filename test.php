<?php
include_once "Employee.class.php";
include_once "Departement.class.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service de l'hôtel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="store.php" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>Nom :</td>
                    <td><input type="text" class="form-control" name="nom" placeholder="Nom"></td>
                </tr>
                <tr>
                    <td>Prénom :</td>
                    <td><input type="text" class="form-control" name="prenom" placeholder="Prénom"></td>
                </tr>
                <tr>
                    <td>Salaire :</td>
                    <td><input type="number" class="form-control" name="salaire" placeholder="Salaire"></td>
                </tr>
                <tr>
                    <td>Nom département :</td>
                    <td><input type="text" class="form-control" name="nom_departement" placeholder="Nom département"></td>
                </tr>
                <tr>
                    <td>Address :</td>
                    <td><input type="text" class="form-control" name="address" placeholder="Address"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" class="btn btn-primary" name="submit">Ajouter un employé</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
