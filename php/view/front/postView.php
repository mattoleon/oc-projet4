<?php $title = 'Bille simple pour l\'Alaska'; ?>

<?php ob_start();?>

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
        <?php
        if (isset($_GET['report']) &&  $_GET['report'] == 'success') {
          echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Merci !</strong> Le commentaire a été signalé.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
      ?>
          <div class="news">
              <?php
                while ($comment = $comments->fetch())
                {
              ?>
                <em><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= htmlspecialchars($comment['comment_date']) ?></em><br>
                <small><em><?= nl2br(htmlspecialchars($comment['comment'])) ?></em></small><br>
                <a href="index.php?action=report&amp;id=<?= $comment['id'] ?>"><small><p><span class="badge badge-secondary ">Signaler</span></p></small></a>
                <?php
                }
                ?>
          </div>
        </div>
      </div>
    </div>
  </article>

  <hr>

 

<?php $bodyContent = ob_get_clean(); ?>

<?php 
  if (!empty($_SESSION)) {
      require('view/back/templateBack.php');
    } else {
      require('template.php'); 
    }
?>
</html>
