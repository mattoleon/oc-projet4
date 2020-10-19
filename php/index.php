<?php
session_start(); // Démarrage de la session

// ROUTEUR
require('controller/frontend.php');
require('controller/backend.php');

try {
    if (isset($_GET['action'])) {

        // --------- FONCTIONS FRONTEND ---------

        // Action qui appelle l'affichage des posts
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
        
        // Action qui appelle l'ajout de commentaires
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
        } // Signale un article
        elseif ($_GET['action'] == 'report') {
            report($_GET['id'], $_GET['comment_id']);
        }  

        // --------- FONCTIONS BACKEND ---------
        // Affichage de la page d'accueil admin
        elseif ($_GET['action'] == 'listPostsAdmin') {
            listPostsAdmin(); 
        }
         // Update un article
        elseif ($_GET['action'] == 'submitUpdate') {
			submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
        }
        // Soumet la création d'un nouvel article
        elseif ($_GET['action'] == 'create') {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                create($_POST['title'], $_POST['content']);
            }
            else {
                throw new Exception('Impossible d\'afficher le billet');
            }
        } 
        elseif ($_GET['action'] == 'displayLogin') {
            displayLoginView();
        } // Lance la connexion
        elseif ($_GET['action'] == 'login') {
            login($_POST['login'], $_POST['password']);
        } // Lance la déconnexion
        elseif ($_GET['action'] == 'logout') {
            logOut();
        } 
        
        // Vérifie si la variable de session est bien en place
        elseif (empty($_SESSION)) {
            throw new Exception('Administrateur non identifié');
		} else { // Si la session existe, alors on lance les actions:
            switch($_GET['action']) {
                case'displayReport':
                    displayReport(); // Affiche la vue modération
                break;
                case 'createPost':
                    displayNewChapter(); // Affiche un nouveau chapitre
                break;
                case 'updateChapter':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    displayUpdateChapter(); // Affiche la vue pour éditer un article
                }
                break;
                case 'delete': 
                    delete($_GET['id']); // Supprime un article
                break;
                case'approve':
                    approve($_GET['id']); // Approuve un commentaire
                break;
                case 'deleteComments':
                    deleteComments($_GET['id']); // Supprime un commentaire
                break;
            }
        }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
 