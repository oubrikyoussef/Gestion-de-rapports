<?php
include_once("./components/head.php");
session_start(); 
$_SESSION = [];
session_destroy()
?>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/pages/login.css">
    <link rel="stylesheet" href="./css/component/dialog.css">
    <link rel="shortcut icon" href="./images/login/icon.png" type="image/x-icon">
    <script src="./js/login/login.js" defer></script> <!-- Include the JavaScript file -->
</head>
<body>    
<main>
    <div class="login dialog br-10 bg-w over-hidden w-fit ps-relative pd-8 border-ccc">
        <form id="loginForm" method="post" action="./phpActions/login/validateLogin.php"> <!-- Remove action and method attributes -->
            <label for="email" class="db">Email</label>
            <input type="email" id="email" class="w-full mbl-5 br-5 border-ccc pd-6 pass-input" name="email" placeholder="Entrer l'email">
            
            <label for="password" class="db">Mot de passe</label>
            <input type="password" id="password" class="w-full mbl-5 br-5 border-ccc pd-6 pass-input" name="password" placeholder="Entrer le mot de passe">
            
            <button type="submit" class="db w-full  bg-b c-w br-5 main-tr">Entrer</button>
            
            <p class="error_indec c-r mt-5"></p> <!-- Error message container -->
        </form>
    </div>
</main>
<script>