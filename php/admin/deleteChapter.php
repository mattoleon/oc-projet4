// Requête pour supprimer un article

  <?php

    if(isset($_GET['id']) AND !empty($_GET['id'])) {

      try
      {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        
      }
      catch(Exception $e)
      {
              die('Erreur : '.$e->getMessage());
      }

    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $bdd->prepare('DELETE FROM chapter WHERE id = ?');
    $suppr->execute(array($suppr_id));
    }

  header ('Location: admin.php');
?>  