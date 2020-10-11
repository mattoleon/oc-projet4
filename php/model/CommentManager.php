<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager  {
    public function getComments($postId) // Affiche les commentaires dans le chapitre en cours
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment_id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
    
        return $comments;
    }
    
    public function postComment($postId, $author, $comment) // Permet de poster un nouveau commentaire
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));
    
        return $affectedLines;
    }

    function reportComment($postId, $comment_id) // Permet de signaler un article
    {
    $db = $this->dbConnect();
    $report = $db->prepare('UPDATE comments SET reported = 1 WHERE post_id=? AND comment_id = ?');
    $report->execute(array($postId, $comment_id));
    return $report;
    }
}