<?php session_start();

if(!isset($_SESSION['id']))
   {
    header ('Location: attention.php');
   }

include('../include/mysql.php');

//Récupération des stats personnelles
$reqstat = $bdd->query('SELECT * FROM statistique WHERE statistique.idmembre=membres.id');



// Récupération des données générales
$reponse = $bdd->query('SELECT * FROM statistique,membres WHERE statistique.idmembre=membres.id ORDER BY idstatistique');


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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Mes statistiques</h2>
            <br><br>
            <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Pseudo</th>
        <th scope="col">Parties jouées</th>
        <th scope="col">Victoires</th>
        <th scope="col">Défaites</th>
        <th scope="col">Buts marqués</th>
        <th scope="col">Buts encaissés</th>
      </tr>
    </thead>
      <tr>
        <th scope="row"></th>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
      </tr>
    </tbody>
  </table>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Statistiques générales</h2>
            <br><br>
            <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Pseudo</th>
              <th scope="col">Nombre de partie</th>
              <th scope="col">Buts marqués</th>
              <th scope="col">Buts encaissés</th>
              <th scope="col">Victoires</th>
              <th scope="col">Défaites</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($donnees = $reponse->fetch()) {?>
              <tr>
              <th scope="row"><?= $donnees['pseudo'] ?></th>
                   <td><?= $donnees['nbpartie'] ?></td>
                   <td><?= $donnees['marquer'] ?></td>
                   <td><?= $donnees['encaisser'] ?></td>
                   <td><?= $donnees['victoire'] ?></td>
                   <td><?= $donnees['defaite'] ?></td>
             </tr>
           <?php } ?>
          </tbody>
        </table>
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
