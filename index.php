<?php
include_once('./components/head.php');
?>

<head>
  <title>Profile</title>
  <link rel="stylesheet" href="./css/pages/profile.css">
  <link rel="stylesheet" href="./css/component/overlay.css">
  <link rel="stylesheet" href="./css/component/dialog.css">
  <script src="./js/framework.js" defer></script>
  <script src="./js/profile/profile.js" defer></script>
  <!--Customer icon by icons8-->
  <link rel="shortcut icon" href="./images/Profile/icons8-customer-96.png" type="image/x-icon">
</head>

<body id="profile">
<main>
    <?php
    include_once('./components/header.php');
    ?>
    <!--Start Profile Main Content-->
    <div class="pd-inline-1 mbt-1-5">
    <div class="overlay">
        <div class="dialog-pass dialog br-10 bg-w over-hidden w-fit ps-relative pd-8">
        <a href="#" class="exit c-b main-tr fz-18">
        <i class="fa-solid fa-xmark"></i>
      </a> 
          <form action="" id="passwordForm">
            <label for="pass" class="db">Entrer le mot de pass</label>
            <input type="password"id="pass" class="w-full mbl-5 br-5 border-ccc pd-6 pass-input">
            <label for="pass-confirm" class="db">Confirmer le mot de pass</label>
            <input type="password" id="pass-confirm" class="w-full mbl-5 br-5 border-ccc pd-6 pass-input">
            <button type="submit" class="db w-full  bg-b c-w br-5 main-tr">Valider</button>
          </form>
          <p class="error_indec c-r"></p>
        </div>
    </div>
      <h1 class="main-heading w-fit bf-af ps-relative pd-bt-8">Profile</h1>
        <!-- Start User Informations  -->
        <div class="user-informations br-10 bg-w over-hidden">
        <h3 class="box-heading m-8">Informations d'utilisateur</h3>
          <div class="informations">
            <div class="general-informations border-eee-bt">
              <p class="box-paragraph">Informations generales :</p>
              <div class="infos">
                <div class="info flex-1">
                  <span class="c-grey fz-14">Nom :</span>
                  <span class="box-heading-1">Oubrik</span>
                </div>
                <div class="info flex-1">
                  <span class="c-grey fz-14">Prenom :</span>
                  <span class="box-heading-1">Youssef</span>
                </div>
                <div class="info flex-1">
                  <span class="c-grey fz-14">Sexe :</span>
                  <span class="box-heading-1">Male</span>
                </div>
              </div>
            </div>
            <div class="personal-informations border-eee-bt">
              <div class="infos">
                <div class="info flex-1">
                  <span class="c-grey fz-14">Email :</span>
                  <span class="box-heading-1">youssef.oubrik@edu.uiz.ac.ma</span>
                </div>
                <div class="info flex-1">
                  <span class="c-grey fz-14">Numéro de télephone :</span>
                  <span class="box-heading-1">+212 666666666</span>
                </div>
                <div class="info flex-1">
                  <span class="c-grey fz-14">Date de naissance :</span>
                  <span class="box-heading-1">30/09/2015</span>
                </div>
              </div>
            </div>
              <div class="other-informations border-eee-bt">
                <p class="box-paragraph">Autres informations :</p>
                <div class="infos">
                  <div class="info flex-1">
                    <span class="c-grey fz-14">Status :</span>
                    <span class="box-heading-1">Etudiant</span>
                  </div>
                  <div class="info flex-1">
                    <span class="c-grey fz-14">Niveau :</span>
                    <span class="box-heading-1">3ieme année GINFO</span>
                  </div>
                  <div class="info flex-1">
                    <span class="c-grey fz-14">Post :</span>
                    <span class="box-heading-1">Chef departement</span>
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
    <!--End Profile Main Content-->
  </main>

</body>

