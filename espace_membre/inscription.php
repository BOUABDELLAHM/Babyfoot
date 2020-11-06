<?php
session_start();

include('../include/mysql.php') ;

if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $prenom = htmlspecialchars($_POST['prenom']);
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = md5($_POST['mdp']); // Hashage du mot de passe
   $mdp2 = md5($_POST['mdp2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
       $nomlength = strlen($nom);
       $prenomlength = strlen($prenom);
       $pseudolength = strlen($pseudo);
        if($nomlength <= 20) {
         if($prenomlength <= 10) {
          if($pseudolength <= 20) {
           if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
                if($mailexist == 0) {
                   if($mdp == $mdp2) {
                      $insertmbr = $bdd->prepare("INSERT INTO membres(nom, prenom, pseudo, mail, creation, motdepasse, avatar) VALUES(?, ?, ?, ?, NOW(), ?, ?)");
                      $insertmbr->execute(array($nom, $prenom, $pseudo, $mail, $mdp, 'default.png'));
                      $erreur = "OK!";
                      } else {
                        $erreur = "les mots de passes que vous avez saisi ne correspondent pas.";
                             }
                      } else {
                        $erreur = "l'adresse mail que vous avez saisi est déjà utilisé.";
                             }
                      } else {
                        $erreur = "l'adresse mail que vous avez saisi n'est pas valide";
                             }
                      } else {
                        $erreur = "vos adresses mail que vous avez saisi ne correspondent pas.";
                             }
                      } else {
                        $erreur = "votre pseudo ne doit pas dépasser 20 caractères.";
                             }
                      } else {
                        $erreur = "votre prenom ne doit pas dépasser 10 caractères.";
                             }
                      } else {
                        $erreur = "votre nom ne doit pas dépasser 20 caractères.";
                             }
                      } else {
                       $erreur = "il est nécessaire de compléter les champs obligatioires (*).";
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
      <h1>Inscription</h1>
      <p class="intro">Projet BabyFoot connecté</p>
    </div>
  </header>

 <?php if (isset($erreur)) {
   if($erreur=="OK!") { ?>
     <br>
       <div class="container">
         <div class="row">
           <div class="col-sm-8 mx-auto">
            <div class="alert alert-success" role="alert">
             <h4 class="alert-heading"> Vous êtes inscrit ! </h4>
              <p>Votre inscription sur notre site a bien été prise en compte. Vous pouvez désormais accèder
                 à votre compte en vous connectant <a href="connexion.php"> ici. </a> </p>
              <hr>
              <p> <b> Rappel de sécurité : </b> Ne communiquer en aucun cas votre mot de passe et identifiant à une tierce personne. </p>
           </div>
          </div>
        </div>
     </div>
   <?php } else { ?>
     <br>
       <div class="container">
         <div class="row">
           <div class="col-sm-8 mx-auto">
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading"> Une erreur est survenue. </h4>
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
          <h2>Inscription</h2>
          <br>
          <p class="lead">Inscrivez-vous sur notre site pour bénéficier des services proposées.</p>
          <form action="" method="POST">
            <label>
              <p class="label-txt">Nom</p>
              <input type="text" class="input" name="nom" id="nom" value="<?php if(isset($nom)) { echo $nom; } ?>"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Prénom</p>
              <input type="text" class="input" name="prenom" id="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Identifiant *</p>
              <input type="text" class="input" name="pseudo" id="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Mail *</p>
              <input type="email" class="input" name="mail" oncopy="return false;" oncut="return false;" id="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Confirmation du mail *</p>
              <input type="email" class="input" name="mail2" onpaste="return false;" id="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Mot de passe *</p>
              <input type="password" class="input" name="mdp" oncopy="return false;" oncut="return false;" id="mdp">
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Confirmation du mot de passe * </p>
              <input type="password" class="input" name="mdp2" onpaste="return false;" id="mdp2" >
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <button type="submit" name="forminscription">Inscription</button>
            <label>
              <p class="info"> (*) : Champs obligatioires </p>
            </label>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Simple et efficace</h2>
          <br>
          <p class="lead"> En vous inscrivant, vos données personnelles sont stockées sur notre base de données MySQL et
          votre mot de passe est crypté. Vous pourriez ensuite vous connecter avec votre identifiant et mot de passe prédéfinis.</p>

          <br><br>

          <p class="lead"> Vous vous êtes déjà inscrit ? Connectez-vous alors sans plus attendre en cliquant
          <a href="connexion.php"> ici. </a></p>
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
  <!-- Formulaire -->
  <script src="../js/formulaire.js"></script>
  </body>
  </html>
