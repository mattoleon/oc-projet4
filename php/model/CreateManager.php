<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

class CreateManager extends Manager  {
   
     function createChapter($title, $content) // Ajoute un chapitre dans la base de donnée
    {
     $db = $this->dbConnect();
     $chapter = $db->prepare('INSERT INTO chapter (title, content, creation_date) VALUES (?, ?, NOW())');
     $affectedLines = $chapter->execute(array($title, $content));
 
     return $affectedLines;
     }
}