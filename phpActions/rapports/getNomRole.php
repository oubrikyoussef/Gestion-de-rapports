<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $nomRole = $_SESSION["Nom_role"];
    echo json_encode(["nomRole" => $nomRole]);
} else {
    echo json_encode(["error" => "User not logged in"]);
}
?>
