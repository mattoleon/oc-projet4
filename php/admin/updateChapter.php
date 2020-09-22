// Requête pour éditer un article

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

    $update_id = htmlspecialchars($_GET['id']);
    $update = $bdd->prepare('UPDATE chapter WHERE id = ?');
    $update->execute(array($update_id));
    }

  header ('Location: admin.php');
?>  