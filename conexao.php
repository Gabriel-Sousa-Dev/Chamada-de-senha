<?php 
define('BDNAME', 'cejap');
define('ROOT', 'localhost:3306');
define('USER', 'root');
define('PASSWORD', '');

try{
    $conexao = new PDO('mysql:dbname='.BDNAME.';host='.ROOT, USER, PASSWORD);
}catch(PDOException $e){
    echo "$e<br>".var_dump($conexao);
}