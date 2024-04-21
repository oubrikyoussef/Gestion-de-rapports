<?php
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérez la valeur de recherche du formulaire
        $searchValue = $_POST['searchvalue'];

        // Préparez l'instruction SQL pour éviter les injections SQL
        $stmt = $pdo->prepare("SELECT * FROM rapports_stage WHERE LOWER(Titre_rapport) LIKE LOWER(:searchvalue) OR LOWER(Description_rapport) LIKE LOWER(:searchvalue)");

        $stmt->bindParam(':searchvalue', $searchTerm, PDO::PARAM_STR);

        // Définissez le terme de recherche avec les caractères génériques pour une correspondance partielle
        $searchTerm = '%' . strtolower($searchValue) . '%';

        // Exécutez l'instruction
        $stmt->execute();

        // Récupérez les résultats
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Encodez les résultats en JSON
        echo json_encode($results);
    } catch (PDOException $e) {
        // Handle any PDO exceptions
        echo json_encode(array('error' => $e->getMessage()));
    }
}

// Fermez la connexion
$pdo = null;
?>

