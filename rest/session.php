<?php

$json = json_decode(file_get_contents('php://input'),true);

$reque = $_SERVER['REQUEST_METHOD'];

if ($reque == 'POST')
{
    try {
        session_start();
        $_SESSION['email'] = $json['email'];
        $_SESSION['name'] = $json['nombres'];
        $array = array("status"=>200);
        return json_encode(array_map('utf8_encode',$array));
    }catch (Exception $e){
        $array = array("status"=>300);
        return json_encode(array_map('utf8_encode',$array));
    }
}


?>
