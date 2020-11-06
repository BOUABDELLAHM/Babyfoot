<?php session_start();

if(!isset($_SESSION['id']))
   {
    header ('Location: attention.php');
   }

include('../include/mysql.php') ;

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newname']) AND !empty($_POST['newname']) AND $_POST['newname'] != $user['nom']) {
      $newname = htmlspecialchars($_POST['newname']);
      $insertname = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
      $insertname->execute(array($newname, $_SESSION['id']));
      header('Location: profil.php');
   }
   if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
      $newprenom = htmlspecialchars($_POST['newprenom']);
      $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
      $insertprenom->execute(array($newprenom, $_SESSION['id']));
      header('Location: profil.php');
   }
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php');
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php');
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php');
      } else {
         $msg = "Vos mots de passe ne correspondent pas !";
      }
   }

   if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avatar']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
echo ($extensionUpload);
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "membres/avatars/".$_SESSION['id'].".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
         if ($resultat) echo "pbmove";
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $_SESSION['id'].".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            header('Location: profil.php');
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
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

<body id="page-top">

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

  <?php if (isset($msg)) {
    if($msg=="Erreur durant l'importation de votre photo de profil") { ?>
      <div class="alert alert-danger" role="alert">
        <?php
         echo '<center><font color="black">'.$msg."</font></center>";
        ?>
      </div>
    <?php } if($msg=="Votre photo de profil ne doit pas dépasser 2Mo") { ?>
        <div class="alert alert-danger" role="alert">
          <?php
           echo '<center><font color="black">'.$msg."</font></center>";
          ?>
        </div>
      <?php } if($msg=="Votre photo de profil doit être au format jpg, jpeg, gif ou png") { ?>
          <div class="alert alert-danger" role="alert">
            <?php
             echo '<center><font color="black">'.$msg."</font></center>";
            ?>
          </div>
        <?php }
             }
        ?>

  <section id="edit" class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Édition du profil</h2>
          <br><br>
          <form method="POST" action="" enctype="multipart/form-data">
            <label>
              <p class="label-txt">Votre nom</p>
              <input type="text" class="input" name="newname" value="<?php echo $user['nom']; ?>"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Votre prénom</p>
              <input type="text" class="input" name="newprenom" value="<?php echo $user['prenom']; ?>"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Votre pseudo</p>
              <input type="text" class="input" name="newpseudo" value="<?php echo $user['pseudo']; ?>"/>
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Votre mail</p>
              <input type="text" class="input" name="newmail" value="<?php echo $user['mail']; ?>" />
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Votre mot de passe</p>
              <input type="password" class="input" name="newmdp1">
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Confirmation du mot de passe</p>
              <input type="password" class="input" name="newmdp2" >
              <div class="line-box">
                <div class="line"></div>
              </div>
            </label>
            <label>
              <p class="label-txt">Votre photo de profil</p>
              <input type="file" class="input" name="avatar">
              <br><br>
              <button type="submit">Mettre à jour mon profil</button>
            </label>
     </form>
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

<?php
}
else {
   header("Location: connexion.php");
}
?>
