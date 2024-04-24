<?php
// Include database connection or any necessary files
include('../connection.php');
// Sample code to get you started, adjust as per your database schema and requirements

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    // Check if a file was uploaded and perform file validation
    // Check if a file was uploaded and perform file validation
if (isset($_FILES['rapport']) && $_FILES['rapport']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['rapport']['name'];
    $fileTmpPath = $_FILES['rapport']['tmp_name'];

    // Insert the report details into the database
    try {
        // Prepare the INSERT statement
        $stmt = $pdo->prepare("INSERT INTO rapports_stage (Titre_rapport, Description_rapport, Chemin_fichier, Date_depot) VALUES (?, ?, ?, ?)");
        // Bind parameters
        $currentDate = date('Y-m-d');
        $stmt->bindParam(1, $titre);
        $stmt->bindParam(2, $description);
        $stmt->bindValue(3, 'temp', PDO::PARAM_STR); // Use a temporary file name
        $stmt->bindParam(4, $currentDate);
        // Execute the statement
        $stmt->execute();

        // Retrieve the ID of the last inserted row
        $lastInsertId = $pdo->lastInsertId();

        // Get the original file extension
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        // Rename the file with the ID of the last inserted row and the original file extension
        $newFileName = $lastInsertId . '.' . $fileExtension;
        $uploadPath = '../../reports/' . $newFileName;

        // Move the uploaded file to a desired location (e.g., uploads directory)
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Update the file name in the database
            $stmt = $pdo->prepare("UPDATE rapports_stage SET Chemin_fichier = ? WHERE ID_rapport = ?");
            $stmt->bindParam(1, $uploadPath);
            $stmt->bindParam(2, $lastInsertId);
            $stmt->execute();

            // Example success message
            echo json_encode(array('message' => 'Rapport ajouté avec succès'));
        } else {
            // Handle file move error
            echo json_encode(array('error' => 'Échec du déplacement du fichier.'));
        }
    } catch (PDOException $e) {
        // Handle database insertion error
        echo json_encode(array('error' => 'Échec de l\'ajout du rapport à la base de données.'));
    }
} else {
    // Handle file upload error
    echo json_encode(array('error' => 'Échec du téléchargement du fichier.'));
}
}

// Close the database connection
$pdo = null;
?>
