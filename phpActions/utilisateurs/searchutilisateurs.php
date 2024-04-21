<?php 
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérez la valeur de recherche du formulaire
        $searchValue = $_POST['searchvalue'];

        // Préparez l'instruction SQL pour éviter les injections SQL
        $stmt = $pdo->prepare("SELECT utilisateurs.*, roles.Nom_role as Role, filieres.Nom_filiere as Filiere, niveaux.Nom_niveau as Niveau
                  FROM utilisateurs
                  INNER JOIN roles ON utilisateurs.ID_role = roles.ID_role 
                  INNER JOIN filieres ON utilisateurs.ID_filiere = filieres.ID_filiere  
                  LEFT JOIN etudiants ON utilisateurs.ID_utilisateur = etudiants.ID_utilisateur
                  LEFT JOIN niveaux ON etudiants.ID_niveau = niveaux.ID_niveau
                  WHERE LOWER(Nom) LIKE LOWER(:nom) OR LOWER(Prenom) LIKE LOWER(:prenom)");

        $stmt->bindParam(':nom', $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $searchTerm, PDO::PARAM_STR);

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
