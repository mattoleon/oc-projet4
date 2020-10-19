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
        // Affiche la vue login
        elseif ($_GET['action'] == 'displayLogin') {
            displayLoginView();
        } // Lance la connexion
        elseif ($_GET['action'] == 'login') {
            login($_POST['login'], $_POST['password']);
        } 
        
        // Vérifie si la variable de session est bien en place
        elseif (empty($_SESSION)) {
            throw new Exception('Administrateur non identifié');
		} else { // Si la session existe, alors on lance les actions:
            switch($_GET['action']) {
                case 'displayReport': // Affiche la vue modération
                    displayReport(); 
                break;
                case 'createPost': // Affiche la vue de l'éditeur pour créer un chapitre
                    displayNewChapter(); 
                break;
                case 'create': // Soumet la création d'un nouveau chapitre
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        create($_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Impossible d\'afficher le billet');
                    }
                break;
                case 'updateChapter': // Affiche la vue pour éditer un article
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    displayUpdateChapter(); 
                }
                break;
                case 'submitUpdate': // Soumet la mise à jour d'un article
                    submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
                break;
                case 'delete': // Supprime un article
                    delete($_GET['id']); 
                break;
                case 'approve': // Approuve un commentaire
                    approve($_GET['id']); 
                break;
                case 'deleteComments': // Supprime un commentaire
                    deleteComments($_GET['id']); 
                break;
                case'logout': // Lance la déconnexion
                    logOut(); 
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
 