<?php
// Include database connection or any necessary files
include('../connection.php');

// Sample code to get you started, adjust as per your database schema and requirements

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    // Check if a file was uploaded and perform file validation
    if (isset($_FILES['rapport']) && $_FILES['rapport']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['rapport']['name'];
        $fileSize = $_FILES['rapport']['size'];
        $fileType = $_FILES['rapport']['type'];
        $fileTmpPath = $_FILES['rapport']['tmp_name'];

        // Validate file type (PDF or DOCX)
        $allowedTypes = array('application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        if (!in_array($fileType, $allowedTypes)) {
            echo json_encode(array('error' => 'Only PDF or DOCX files are allowed.'));
            exit();
        }

        // Validate file size (less than 20MB)
        $maxFileSize = 20 * 1024 * 1024; // 20MB in bytes
        if ($fileSize > $maxFileSize) {
            echo json_encode(array('error' => 'File size must be less than 20MB.'));
            exit();
        }

        // Move the uploaded file to a desired location (e.g., uploads directory)
        $uploadPath = '../../reports/' . $fileName;
        move_uploaded_file($fileTmpPath, $uploadPath);

        // Insert the report details into the database
        try {
            // Prepare the INSERT statement
            $stmt = $pdo->prepare("INSERT INTO rapports_stage (Titre_rapport, Description_rapport, Chemin_fichier,Date_depot) VALUES (?, ?, ?,?)");
            // Bind parameters
            $currentDate = date('Y-m-d');
            $stmt->bindParam(1, $titre);
            $stmt->bindParam(2, $description);
            $stmt->bindParam(3, $uploadPath);
            $stmt->bindParam(4, $currentDate);
            // Execute the statement
            $stmt->execute();

            // Example success message
            echo json_encode(array('message' => 'Report added successfully'));
        } catch (PDOException $e) {
            // Handle database insertion error
            echo json_encode(array('error' => 'Failed to add report to the database.'));
        }
    } else {
        // Handle file upload error
        echo json_encode(array('error' => 'Failed to upload file.'));
    }
}

// Close the database connection
$pdo = null;
?>
