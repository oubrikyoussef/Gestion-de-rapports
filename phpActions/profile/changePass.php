<?php
session_start();
include("../connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["pass"]) && !empty($_POST["pass-confirm"])){
         
        $new_pass = $_POST["pass"];
        $passConf = $_POST["pass-confirm"];
        if(strlen($new_pass) >= 8 && $new_pass == $passConf){
            $id_utilisateur = $_SESSION["ID_utilisateur"];
            try{
                $sql = "UPDATE utilisateurs SET Mot_de_passe = :new_pass WHERE ID_utilisateur = :id_utilisateur";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':new_pass', $new_pass);
                $stmt->bindParam(':id_utilisateur', $id_utilisateur);                
                if($stmt->execute()){
                    echo "yes";
                } else {
                    echo "error1";
                }
            } catch(mysqli_sql_exception $e){
                echo "error2";
            }
            $stmt->closeCursor();
            $pdo = null;
            
        } else {
            echo "error3";
        }
    } else {
        echo "error4";
    }
}
?>
