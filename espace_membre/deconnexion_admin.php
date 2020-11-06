<?php
session_start();
$_SESSION = array();
session_destroy();
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

 <!-- Header du site -->
 <header class="bg-primary text-white">
   <div class="container text-center">
     <h1> Espace administration </h1>
     <p class="intro">Projet BabyFoot connecté</p>
   </div>
 </header>

   <section>
     <div class="container">
       <div class="text-center">
         <div class="col-lg-8 mx-auto">
           <h2> Administration </h2>
           <br>
           <p class="lead">Votre déconnexion de votre session administrative a été effectué avec succès.</p>
         </div>
       </div>
     </div>
   </section>

     <!-- Fichier JavaScript de Bootstrap 4 -->
     <script src="../jquery/jquery.min.js"></script>
     <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- Plugin JQuery -->
     <script src="../jquery-easing/jquery.easing.min.js"></script>
   </body>
   </html>
