<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager {

    function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM chapter ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM chapter WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
    
    function createChapter($title, $content) // Ajoute un chapitre dans la base de donnée
    {
     $db = $this->dbConnect();
     $chapter = $db->prepare('INSERT INTO chapter (title, content, creation_date) VALUES (?, ?, NOW())');
     $affectedLines = $chapter->execute(array($title, $content));
 
     return $affectedLines;
     }

     function deleteChapter($title, $content)
     {
      $db = $this->dbConnect();
      $suppr_id = htmlspecialchars($_GET['id']);
      $suppr = $bdd->prepare('DELETE FROM chapter WHERE id = ?');
      $suppr->execute(array($suppr_id));
      }

}