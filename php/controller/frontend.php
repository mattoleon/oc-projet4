<?php
// CONTROLEUR
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ReportManager.php');


// PostManager
function listPosts() // Affichage de la page des posts
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/front/listPostsView.php');
}

function post() // Affichage d'un post
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $commentManager = new Projet4\Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/front/postView.php');
}


function addComment($postId, $author, $comment) // Ajout de commentaires
{
    $commentManager = new Projet4\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId . '&posted=success#comAnchor');
    }
}

function report($postId, $comment_id) // Signaler un commentaire
{
    $commentManager = new Projet4\Blog\Model\CommentManager();
    $report = $commentManager->reportComment($postId, $comment_id); 
    
    header('Location: index.php?action=post&id=' . $postId . '&comment=' . $comment_id . '&report=success#comAnchor');

    

}