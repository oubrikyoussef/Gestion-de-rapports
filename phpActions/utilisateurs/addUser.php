<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Retrieve form data
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status = $_POST['status-options']; // Use the name of the select element
        $niveau = $_POST['niveau-options']; // Use the name of the select element

        // Fetch the ID of filiere from the database based on the selected option
        $filiereOption = $_POST['filiere-options'];
        $selectFiliereStmt = $pdo->prepare("SELECT ID_filiere FROM filieres WHERE Nom_filiere = ?");
        $selectFiliereStmt->execute([$filiereOption]);
        $filiereRow = $selectFiliereStmt->fetch(PDO::FETCH_ASSOC);
        $id_filiere = $filiereRow['ID_filiere'];

        // Add user to database
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (Nom, Prenom,ID_role, ID_filiere, Email, Mot_de_passe) VALUES (?, ?, ?, ?, ?, ?)");
        $role_id = $status === "Etudiant" ? 1 : 5; // Adjust the value according to your database schema
        $stmt->execute([$nom, $prenom, $role_id, $id_filiere, $email, $password]);
        $user_id = $pdo->lastInsertId();

        // Add niveau if user is an etudiant
        if ($status === "Etudiant") { // Adjust the value according to your select options
            // Prepare a statement to select the ID of the niveau based on its name
            $selectNiveauStmt = $pdo->prepare("SELECT ID_niveau FROM niveaux WHERE Nom_niveau = ?");
            $selectNiveauStmt->execute([$niveau]);
            // Fetch the result (assuming each niveau name is unique)
            $niveauRow = $selectNiveauStmt->fetch(PDO::FETCH_ASSOC);
            // Get the ID_niveau from the fetched row
            $niveau_id = $niveauRow['ID_niveau'];
        
            // Prepare the INSERT statement for etudiants table
            $insertEtudiantStmt = $pdo->prepare("INSERT INTO etudiants (ID_utilisateur, ID_niveau) VALUES (?, ?)");
            // Execute the INSERT statement with user_id and niveau_id
            $insertEtudiantStmt->execute([$user_id, $niveau_id]);
        }
        echo json_encode(array('message' => 'User added successfully'));
    } catch (PDOException $e) {
        echo json_encode(array('error' => $e->getMessage()));
    }
}

// Close the connection
$pdo = null;
?>
