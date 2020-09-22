<?php
// CONTROLEUR

require_once('model/PostManager.php');
require_once('model/LoginManager.php');


function listPostsAdmin() // Affichage de la page des posts
{
   
    $postManager = new Projet4\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/back/admin.php');
  
}

function create($title, $content) // Création d'un post
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $affectedLines = $postManager->createChapter($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le billet !');
    }
    else {
        header('Location:../../index.php');
    }
}

