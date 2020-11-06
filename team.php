<?php session_start(); ?>

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
  <link href="css/team.css" rel="stylesheet">

</head>
<body>
  <!-- Navigation -->
  <?php
  if (isset($_SESSION['id'])) {
    include('include/navigation_online.php') ;
  } else {
    include('include/navigation_offline.php') ;
  }
 ?>

 <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Élèves participant au projet</h2>
           </div>
        </div>
      </div>

            <br><br><br><br>

  <div class="container text-center">
   <div class="row">
    <div class="column">
     <div class="card">
      <img class="img-responsive" src="img/mehdi.jpg" alt="Mehdi" height="365" width="362" style="width:100%">
       <div class="container">
         <p class="title"><b>EL MORCHID Mehdi</b></p>
         <p>Créateur de l'IHM du babyfoot et du programme en Java.</p>
         <p><button type="button" class="btn btn-primary button_eleve" data-toggle="modal" data-target="#exampleModalMehdi">Tâches détaillées</button></p>
         <!-- Modal -->
         <div class="modal fade" id="exampleModalMehdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
           <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tâches détaillées de Mehdi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>

     <div class="modal-body">
       <h3> TI-11 </h3>
<p> Proposer une IHM permettant d’afficher toutes les informations (démarrer un match, afficher le nom des joueurs, afficher en temps réel le score du match, afficher la fin du match). </p>

      <h3> TI-12 </h3>
<p> Étudier la liaison série et coder un module logiciel permettant de récupérer les informations des capteurs (buts marqués). </p>

     <h3> TI-13 </h3>
<p> Coder un module logiciel permettant de mettre à jour l’IHM de gestion d’un match. </p>

<h3> TI-14 </h3>
<p> Coder un module logiciel permettant d’envoyer les informations (le joueur gagnant, nombres de buts marqués etc..) conforme au protocole de communication défini <b>TC6</b>. </p>

<h3>  TI-15 </h3>
<p> Coder un module logiciel permettant de gérer l’annulation d’un but (mise à jour du score). </p>

<h3>  TI-16 </h3>
<p>  Réaliser un module logiciel permettant de gérer le film d’un match (pi caméra ). </p>
        </div>
       </div>
      </div>
     </div>
       </div>
      </div>
     </div>

<div class="column">
   <div class="card">
     <img class="img-responsive" src="img/marwane.jpg" alt="Marwane" height="362" width="362" style="width:100%">
     <div class="container">
       <p class="title"><b>BOUABDELLAH Marwane</b></p>
       <p>Développeur du site Web et créateur de la base de données MySQL.</p>
       <p><button type="button" class="btn btn-primary button_eleve" data-toggle="modal" data-target="#exampleModalMarwane">Tâches détaillées</button></p>
       <!-- Modal -->
       <div class="modal fade" id="exampleModalMarwane" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tâches détaillées de Marwane</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>

   <div class="modal-body">
     <h3> TI-21 </h3>
<p> Modéliser la base de données. </p>

    <h3> TI-22 </h3>
<p> Concevoir et mettre en œuvre la BDD et la peupler pour faire des testes. </p>

   <h3> TI-23 </h3>
<p> Réaliser l’architecture du site web. </p>

<h3> TI-24 </h3>
<p> Réaliser des pages de gestion des joueurs (ajout, suppression, date d’inscription, profession). </p>

<h3>  TI-25 </h3>
<p> Réaliser des pages permettant aux joueurs de consulter leurs statistiques (nombres de matchs joués, nombres de buts marqués, nombres de victoires, nuls, défaites etc...). Le site web permettra également de réserver le babyfoot (date et heure). </p>

<h3>  TI-26 </h3>
<p> Procéder au déploiement du site sur la carte Raspberry. Gérer également les scripts PHP utilisés par l’application Android afin de la rendre fonctionnelle.   </p>
      </div>
     </div>
    </div>
   </div>
     </div>
   </div>
 </div>

    <div class="column">
     <div class="card">
      <img class="img-responsive" src="img/ricardo.jpg" alt="Ricardo" height="362" width="362" style="width:100%">
       <div class="container">
       <p class="title"><b>DIAS Ricardo</b></p>
       <p>Chargé du dévelopemment de l'application Android du babyfoot.</p>
       <p><button type="button" class="btn btn-primary button_eleve" data-toggle="modal" data-target="#exampleModalRicardo">Tâches détaillées</button></p>
       <!-- Modal -->
       <div class="modal fade" id="exampleModalRicardo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tâches détaillées de Ricardo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>

   <div class="modal-body">
     <h3> TI-31 </h3>
<p> Installer et tester l'environnement de développement Android. </p>

    <h3> TI-32 </h3>
<p> Apprentissage de java-android. </p>

   <h3> TI-33 </h3>
<p> Coder et tester une activité permettant aux joueurs de se logger à l’application BabyFoot (piste: Android, Script PHP, MySQL). </p>

<h3> TI-34 </h3>
<p> Coder et tester une activité permettant de choisir son adversaire et de démarrer un match. </p>

<h3>  TI-35 </h3>
<p> Coder et tester une activité permettant d’afficher les informations d’un match (le nom des joueurs, afficher le score du match en temps réel, afficher la fin du match). </p>

<h3>  TI-36 </h3>
<p> Coder et tester un client TCP/IP permettant de communiquer, conformément à <b>TC6</b>, avec le poste de gestion du match.</p>

      </div>
     </div>
    </div>
   </div>
       </div>
      </div>
     </div>
    </div>
   </div>
</section>

<section class="bg-light">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 mx-auto">
        <h2>Tâches communes</h2>
        <br>
        <ul>
          <li> <b>TC1:</b> Analyser les objectifs et contraintes du projet.</li>
          <hr>
          <li> <b>TC2:</b> Elaborer les premiers diagrammes UML (cas d’utilisation, séquences et activités).</li>
          <hr>
          <li> <b>TC3:</b> Gérer la planification, rédiger les documents du projet.</li>
          <hr>
          <li> <b>TC4:</b> Réaliser les tests unitaires. </li>
          <hr>
          <li> <b>TC5:</b> Prise en main du matériel (capteur, Platine d'interface Grove, carte arduino,caméra IP, tablette android).</li>
          <hr>
          <li> <b>TC6:</b> Décrire un protocole de communication applicatif permettant de mettre en œuvre les diagrammes de séquences fournis.</li>
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
