<?php
include_once('./components/head.php');
?>

<head>
  <title>Utilisateurs</title>
  <link rel="stylesheet" href="./css/pages/utilisateurs.css">
  <link rel="stylesheet" href="./css/component/overlay.css">
  <link rel="stylesheet" href="./css/component/dialog.css">
  <link rel="stylesheet" href="../css/component/selection.css">
  <link rel="shortcut icon" href="./images/utilisateurs/icon.png" type="image/x-icon">
  <script src="./js/framework.js" defer></script>
  <script src="./js/utilisateurs/utilisateurs.js" defer></script>
  <script src="./js/utilisateurs/fetchUtilisateurs.js" defer></script>
  <script src="./js/utilisateurs/addUsers.js" defer></script>

  <link rel="stylesheet" href="../css/component/searchForm.css">
</head>

<body id="utilisateurs" class="col-3">
  <main>
    <!-- Start Header  -->
    <?php
    include_once('./components/header.php');
    ?>
    <!-- End Header  -->
    <div class="overlay">
    <div class="addUser br-10 bg-w over-hidden w-fit">
    <a href="#" class="exit c-b main-tr fz-18">
    <i class="fa-solid fa-xmark"></i>
    </a> 
    <form action="./phpActions/utilisateurs/addUser.php" class="addUserForm" method="POST">
    <?php 
    include('./phpActions/utilisateurs/forms/addUser.php');
    ?>
    </form>
    </div>
  </div>
    <!--utilisateurs Main Content-->
    <div class="pd-inline-1">
      <h1 class="main-heading w-fit bf-af ps-relative pd-bt-8">utilisateurs</h1>
      <!-- Start search form  -->
      <?php 
      include('./components/searchForm.php');
      ?>
      <a href="#" class="blue-btn pd-inline-1 pd-block-8 m-0 m-auto add-user mt-8 db"><i class="fa-solid fa-plus"></i> Ajouter un utilisateur</a>
      </form>
      <!-- End search form  -->
      <div class="container pd-bt-3"></div>
      </div>
    <!--End utilisateurs Main Content-->
  </main>
</body>

</html>