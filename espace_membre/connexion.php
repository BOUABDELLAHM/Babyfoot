
<?php
session_start();

include('../include/mysql.php') ;

if(isset($_POST['formconnexion'])) {
   $pseudoconnect = htmlspecialchars($_POST['pseudoconnect']);
   $mdpconnect = md5($_POST['mdpconnect']);
   if(!empty($pseudoconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE pseudo = ? AND motdepasse = ?");
      $requser->execute(array($pseudoconnect,$mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenom'] = $userinfo['prenom'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         $_SESSION['creation'] = $userinfo['creation'];
         if($_SESSION['id']==1){
         header("Location: admin.php");
         }
         else {
         header("Location: profil.php");
         }
      } else {
         $erreur = "l'identifiant ou le mot de passe que vous avez saisi est incorrect.";
      }
   } else {
      $erreur = "il est nécessaire de compléter les champs obligatoires (*).";
   }
}
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
  <link href="../css/formulaire.css" rel="stylesheet">
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
      <h1>Connexion</h1>
      <p class="intro">Projet BabyFoot connecté</p>
    </div>
  </header>

  <?php if (isset($erreur)) {
    if($erreur=="l'identifiant ou le mot de passe que vous avez saisi est incorrect.") { ?>
      <br>
        <div class="container">
          <div class="row">
            <div class="col-sm-8 mx-auto">
             <div class="alert alert-danger" role="alert">
               <h4 class="alert-heading"> Connexion impossible. </h4>
               <p> Désolé, <?php echo $erreur ; ?> </p>
            </div>
          </div>
        </div>
      </div>
    <?php } if($erreur=="il est nécessaire de compléter les champs obligatoires (*).") { ?>
      <br>
        <div class="container">
          <div class="row">
            <div class="col-sm-8 mx-auto">
             <div class="alert alert-danger" role="alert">
               <h4 class="alert-heading"> Connexion impossible. </h4>
               <p> Désolé, <?php echo $erreur ; ?> </p>
            </div>
          </div>
        </div>
      </div>
      <?php }
    }
    ?>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Connexion</h2>

          <br>

          <p class="lead">Connectez-vous avec votre identifiant et votre mot de passe.</p>
          <form action="" method="POST">
            <label>
              <p class="label-txt">Identifiant</p>
              <input type="text" class="input" name="pseudoconnect" />
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Mot de passe</p>
              <input type="password" class="input" name="mdpconnect"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <button type="submit" name="formconnexion">Connexion</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Un nouveau membre ?</h2>
          <br>
          <p class="lead"> Pas de soucis, cliquez <a href="inscription.php"> ici </a> pour vous s'inscrire.</p>
        </div>
      </div>
    </div>
  </section>


<?php include('../include/footer.php'); ?>

  <!-- Fichier JavaScript de Bootstrap 4 -->
  <script src="../jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="../jquery-easing/jquery.easing.min.js"></script>
  <!-- Formulaire -->
  <script src="../js/formulaire.js"></script>
  </body>
  </html>
