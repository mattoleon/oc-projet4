<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="../../index.php">Le blog de Jean Forteroche</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </nav> 

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../../public/img/home-bg.jpg')">
    <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>Blog Admin</h2>
            </div>
          </div>
        </div>
      </div>
  </header>
  
  <!-- Main Content -->
  <div class="container">


    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto text-center">
        <form action="../../index.php?action=listPostsAdmin" method="post">
          <p>
            <input type="textfield" name="login" placeholder="Pseudo"/>
          </p>
            <p>
            <input type="password" name="password" placeholder="Mot de passe"/>
            </p> 
            <input type="submit" value="Valider" />
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
          <p class="copyright text-muted">Copyright &copy; Your Website 2019 <a href="#">Admin</a></p>
        </div>
      </div>
    </div>
  </footer>

<?php $bodyContent = ob_get_clean(); ?>

<?php require('template.php'); ?>