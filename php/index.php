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
        
        elseif ($_GET['action'] == 'createPost') {
			if (!empty($_SESSION)) {
				displayNewChapter();
			} else {
				throw new Exception('Administrateur non identifié');
			}
        } // Affiche la vue d'édition d'un chapitre
        elseif ($_GET['action'] == 'updateChapter') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				if (!empty($_SESSION)) {
                    displayUpdateChapter();
				}  
	        } else {
				throw new Exception('Administrateur non identifié');
			}
        } // Update un article
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
        }  // Supprimme un article
        elseif ($_GET['action'] == 'delete') {
            delete($_GET['id']);
        } // Affiche la vue login
        elseif ($_GET['action'] == 'displayLogin') {
            displayLoginView();
        } // Lance la connexion
        elseif ($_GET['action'] == 'login') {
            login();
        } // Lance la déconnexion
        elseif ($_GET['action'] == 'logout') {
            logOut();
        } 
        
        // Affichage des articles en mode Admin
        elseif ($_GET['action'] == 'listPostsAdmin') {
            listPostsAdmin();
        } // Affichage de la vue modération
        elseif ($_GET['action'] == 'displayReport') {
            if (!empty($_SESSION)) {
                displayReport();
            } else {
            throw new Exception('Oups, un problème est survenu !');
			}
        }  // Approuve un commentaire
        elseif ($_GET['action'] == 'approve') {
            approve($_GET['id']);
        } // Supprimme un commentaire
        elseif ($_GET['action'] == 'deleteComments') {
			deleteComments($_GET['id']);
        } 
    }
    else {
        listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
 