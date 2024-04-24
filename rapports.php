<?php
include_once('./components/head.php');
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $nomRole = $_SESSION["Nom_role"];
}
?>
<head>
<title>Rapports</title>
<link rel="stylesheet" href="./css/component/dialog.css">
<link rel="stylesheet" href="./css/component/overlay.css">
<link rel="stylesheet" href="./css/pages/rapports.css">
<link rel="stylesheet" href="./lib/notify/style.css">
<link rel="shortcut icon" href="./images/rapports/icon.png" type="image/x-icon">
<script src="./lib/notify/script.js"></script>
<script src="./js/framework.js" defer></script>
<script src="./js/rapports/rapports.js" defer></script>
<script src="./js/rapports/fetchRapports.js" defer></script>
<?php if ($nomRole === "Administrateur"): ?>
    <script src="./js/rapports/addRapports.js" defer></script>
<?php endif; ?>
</head>
<body id="rapports" class="col-3">
<main>
    <?php
    include_once('./components/header.php');
    ?>
    <!--Start reports Main Content-->
    <div class="overlay">
    <div class="addRapport br-10 bg-w over-hidden w-fit">
    <a href="#" class="exit c-b main-tr fz-18">
        <i class="fa-solid fa-xmark"></i>
    </a> 
    <form class="addRapportForm" method="POST" enctype="multipart/form-data" action="./phpActions/rapports/addRapport.php">
        <?php include('./phpActions/rapports/forms/addRapport.php'); ?>
    </form>
  </div>
  </div>
    <div class="pd-inline-2-5">
      <h1 class="main-heading w-fit bf-af ps-relative pd-bt-8">Rapports</h1>
        <?php 
        include('./components/searchForm.php');
        ?>
      <?php if($nomRole == "Administrateur"): ?>
        <div class="upload mt-8">
        <a href="#" class="blue-btn pd-inline-1 pd-block-8 m-0 m-auto add-rapport"><i class="fa-solid fa-angles-up mr-5 " aria-hidden="true"></i> Ajouter un rapport</a>
        </div>
      <?php endif; ?>
        </form>
        <div class="container pd-bt-3 mgt-1-5"></div>
      </div>
    </div>
    <!--End Projects Main Content-->
  </main>
</body>
</html>
