<?php
session_start();
require "helpers.php";
require "functions/products.php";


$request = (isset($_GET["request"]) ? $_GET["request"] : "home");
$file = "pages/$request.php";

if(file_exists($file)){
    require $file;
} else{
    echo "Página não encontrada";
}

