<?php

class Debug{
    public function DD(mixed $data){
      echo "<pre>";
    var_dump($data);
      echo "<pre>";
      die;
}

public function VD(mixed $data){
 echo "<pre>";
    var_dump($data);
      echo "<pre>";

}
}