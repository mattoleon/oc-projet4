<?php
// CONTROLEUR
require_once('model/PostManager.php');
require_once('model/CommentManager.php');


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

// CommentManager
function addComment($postId, $author, $comment) // Affichage commentaires
{

    $commentManager = new Projet4\Blog\Model\CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}