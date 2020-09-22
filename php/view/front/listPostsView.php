<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

   <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="../../index.php">Jean Forteroche</a>
    </div>
  </nav> 

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Billet simple pour l'Alaska</h1>
            <span class="subheading">Le blog de Jean Forteroche</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
        while ($data = $posts->fetch())
         {
      ?>
        <div class="post-preview">
          <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
            <h2 class="post-title">
              <?= htmlspecialchars($data['title']) ?>
            </h2>
            <h5 class="post-subtitle">
              <?= ($data['content']) ?>
            </h5>
          </a>
          <p class="post-meta">Publié  par Jean Forteroche
            <em>le <?= htmlspecialchars($data['creation_date'])?></em></p>
        </div>
        <?php
           } // Fin de la boucle des billets
            $posts->closeCursor();
        ?>
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
          <p class="copyright text-muted">Copyright &copy; Billet simple pour l'Alaska. <a href="view/front/login.php">Admin</a></p>
        </div>
      </div>
    </div>
  </footer>


<?php $bodyContent = ob_get_clean(); ?>

<?php require('template.php'); ?>