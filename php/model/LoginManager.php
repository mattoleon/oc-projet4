<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");


class LoginManager extends Manager  {

  
   // Action pour se connecter à l'espace Admin
   function loginAdmin($login, $password) {
      
      $db = $this->dbConnect();
      
      if (isset($_POST['submit'])); // Si le formulaire est envoyé...
      {
         $login = htmlspecialchars($_POST['login']);
         $password = htmlspecialchars($_POST['password']);
         $result = $db->prepare("SELECT * FROM admin WHERE login = '$login'");
         $result -> execute();

         if($result->rowCount() > 0) // Si j'ai une entrée dans ma BDD, je fais mon password verify...
         {
            $data = $result->fetchAll();
            if(password_verify($password, $data[0]['password']))
            {
               $isLogged = true;
            } 
         } else { // ...Sinon, je crée un identifiant et un mot de passe haché
            $password = password_hash($password, PASSWORD_DEFAULT);
            $req = $db->prepare("INSERT INTO admin (login, password) VALUES('$login','$password')");
            $req->execute(); 
         }
         return $isLogged;
      } 
   } 

   
}