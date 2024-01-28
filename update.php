<?php
include_once "Utils.class.php";

if (isset($_GET['id'])) {
    $employee_id_to_update = $_GET['id'];
    $data = Utils::find_by_id($employee_id_to_update);
    $employee_data = $data['employee'];
    $department_data = $data['department'];
} else {
    header("Location: liste_de_employee.php");
    exit();
}

if (isset($_POST['update_employee_and_department'])) {
    $employee_data = [
        'nom' => $_POST['employee_nom'],
        'prenom' => $_POST['employee_prenom'],
        'salaire' => $_POST['employee_salaire']
    ];
    $department_data = [
        'Nom' => $_POST['department_Nom'],
        'address' => $_POST['department_address']
    ];
    Utils::update_employee_and_department($employee_id_to_update, $employee_data, $department_data); 
    header("Location: liste_de_employee.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Update Employee and Department</h2>

        <form method="post" action="liste_de_employee.php">
            <input type="hidden" name="employee_id_to_update" value="<?= $employee_id_to_update ?>">

            <div class="mb-3">
                <label for="employee_nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="employee_nom" name="employee_nom" value="<?= $employee_data['nom'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="employee_prenom" class="form-label">Prenom:</label>
                <input type="text" class="form-control" id="employee_prenom" name="employee_prenom" value="<?= $employee_data['prenom'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="employee_salaire" class="form-label">Salaire:</label>
                <input type="number" class="form-control" id="employee_salaire" name="employee_salaire" value="<?= $employee_data['salaire'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="department_Nom" class="form-label">Nom Departement:</label>
                <input type="text" class="form-control" id="department_Nom" name="department_Nom" value="<?= $department_data['Nom'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="department_address" class="form-label">Address Departement:</label>
                <input type="text" class="form-control" id="department_address" name="department_address" value="<?= $department_data['address'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" name="update_employee_and_department">Update</button>
        </form>
    </div>
</body>
</html>
