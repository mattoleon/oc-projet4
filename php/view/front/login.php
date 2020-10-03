<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>


  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto text-center">
      <?php
        if (isset($_GET['logged']) &&  $_GET['logged'] == 'error') {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur !</strong> Identifiants incorrects.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
      ?>
        <form style="text-align:left" action="../../index.php?action=login" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Identifiant</label>
            <input type="textfield" name="login" class="form-control" placeholder="Entrez votre identifiant SVP">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
          </div>
          <button type="submit" class="btn btn-primary">Valider</button>
        </form>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Billet simple pour l'Alaska. </p>
        </div>
      </div>
    </div>
  </footer>

<?php $bodyContent = ob_get_clean(); ?>

<?php require('template.php'); ?>