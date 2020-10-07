
<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>


  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-preview">  
          <form action="index.php?action=submitUpdate&amp;id=<?= $post['id']; ?>" method="post" >
            <div class="post-preview">
                  <label for="title">Titre de l'article</label><br />  
                  <input type="text" name="title" id="title" value="<?= $post['title'];?>" /><br />
                  <label for="content">Message</label><br />
                  <textarea name="content" id="textarea"><?= nl2br($post['content']);?></textarea>
            </div>
              <input type="submit" value="Envoyer" class="btn btn-primary btn-sm" />
            </form>
        </div>
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
          <p class="copyright text-muted">Copyright &copy; Your Website 2019 <a href="login.php">Admin</a></p>
        </div>
      </div>
    </div>
  </footer>


  <?php $bodyContent = ob_get_clean(); ?>

<?php require('templateBack.php'); ?>
