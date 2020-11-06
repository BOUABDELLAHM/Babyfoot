<?php session_start();
if(!isset($_SESSION['id']))
   {
    header ('Location: attention.php');
   }

include('../include/mysql.php') ;

$membres = $bdd -> query('SELECT * FROM membres ORDER BY id DESC');
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
      $req->execute(array($supprime));
   }
}
$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');
?>

<!DOCTYPE html>
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
  <link href="../css/book.css" rel="stylesheet">


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

    <!-- Header du site -->
    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1> Espace administrateur </h1>
        <p class="intro">Projet BabyFoot connecté</p>
      </div>
    </header>


    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Listes des membres</h2>
            <br><br>
              <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Crée le</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php while($m = $membres->fetch()) { ?>
                <tr>
                <th scope="row"><?= $m['id'] ?></th>
                     <td><?= $m['pseudo'] ?></td>
                     <td><?= $m['mail'] ?></td>
                     <td><?= $m['creation'] ?></td>
                     <?php if($_SESSION['id']!=$m['id']){ ?>
                     <td>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Supprimer
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Suppression d'un utilisateur.   </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        La suppression d'un utilisateur entrainera la pertes de toutes les données (profil, statistiques et réservation).
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-danger" href="admin.php?type=membre&supprime=<?= $m['id'] ?>" >Supprimer</button>
      </div>
    </div>
  </div>
</div></td>
                     <?php } ?>
               </tr>
            <?php } ?>
            </tbody>
          </table>
          <a href="inscription.php" type="button" class="btn btn-secondary btn-lg btn-block">Ajouter un utilisateur</a>
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
