<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager {

    function getPosts() // Récupère les posts dans la base de donnée
    {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM chapter ORDER BY creation_date DESC LIMIT 0, 5');
      return $req;
    }

    function getPost($postId) // Récupère un post et son id
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

    function updateChapter($title, $content, $postId) // Update un chapitre grâce à son id dans la base de donnée
    {
      $db = $this->dbConnect();
      $req = $db->prepare('UPDATE chapter SET title = ?, content = ? WHERE id = ?');
      $update = $req->execute(array($title, $content, $postId));

      return $update;
    }

    function deleteChapter($id) // Supprimme un chapitre à l'aide de l'id dans la base de donnée
    {
      $db = $this->dbConnect();
      $delete = $db->prepare('DELETE FROM chapter WHERE id = ?');
      $delete->execute(array($id));
      return $delete;
    }
}
