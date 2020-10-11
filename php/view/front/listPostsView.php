<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
  
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <?php
        if (isset($_GET['logout']) &&  $_GET['logout'] == 'success') {
          echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Vous êtes déconnecté du mode admin.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
    ?>
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
            <em>le <?= htmlspecialchars($data['creation_date_fr'])?></em></p>
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

<?php require('template.php'); ?>