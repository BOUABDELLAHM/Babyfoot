<?php session_start();

if(!isset($_SESSION['id']))
   {
    header ('Location: attention.php');
   }

include('../include/mysql.php') ;

if(isset($_POST['formreservation'])) {
   $membre = $_SESSION['id'];
   $heure = htmlspecialchars($_POST['heure']);
   $jour = date($_POST['jour']);
   $reqresa = $bdd->prepare("SELECT * FROM reservation WHERE heure = ? AND jour = ?");
   $reqresa->execute(array($heure, $jour));
   $resaexist = $reqresa->rowCount();
   if($resaexist == 0) {
   if(!empty($_POST['heure']) AND !empty($_POST['jour'])) {
                     $ok = $bdd->prepare("INSERT INTO reservation(idmembre, heure, jour) VALUES(?, ?, ?)");
                     $ok->execute(array($membre, $heure, $jour));
                     $message = "Votre BabyFoot a bien été réservé le $jour à $heure.";
                  } else {
                     $message = "Merci d'indiquer la date que vous souhaitez réserver.";
                   }
                     } else {
                     $message = "Désolé, ce créneau a déjà été réservé.";
                    }
}

$resa = $bdd -> query('SELECT * FROM reservation ORDER BY idreservation DESC');
$reservation = $bdd->query('SELECT * FROM reservation, membres WHERE reservation.idmembre=membres.id ORDER BY jour,heure DESC LIMIT 0,5');

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
        <h1> Espace réservation</h1>
        <p class="intro">Projet BabyFoot connecté</p>
      </div>
    </header>

    <?php if (isset($message)) {
      if($message=="Votre BabyFoot a bien été réservé le $jour à $heure.") { ?>
        <br>
        <div class="container">
          <div class="row">
            <div class="col-sm-8 mx-auto">
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"> Votre créneau a été réservé avec succès ! </h4>
                <p> <?php echo $message ; ?> </p>
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
                <p> <?php echo $message ; ?> </p>
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
            <h2>Réservation</h2>
            <br><br>
            <p class="lead">Réserver le babyfoot le jour et l'heure que vous souhaité.</p>
          </div>
          <div id="booking">
            <div class="booking-form">
             <form action="" method="POST">
              <div class="row no-margin">
               <div class="col-md-4">
                <div class="form-group">
                 <span class="form-label">Date</span>
                 <input class="form-control" name="jour" id="jour" type="date" value="<?php if(isset($jour)) { echo $jour; } ?>">
                 </div>
                </div>
                  <div class="col-md-5">
                   <div class="row no-margin">
                    <div class="col-md-9">
                     <div class="form-group">
                      <span class="form-label">Heure</span>
                       <select name="heure" class="form-control" id="heure">
                        <option value="<?php if(isset($heure)) { echo '9:00'; } ?>">9:00</option>
                        <option value="<?php if(isset($heure)) { echo '10:00'; } ?>">10:00</option>
                        <option value="<?php if(isset($heure)) { echo '11:00'; } ?>">11:00</option>
                        <option value="<?php if(isset($heure)) { echo '12:00'; } ?>">12:00</option>
                        <option value="<?php if(isset($heure)) { echo '13:00'; } ?>">13:00</option>
                        <option value="<?php if(isset($heure)) { echo '14:00'; } ?>">14:00</option>
                        <option value="<?php if(isset($heure)) { echo '15:00'; } ?>">15:00</option>
                        <option value="<?php if(isset($heure)) { echo '16:00'; } ?>">16:00</option>
                        <option value="<?php if(isset($heure)) { echo '17:00'; } ?>">17:00</option>
                        <option value="<?php if(isset($heure)) { echo '18:00'; } ?>">18:00</option>
                        <option value="<?php if(isset($heure)) { echo '19:00'; } ?>">19:00</option>
                        <option value="<?php if(isset($heure)) { echo '20:00'; } ?>">20:00</option>
                      </select>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="col-md-3">
                <div class="form-btn">
                 <button type="submit" name="formreservation" class="submit-btn">Réserver le babyfoot</button>
               </div>
             </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>


    <section class="bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Table des réservations</h2>
            <br>
            <p class="lead"> Voici ci-dessous les réservations faites à l'heure actuelle.</p>
            <br><br>
            <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Numéro de réservation</th>
              <th scope="col">Date</th>
              <th scope="col">Heure</th>
              <th scope="col">Réserver par</th>
            </tr>
          </thead>
          <tbody>
            <?php while($r = $reservation -> fetch()) { ?>
              <tr>
              <th scope="row"><?= $r['idreservation'] ?></th>
                   <td><?= $r['jour'] ?></td>
                   <td><?= $r['heure'] ?></td>
                   <td><?= $r['pseudo'] ?></td>
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
