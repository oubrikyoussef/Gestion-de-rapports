<?php
session_start();
include("./phpActions/connection.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $id_utilisateur = $_SESSION["ID_utilisateur"];
    $nom = $_SESSION["Nom"];
    $prenom = $_SESSION["Prenom"];
    $email = $_SESSION["Email"];
    $nomRole = $_SESSION["Nom_role"];
    $nom_filiere = $_SESSION["Nom_filiere"];
    $sql = "";
    $pdo = null;
}
?>
<?php
include_once('./components/head.php');
?>
<head>
  <title>Profile</title>
  <link rel="stylesheet" href="./css/pages/profile.css">
  <link rel="stylesheet" href="./css/component/overlay.css">
  <link rel="stylesheet" href="./css/component/dialog.css">
  <link rel="stylesheet" href="./lib/notify/style.css">
  <script src="./lib/notify/script.js"></script>
  <script src="./js/framework.js" defer></script>
  <script src="./js/profile/profile.js" defer></script>
  <!-- Customer icon by icons8 -->
  <link rel="shortcut icon" href="./images/Profile/icon.png" type="image/x-icon">
</head>

<body id="profile">
<main>
    <?php
    include_once('./components/header.php');
    ?>
    <!-- Start Profile Main Content -->
    <div class="pd-inline-1 mbt-1-5">
    <div class="overlay">
        <div class="changePass dialog br-10 bg-w over-hidden w-fit ps-relative pd-8">
        <a href="#" class="exit c-b main-tr fz-18">
        <i class="fa-solid fa-xmark"></i>
      </a> 
          <form id="passwordForm" method="post">
            <label for="pass" class="db" >Tapez le nouveau mot de pass</label>
            <input type="password"id="pass" class="w-full mbl-5 br-5 border-ccc pd-6 pass-input" name="pass">
            <label for="pass-confirm" class="db" >Confirmer le nouveau mot de pass</label>
            <input type="password" id="pass-confirm" class="w-full mbl-5 br-5 border-ccc pd-6 pass-input" name="pass-confirm">
            <button type="submit" class="db w-full  bg-b c-w br-5 main-tr">Valider</button>
          </form>
          <p class="error_indec c-r"></p>
        </div>
    </div>
        <h1 class="main-heading w-fit bf-af ps-relative pd-bt-8">Profile</h1>
        <!-- Start User Informations  -->
        <div class="user-informations br-10 bg-w over-hidden">
            <h3 class="box-heading m-8">Informations personnelles</h3>
            <div class="informations">
                <div class="general-informations border-eee-bt">
                    <p class="box-paragraph">Informations generales :</p>
                    <div class="infos">
                        <div class="info flex-1">
                            <span class="c-grey fz-14">Nom :</span>
                            <span class="box-heading-1"><?php echo $nom; ?></span>
                        </div>
                        <div class="info flex-1">
                            <span class="c-grey fz-14">Prenom :</span>
                            <span class="box-heading-1"><?php echo $prenom; ?></span>
                        </div>
                        <div class="info flex-1">
                            <span class="c-grey fz-14">Filière :</span>
                            <span class="box-heading-1"><?php echo $nom_filiere; ?></span>
                        </div>
                    </div>
                </div>
                <div class="personal-informations border-eee-bt">
                    <p class="box-paragraph">Authentification :</p>
                    <div class="infos">
                        <div class="info flex-1">
                            <span class="c-grey fz-14">Email :</span>
                            <span class="box-heading-1"><?php echo $email; ?></span>
                        </div>
                    </div>
                </div>
                <div class="pd-bt-8 flx-sb-c flex-1">
                    <div class="text-container">
                        <div class="box-heading-1">Password</div>
                        <p class="box-paragraph-1">
                            Changer votre mot de passe
                        </p>
                    </div>
                    <a href="#" class="blue-btn m-0 mr-5 changer-pass">changer</a>
                </div>
            </div>
        </div>
        <!-- End User Informations  -->
    </div>
    <!-- End Profile Main Content -->
</main>
</body>
