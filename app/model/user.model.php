<?php

function getUser(string $email):array{
    $pdo = deconnecteDB();
    $sql = " SELECT s.*,r.* FROM superviseurs s 
 INNER JOIN roles r ON s.id_role = r.id 
 WHERE email = :email";

 return executeQuery($pdo,$sql,['email'=>$email]);

}