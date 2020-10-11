<?php if(empty($_SESSION['login'])){
  header('location:front/login.php');
  exit;
} ?>
<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

  <!-- Report Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <?php
        if (isset($_GET['approved']) &&  $_GET['approved'] == 'success') {
          echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
          Ce commentaire a été approuvé.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        } else if (isset($_GET['rejected']) &&  $_GET['rejected'] == 'success') {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Ce commentaire a été supprimé.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        }
    ?>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Auteur</th>
            <th scope="col">Message</th>
            <th scope="col">Modération</th>
          </tr>
        </thead>
        <tbody>

        <?php
          while ($report = $reports->fetch())
          {
        ?>

          <tr>
            <th scope="row"><?= htmlspecialchars($report['author']) ?></th>
            <td scope="row"><?= nl2br(htmlspecialchars($report['comment'])) ?></td>
            <td><a href="index.php?action=approve&amp;id=<?= $report['comment_id'] ?>"><i class="fas fa-edit"></i></a>
            <a href="index.php?action=deleteComments&amp;id=<?= $report['comment_id'] ?>"><i class="fas fa-trash"></i></a></td>
          </tr>

        <?php
          }
          $reports->closeCursor();
        ?>
        </tbody>
      </table>
    </div>  
  </div>
</div>
<hr>
<?php $bodyContent = ob_get_clean(); ?>
<?php require('templateBack.php'); ?>
