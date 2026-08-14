<?php
require_once dirname(__DIR__)."/model/repository/user.model.php";

class authController{
   public function login(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = getUser($email);
        if(!empty($result) && $result['mot_de_passe']==$password){
            set_session("connect",$result);
            header("Location:http://localhost:9000/lister");
            exit;
        }
         header("Location:http://localhost:9000");
            exit;
    }
require_once dirname(__DIR__)."/view/login.html.php";

}


public function logout(){
    destroy_session();
   header("Location:http://localhost:9000");
            exit;

}
}