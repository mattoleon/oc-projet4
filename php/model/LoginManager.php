<?php

namespace Projet4\Blog\Model;

require_once("model/Manager.php");


class LoginManager extends Manager  {

   public function loginAdmin($login){
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT * FROM admin WHERE username = :username');
      $req->execute(array("username" => $login));
      return $req->fetch();
      }

}