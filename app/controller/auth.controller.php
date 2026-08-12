<?php
require_once dirname(__DIR__)."/model/user.model.php";
function login(){
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


function logout(){
    destroy_session();
   header("Location:http://localhost:9000");
            exit;

}