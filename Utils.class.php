<?php
class Utils {
    static function connect_db() {
        try {
            $cnx = new PDO('mysql:host=localhost;dbname=db', 'root', '');
            return $cnx;
        } catch (PDOException $e) {
            throw new Exception("Database connection error: " . $e->getMessage());
        }
    }

    static function delete_employee_and_department($id) {
        try {
            $cnx = Utils::connect_db();

            // Delete employee
            $rpEmployee = $cnx->prepare("DELETE FROM employe WHERE id = ?");
            $rpEmployee->execute([$id]);

            // Delete corresponding department
            $rpDepartment = $cnx->prepare("DELETE FROM departement WHERE id = ?");
            $rpDepartment->execute([$id]);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    static function update_employee_and_department($employee_id, $employee_data, $department_data) {
      try {
          $cnx = Utils::connect_db();

          // Update employee
          $rpEmployee = $cnx->prepare("UPDATE employe SET nom = ?, prenom = ?, salaire = ? WHERE id = ?");
          $rpEmployee->execute([$employee_data['nom'], $employee_data['prenom'], $employee_data['salaire'], $employee_id]);

          // Update department
          $rpDepartment = $cnx->prepare("UPDATE departement SET Nom = ?, address = ? WHERE id = ?");
          $rpDepartment->execute([$department_data['Nom'], $department_data['address'], $employee_id]);
      } catch (PDOException $e) {
          throw new Exception("Database error: " . $e->getMessage());
      }
  }

  static function find_by_id($id) {
    try {
        $cnx = Utils::connect_db();

        // Retrieve employee and department information by ID
        $rpEmployee = $cnx->prepare("SELECT * FROM employe WHERE id = ?");
        $rpEmployee->execute([$id]);
        $employee = $rpEmployee->fetch(PDO::FETCH_ASSOC);

        $rpDepartment = $cnx->prepare("SELECT * FROM departement WHERE id = ?");
        $rpDepartment->execute([$id]);
        $department = $rpDepartment->fetch(PDO::FETCH_ASSOC);

        return ['employee' => $employee, 'department' => $department];
    } catch (PDOException $e) {
        throw new Exception("Database error: " . $e->getMessage());
    }
}

}