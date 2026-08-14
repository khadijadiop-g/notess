<?php

require_once dirname(__DIR__)."/entity/User.php";

class UserModel{
    public function getUser(string $email):array{
    $pdo = deconnecteDB();
    $sql = " SELECT s.*,r.* FROM superviseurs s 
 INNER JOIN roles r ON s.id_role = r.id 
 WHERE email = :email";

 return executeQuery($pdo,$sql,['email'=>$email]);

}
}