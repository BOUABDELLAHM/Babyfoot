<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="../../BabyFoot/index.php">BabyFoot connecté
    <img src="../../BabyFoot/img/logo.png" alt="Logo" height="30" width="30">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <?php
      if($_SESSION['id']==1){
        include('nav_admin.php');
      } else {
        include('nav_membres.php');
      }
      ?>
    </div>
  </div>
</nav>
