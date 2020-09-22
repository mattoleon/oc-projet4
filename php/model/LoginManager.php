<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");

function loginAdmin() {
   if (isset($_POST['password']) AND ($_POST['login']) AND $_POST['password'] ==  "forteroche" AND $_POST['login'] == "admin") // Si le mot de passe est bon
   {

   //On ouvre la session
    session_start();
    $_SESSION['login'] = $login;
    
     
   }
   else if (isset($_POST['password'])!=  "forteroche" OR $_POST['login'] != "admin")
   {
      echo '<p>Identifiants incorrectes</p>';
   }
}
