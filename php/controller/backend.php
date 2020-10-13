<?php
// CONTROLEUR
require_once('model/PostManager.php');
require_once('model/LoginManager.php');
require_once('model/ReportManager.php');

function listPostsAdmin() // Affichage de la page des posts
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $posts = $postManager->getPosts();

    require('view/back/admin.php'); 
}

function displayNewChapter() // Affiche la vue newChapter.php pour créer un nouveau chapitre
{
    require('view/back/newChapter.php');
}

function create($title, $content) // Création d'un post
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $affectedLines = $postManager->createChapter($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le billet !');
    }
    else {
        header('Location:index.php?action=listPostsAdmin');
    }
}

function displayUpdateChapter() // Affichage la vue d'édition d'un article
{
	$postManager = new Projet4\Blog\Model\PostManager();
	$post = $postManager->getPost($_GET['id']);
	require('view/back/updateChapter.php');
}

function submitUpdate($title, $content, $postId) // Soumet la modification d'un article
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $update = $postManager->updateChapter($title, $content, $postId);
    header('Location:index.php?action=listPostsAdmin&updated=success');
}

function displayLoginView()  // Affiche de la vue login.php
{
    require('view/front/login.php');
}


function login($login,$password) // Vérifie la requête de la méthode loginAdmin
{
    $loginManager = new Projet4\Blog\Model\LoginManager();
    $data = $loginManager->loginAdmin($login);
    $isPasswordCorrect = password_verify($password, $data["password"]);
    
    if ($isPasswordCorrect)
    {
        $_SESSION['login'] = $login;
        header('Location:index.php?action=listPostsAdmin&logged=success');
    }
    else
    {
         $_SESSION["error"] = true;
         header('Location:index.php?action=displayLogin&logged=error');
    }
}

function logout() // Fait un session_destroy pour se déconnecter
{
	$_SESSION = array();
	session_destroy();

	header('Location:index.php?action=listPosts&logout=success');
}

function delete($id) // Supprimme un article
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $affectedLines = $postManager->deleteChapter($id);
    
    header('Location:index.php?action=listPostsAdmin');
}

function deleteComments($comment_id) // Supprimme un commentaire
{
    $reportManager = new Projet4\Blog\Model\ReportManager();
    $affectedLines = $reportManager->deleteComment($comment_id);

    
    header('Location:index.php?action=displayReport&rejected=success');
    
}

function displayReport() // Affiche la vue reportView.php
{
    $reportManager = new Projet4\Blog\Model\ReportManager();
    $reports = $reportManager->displayComments();
    require('view/back/reportView.php');

}


function approve($comment_id) // Approuve un commentaire signalé, inverse sa valeur booléenne
{
    $reportManager = new Projet4\Blog\Model\ReportManager();
    $reports = $reportManager->approveComment($comment_id);
    
    header('Location:index.php?action=displayReport&approved=success');
}

