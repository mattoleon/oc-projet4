<?php


// ROUTEUR
require('controller/frontend.php');
require('controller/backend.php');


try {
    if (isset($_GET['action'])) {

        // FONCTIONS FRONTEND

        // Fonction qui appelle l'affichage des posts
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        // Fonction qui appelle l'ajout de commentaires
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Impossible d\'afficher le commentaire');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        // FONCTIONS BACKEND
 
     
        // Fonction qui soumet la création d'un nouvel article
        elseif ($_GET['action'] == 'create') {
           
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    create($_POST['title'], $_POST['content']);
                }
                else {
                    throw new Exception('Impossible d\'afficher le billet');
                }
            
        }    // Fonction qui appelle l'affichage des articles en mode Admin
        elseif ($_GET['action'] == 'listPostsAdmin') {
			
            listPostsAdmin();
           
		} 
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
