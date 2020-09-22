<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>



 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">Jean Forteroche</a>
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

  <!-- Post Content -->
  <article>


  <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="news">
              <h3>
                <?= htmlspecialchars($post['title']) ?>
              </h3>
              <em> Par Jean Forteroche le <?= htmlspecialchars($post['creation_date']) ?></em> 
              <p>
              <?= ($post['content']) ?>
              </p>
            </div>
        </div>
      </div>
  </div>
      <hr>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="news">
              <h4>Commenter cet article</h4>
              <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group">
                  <label for="author">Pseudo</label>
                  <input type="text" class="form-control" id="author" name="author" placeholder="Veuillez indiquer un pseudo">
                </div>
                <div class="form-group">
                  <label for="comment">Commentaire</label>
                  <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Votre message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Envoyer</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="news">
              <?php
                while ($comment = $comments->fetch())
                {
              ?>
                <em><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date']) ?></em><br>
                <small><em><?= nl2br(htmlspecialchars($comment['comment'])) ?></em></small><br>
                <?php
                }
                ?>
          </div>
        </div>
      </div>
    </div>
  </article>

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
          <p class="copyright text-muted">Copyright &copy; Billet simple pour l'Alaska. <a href="view/back/login.php">Admin</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>


<?php $bodyContent = ob_get_clean(); ?>

<?php require('template.php'); ?>
</html>
