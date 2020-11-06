<?php
session_start();
?>

<html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BabyFoot connecté</title>
  <!-- Logo du site -->
  <link rel="icon" type="image/png" href="../img/logo.png">
  <!-- Fichier CSS de Bootstrap 4 -->
  <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Fichier CSS personnalisée -->
  <link href="../css/style.css" rel="stylesheet">

</head>

<!-- Navigation -->
<?php
if (isset($_SESSION['id'])) {
  include('../include/navigation_online.php') ;
} else {
  include('../include/navigation_offline.php') ;
}
?>

   <section>
     <div class="container">
       <div class="text-center">
         <div class="col-lg-8 mx-auto">
           <img src="../img/attention.png">
           <h2>Attention !</h2>
           <br>
           <p class="lead">Pour accèder à cette page, vous devez vous connecter ou bien vous inscrire.</p>
           <p class="lead"> <a href="inscription.php"> Inscription </a><a href="connexion.php"> Connexion </a></p>
         </div>
       </div>
     </div>
   </section>

   <!-- Footer du site -->
   <?php
include ('../include/footer.php');
    ?>

     <!-- Fichier JavaScript de Bootstrap 4 -->
     <script src="../jquery/jquery.min.js"></script>
     <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- Plugin JQuery -->
     <script src="../jquery-easing/jquery.easing.min.js"></script>
     <!-- Fichier JavaScript du scroll top -->
     <script src="../js/topbutton.js"></script>
   </body>
   </html>
