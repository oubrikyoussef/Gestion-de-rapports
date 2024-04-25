<?php
include("../connection.php");
session_start();
// Define variables
$email = $password = "";
$error_message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if email and password are not empty
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        
        // Sanitize and store form data
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = htmlspecialchars(trim($_POST["password"]));

        // Prepare SQL statement to retrieve user data with role information
        $sql = "SELECT u.*, r.Nom_role , f.Nom_filiere
                FROM utilisateurs u 
                JOIN roles r ON u.ID_role = r.ID_role 
                JOIN filieres f ON u.ID_filiere = f.ID_filiere 
                WHERE u.Email = ?
                ";
        
        try {
            // Execute SQL statement
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            
            // Check if user exists
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch();
                
                // Verify password
                if ($password === $row["Mot_de_passe"]) {
                    // Store user data in session
                    $_SESSION["loggedin"] = true;
                    $_SESSION["ID_utilisateur"] = $row["ID_utilisateur"];
                    $_SESSION["Nom"] = $row["Nom"];
                    $_SESSION["Prenom"] = $row["Prenom"];
                    $_SESSION["Email"] = $row["Email"];
                    $_SESSION["Nom_role"] = $row["Nom_role"];
                    $_SESSION["Nom_filiere"] = $row["Nom_filiere"];

                    // Return success message
                    echo json_encode(array("success" => true));
                    exit;
                } else {
                    $error_message = "Le mot de passe est incorrect.";
                }
            } else {
                $error_message = "L'email n'existe pas.";
            }
        } catch (PDOException $e) {
            $error_message = "Une erreur s'est produite lors de la connexion.";
        }

        // Close the cursor and database connection
        $stmt->closeCursor();
        $pdo = null;
    }
    
    // Return error message
    echo json_encode(array("success" => false, "message" => $error_message));
}
?>
