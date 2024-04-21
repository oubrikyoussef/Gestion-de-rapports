
<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=gestiondesrapports;port=3308", "root", "");
    } catch (PDOException $e) {
        echo "error" . $e->getMessage();
    }


if (isset($_POST['ajouter'])) {
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mdps = $_POST['motdepasse'];
$role = $_POST['role'];
$filiere = $_POST['filiere'];
$niveau = $_POST['niveau'];



///////////////////get id_role by id name :////////////////////////

$sql1 = 'SELECT ID_role FROM roles WHERE Nom_role = :roleName';
$stmt = $pdo->prepare($sql1);
$stmt->bindParam(':roleName', $role, PDO::PARAM_STR);
$stmt->execute();
$iddrole = $stmt->fetch(PDO::FETCH_ASSOC);
$id_role = $iddrole['ID_role'];


///////////////////////get id niveau by nom niveau ://///////////////////////
if (isset($niveau) && !empty($niveau)){
    $sql2 = 'SELECT ID_niveau FROM niveaux WHERE Nom_niveau = :nomniveau';
        $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':nomniveau', $niveau, PDO::PARAM_STR);
    if ($stmt2->execute()) {
    $idniveau = $stmt2->fetch(PDO::FETCH_ASSOC);
    $id_niveau = $idniveau['ID_niveau'];
    }
}



////////////////get id filiere by nom filiere ://///////////////////////
$sql3 = 'SELECT ID_filiere FROM filieres WHERE Nom_filiere = :nomfiliere';
$stmt3 = $pdo->prepare($sql3);
$stmt3->bindParam(':nomfiliere', $filiere, PDO::PARAM_STR);
if ($stmt3->execute()) {
    $idfiliere = $stmt3->fetch(PDO::FETCH_ASSOC);
    $id_filiere = $idfiliere['ID_filiere'];
}




// insert into utilisateur 
$sql = $pdo->prepare("INSERT INTO utilisateurs(ID_utilisateur, Nom, Prenom, Email, Mot_de_passe, ID_role) VALUES ('$id','$nom','$prenom','$email','$mdps','$id_role')");
$sql->execute();
if ($id_role == 3) { /////////////////     insert into etudiant     ///////////////
    if (isset($niveau)) {
        $sql = $pdo->prepare("INSERT INTO etudiants(ID_etudiant, ID_utilisateur, ID_filiere, ID_niveau) VALUES ('$id','$id','$id_filiere','$id_niveau')");
        $sql->execute();

    } else {
        echo "saisir le niveau";
    }
}
if ($id_role == 2) { /////////////////insert into secretaire///////////////////


    $sql = $pdo->prepare("INSERT INTO secretaires_departement(ID_secretaire_departement, ID_utilisateur, ID_filiere) VALUES ('$id','$id','$id_filiere')");
    
    $sql->execute();

}
if ($id_role == 1) { //////////////////////insert into chef departement////////////////
    $sql = $pdo->prepare("INSERT INTO chefs_departement(ID_chef_departement, ID_utilisateur, ID_filiere) VALUES ('$id','$id','$id_filiere')");
    $sql->execute();
}
}
?>
