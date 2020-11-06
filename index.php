<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BabyFoot connecté</title>
  <!-- Logo du site -->
  <link rel="icon" type="image/png" href="img/logo.png">
  <!-- Fichier CSS de Bootstrap 4 -->
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Fichier CSS personnalisée -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <!-- Navigation -->
  <?php
  if (isset($_SESSION['id'])) {
    include('include/navigation_online.php') ;
  }
  else {
    include('include/navigation_offline.php') ;
  }
 ?>

 <!-- Header du site -->
 <header class="bg-primary text-white">
   <div class="container text-center">
     <h1> Bienvenue sur notre site </h1>
     <p class="intro">Projet BabyFoot connecté</p>
   </div>
 </header>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-8 mx-auto">
          <h2>A propos du site</h2>

          <br>

          <p class="lead">Ce site a été conçu pour le projet "Babyfoot connecté". Grâce à ce site, vous pourriez :</p>
          <ul>
            <li>Vous inscrire sur la base de données du site (MySQL),</li>
            <li>Vous connecter,</li>
            <li>Visualer vos stats et celles de vos adversaires,</li>
            <li>Réserver le babyfoot.</li>
          </ul>

          <br><br>

          <div class="text-center">
            <a href="espace_membre/inscription.php" type="button" class="btn btn-outline-primary">Inscrivez-vous</a>
            <?php if(!isset($_SESSION['id'])) { ?>
            <a href="espace_membre/connexion.php" type="button" class="btn btn-outline-secondary">Connectez-vous</a>
            <?php } else { ?>
            <a href="espace_membre/profil.php" type="button" class="btn btn-outline-secondary">Connectez-vous</a>
            <?php } ?>

          </div>

        <br><br>

        <hr>
        <p class="lead">Pour découvrir les membres du projet, cliquer <a href="team.php"> ici. </a> </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Les règles</h2>

          <br>

          <p class="lead">
            On connait tous plus ou moins les règles du football de table : il faut marquer le plus de but à l’adversaire
            et en encaisser le moins possible. C’est à peu près comme tout sport avec un ballon !
            Mais le babyfoot qui a pris son essor dans les troquets a aussi une fédération en France et celle-ci a définie
            comment jouer au babyfoot, ce qui est autorisé et ce qui ne l’est pas. Pour les amoureux du jeu de café,
            cela peut déstabiliser mais comme on dit : les règles sont les règles !
          </p>

          <hr>
        <p class="lead">
        Source : <a href="https://www.babyfootvintage.com/content/13-les-regles-du-jeu-officielles-du-baby-foot" target="_blank">
        babyfootvintage.com</a>
        </p>
        <hr>

       <br><br>

          <!-- Boutton du modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Voir les règles
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
            <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Règlement</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
             </div>

      <div class="modal-body">
        <h3> L’engagement au baby foot </h3>
 <p> Il faut au début de la partie décider de qui va commencer. Il faut donc procéder à un tirage au sort qui pourra prendre
   l’aspect d’un jeter de pièces à pile ou face ou tout autre procédé que les joueurs accepteront. Ensuite, une fois le vainqueur
   de ce tirage au sort décidé, l’engagement se fait au niveau des demis avec la balle arrêtée sous les pieds du joueur central.
Dans le cas où l’engagement se fait après un but, le joueur ayant encaissé le but est celui qui bénéficie de l’engagement et qui
peut donc poser la balle sous ses demis. </p>

       <h3> La remise en jeu </h3>
<p> Dans le cas d’une sortie de balle du terrain de jeu, la balle est donnée aux arrières de l’équipe qui n’était pas en possession
de la balle qui est sortie. Ainsi, si un attaquant rouge, un défenseur rouge ou un milieu rouge frappe et que la balle sort du
terrain, la remise en jeu est faite aux arrières bleus.
Dans le cas où la balle est bloquée entre 2 barres à un point mort où personne ne peut l’atteindre, la balle est remise aux arrières
 du camp où se situe la balle. Et dans le cas d’une balle qui serait bloquée entre les milieux, la balle est redonnée au dernier
 ayant eu l’engagement. </p>

      <h3> Le « prêt ? » </h3>
<p> Dans un esprit fair play lors d’un engagement ou d’une remise en jeu, celui qui bénéficie de celui-ci doit demander à son
  adversaire s’il est prêt et attendre que celui-ci réponde qu’il est prêt. Souvent vous entendrez tout simplement « prêt ? »,
  « prêt ! » mais vous pouvez aussi varier et utiliser l’anglais pour changer : « ready !? ». </p>

<h3> Les pissettes au babyfoot. </h3>
<p>Les tirs des ailiers avant (les attaquants des extrémités) en diagonal lorsque les défenseurs
   et goal sont poussés (ou tirés) à fonds sont autorisés qu’ils soient tirés à gauche comme à droite.
Les reprises sont autorisées aussi bien en double qu’en simple. C'est-à-dire que sont valides les buts lorsque vous déviez une
balle qui arrive des demis ou des arrières, lorsque vous la bloquez et que vous frappez immédiatement après. Vous n’avez pas
besoin d’attendre que votre adversaire soit prêt pour continuer votre jeu et marquer !! Il en est de même si la balle rebondie
après avoir touché les murs du terrain, vous pouvez frapper la balle immédiatement, le tir ne sera pas assimilé à une reprise.
Pour résumer, « la reprise » n’existe pas et toute frappe est autorisée avec ou sans contrôle préalable. </p>

<h3>  Les roulettes au babyfoot </h3>
<p> La roulette est autorisée dans une certaine mesure : vous ne pouvez pas effectuer plus d’un tour avant la frappe de la
  balle ni après la frappe de la balle. Mais cela veut donc dire que si vous faites une rotation de 350° avant de toucher la
  balle et vous continuer avec encore 350° après la frappe, le tir est autorisé ! Même si comme vous le comprendrez, au total,
  votre joueur aura fait 700° de rotation… Cela vous permet notamment de réaliser des snake shots. </p>

<h3>  La gamelle au babyfoot </h3>
<p> La gamelle qui est le terme désignant un but dont la balle est entrée dans les cages, a tapé le fond et est ressortie a la
  même valeur qu’un but normal. A la suite d’un tel but, le réengagement se fait aux demis comme dans le cas d’un but classique.
  Il n’y a pas de points enlevés ou de double point. </p>


<h3>  Les demis au babyfoot </h3>
<p> Les buts qui sont marqués des demis sont valables et comptent pour un point. Lorsque les arrières d’une équipe dégagent la balle,
l’autre équipe a le droit de bouger les demis comme les autres joueurs. Toutes les techniques de jeu intitulées « rateaux »,
« sacs » ou encore « brailles » sont autorisées et ne constituent pas une faute de jeu. Dévier la balle de l’adversaire est
autorisé même avec les demis.</p>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section>

  <!-- Footer du site -->
  <?php include ('include/footer.php') ; ?>

  <!-- Fichier JavaScript de Bootstrap 4 -->
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JQuery -->
  <script src="jquery-easing/jquery.easing.min.js"></script>

</body>
</html>
