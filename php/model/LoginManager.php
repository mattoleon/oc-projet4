<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");


class LoginManager extends Manager  {

  
   function loginAdmin($login, $password) {
      $login = $_POST['login'];
      // Modifié par sécurité --> $password = '$2y$10$x5kgaGT7oe9yEh.GyWNuTZRgZGTIS987HdnUD6BxCZeldIKcpQq';
      
      if ($_POST['login'] === '' AND password_verify($_POST['password'], $password))
      {
         $isAuthenticated = true;
         
      } else {
         $isAuthenticated = false;
      }
   return $isAuthenticated;
   } 


   
}