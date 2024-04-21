<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=gestiondesrapports;port=3308", "root", "");
} catch (PDOException $e) {
    echo "error" . $e->getMessage();
}
?>