<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

class ReportManager extends Manager  {


function displayComments() // Affiche les commentaires signalés dans la vue Modération
{
  $db = $this->dbConnect();
  $req = $db->query('SELECT * FROM comments WHERE reported = 1');
  return $req;
}

function deleteComment($comment_id) // Supprime un commentaire 
{
  $db = $this->dbConnect();
  $delete = $db->prepare('DELETE FROM comments WHERE comment_id = ?');
  $delete->execute(array($comment_id));
  return $delete;
}



function approveComment($comment_id) // Approuve un commentaire
{
  $db = $this->dbConnect();
  $report = $db->prepare('UPDATE comments SET reported = 0 WHERE comment_id = ?');
  $report->execute(array($comment_id));
  return $report;
}

}

