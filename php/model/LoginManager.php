<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");


class LoginManager extends Manager  {

  
   function loginAdmin($login, $password) {
      $login = $_POST['login'];
      $password = '$2y$10$x5kgaGT7oe9yEh.GySPWNuTZRgZGTIS987HdnUD6BxCZeldIKcpQq';
      
      if ($_POST['login'] === 'jean' AND password_verify($_POST['password'], $password))
      {
         $isAuthenticated = true;
         
      } else {
         $isAuthenticated = false;
      }
   return $isAuthenticated;
   } 


   
}