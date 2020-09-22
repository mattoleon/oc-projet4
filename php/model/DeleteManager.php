<?php

namespace Projet4\Blog\Model;

require_once ("model/Manager.php");

class DeleteManager extends Manager  {
   // Function
   function deleteChapter($title, $content)
   {
    $db = $this->dbConnect();
    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $bdd->prepare('DELETE FROM chapter WHERE id = ?');
    $suppr->execute(array($suppr_id));
    }
}