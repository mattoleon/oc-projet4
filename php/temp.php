<?php 
($_GET['action'] == 'createPost') {
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
            login($_POST['login'], $_POST['password']);
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