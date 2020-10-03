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

function displayNewChapter() 
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
        header('Location:../../index.php?action=listPostsAdmin');
    }
}

function displayUpdateChapter() 
{
	$postManager = new Projet4\Blog\Model\PostManager();
	$post = $postManager->getPost($_GET['id']);
	require('view/back/updateChapter.php');
}

function submitUpdate($title, $content, $postId)
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $update = $postManager->updateChapter($title, $content, $postId);
    header('Location:../../index.php?action=listPostsAdmin');
}

function displayLoginView() 
{
    require('view/front/login.php');
}


function login()
{
    $loginManager = new Projet4\Blog\Model\LoginManager();
    $isAuthenticated = $loginManager->loginAdmin($_POST['login'], $_POST['password']);

    if ($isAuthenticated === true) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        
        header('Location:../../index.php?action=listPostsAdmin&logged=success');
    }
    else {
        header('Location:../../index.php?action=displayLogin&logged=error');
    }
}

function logout() {
	$_SESSION = array();
	session_destroy();

	header('Location:../../index.php?action=listPosts&logout=success');
}

function delete($id)
{
    $postManager = new Projet4\Blog\Model\PostManager();
    $affectedLines = $postManager->deleteChapter($id);
    
    header('Location:../../index.php?action=listPostsAdmin');
}

function deleteComments($id)
{
    $reportManager = new Projet4\Blog\Model\reportManager();
    $affectedLines = $reportManager->deleteComment($id);
    header('Location:../../index.php?action=displayReport&rejected=success');
    
}

function displayReport()
{
    $reportManager = new Projet4\Blog\Model\ReportManager();
    $reports = $reportManager->displayComments();
    require('view/back/reportView.php');

}

function report($id)
{
    $reportManager = new Projet4\Blog\Model\reportManager();
    $reports = $reportManager->reportComment($id);
    header('Location:index.php?action=post&id=' . $postId);
}

function approve($id)
{
    $reportManager = new Projet4\Blog\Model\reportManager();
    $reports = $reportManager->approveComment($id);
    
    header('Location:../../index.php?action=displayReport&approved=success');
}

