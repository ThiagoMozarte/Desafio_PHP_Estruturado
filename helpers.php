<?php

const BASE_URL = "http://localhost/Desafio_PHP_Estruturado";
const JSON_PRODUCTS_URL = "http://localhost/Desafio_PHP_Estruturado/produtos.json";

function url($uri = NULL){
    if($uri){
        return BASE_URL."/$uri";
    }
    return BASE_URL;
}

function setMessage($typeAlert, $message){
    $_SESSION['flash'] = "<div class='alert alert-$typeAlert'>$message</div>";
}

function getMessage(){
    if(isset($_SESSION['flash'])){
        $message = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $message;
    }

}

function jsonToArray($json){
    if($json){
        return json_decode($json, true);
    }
    return [];
}   

function getLastInsertId(){
    $id = file_get_contents("http://localhost/Desafio_PHP_Estruturado/key.txt");
    if($id){
        return $id;
    }
    return 0;
}

function incrementId(){
    $lastId = getLastInsertId();
    $lastId++;
    file_put_contents(__DIR__."/key.txt", $lastId);
}