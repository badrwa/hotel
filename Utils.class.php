<?php
class Utils {
   static function connecter_db()  {
        
      try {
          $cnx = new PDO('mysql:host=localhost;dbname=db', "root", "");
          return $cnx;

        } catch (\Throwable $th) {
        echo "Erreur de connexion base de donnees ".$th->getMessage();

      }


    }
}


?>