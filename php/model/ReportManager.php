<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

class ReportManager extends Manager  {


function displayComments()
{
  $db = $this->dbConnect();
  $req = $db->query('SELECT * FROM comments WHERE reported = 1');
  return $req;
}

function deleteComment($id)
{
  $db = $this->dbConnect();
  $delete = $db->prepare('DELETE FROM comments WHERE id = ?');
  $delete->execute(array($id));
  return $delete;
}

function reportComment($id)
{
  $db = $this->dbConnect();
  $report = $db->prepare('UPDATE comments SET reported = 1 WHERE id = ?');
  $report->execute(array($id));
  return $report;
}

function approveComment($id)
{
  $db = $this->dbConnect();
  $report = $db->prepare('UPDATE comments SET reported = 0 WHERE id = ?');
  $report->execute(array($id));
  return $report;
}

}

