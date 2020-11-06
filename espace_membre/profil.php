<?php
session_start();

if(!isset($_SESSION['id']))
   {
    header ('Location: attention.php');
    exit();
   }


include('../include/mysql.php') ;

if($_SESSION['id'] > 0) {
   $getid = intval($_SESSION['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();

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

<body>

  <!-- Navigation -->

  <?php
  if (isset($_SESSION['id'])) {
    include('../include/navigation_online.php') ;
  } else {
    include('../include/navigation_offline.php') ;
  }
  ?>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Votre profil</h1>
      <p class="intro">Projet BabyFoot connecté</p>
    </div>
  </header>

  <section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Mes informations personnelles</h2>
          <br><br>
          <?php
          if(!empty($userinfo['avatar']))
          ?>
          <img src="membres/avatars/<?php echo $userinfo['avatar']; ?>" width="200" height="200" alt="Ma photo de profil"
               class="img-thumbnail">
          <br><br>
          <table class="table">
        <tbody>
          <tr>
            <th scope="row">Nom</th>
            <td> <?php echo $userinfo['nom']; ?> </td>
          </tr>
          <tr>
            <th scope="row">Prénom</th>
            <td> <?php echo $userinfo['prenom']; ?> </td>
          </tr>
          <tr>
            <th scope="row">Pseudo</th>
            <td> <?php echo $userinfo['pseudo']; ?> </td>
          </tr>
          <tr>
            <th scope="row">Adresse mail</th>
            <td> <?php echo $userinfo['mail']; ?> </td>
          </tr>
          <tr>
            <th scope="row">Membre depuis</th>
            <td> <?php echo $userinfo['creation']; ?> </td>
          </tr>
        </tbody>
      </table>
      <br><br>
      <div class="text-center">
      <a href="edition_profil.php" type="button" class="btn btn-outline-primary">Modifier mon profil</button>
      </a>
      <a href="deconnexion.php" type="button" class="btn btn-danger">Déconnexion</button>
      </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer du site -->
  <?php include ('../include/footer.php') ; ?>

  <!-- Fichier JavaScript de Bootstrap 4 -->
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="../jquery-easing/jquery.easing.min.js"></script>
  </body>
  </html>

<?php } ?>
