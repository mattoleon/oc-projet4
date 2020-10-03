<?php if(empty($_SESSION['login'])){
  header('location:../front/login.php');
  exit;
} ?>
<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

 
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
        if (isset($_GET['logged']) &&  $_GET['logged'] == 'success') {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Bienvenue !</strong> Vous êtes connecté en mode admin.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
      ?>
      <a href="index.php?action=createPost"><input type="submit" value="Nouvel Article" class="btn btn-primary btn-sm" /></a>
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
          <a href="index.php?action=delete&amp;id=<?= $data['id'] ?>"><i class="fas fa-trash"></i></a>
          <a href="index.php?action=updateChapter&amp;id=<?= $data['id'] ?>"><i class="fas fa-edit"></i></a>
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


<?php $bodyContent = ob_get_clean(); ?>

<?php require('templateBack.php'); ?>