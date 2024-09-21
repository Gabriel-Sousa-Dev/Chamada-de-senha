<?php 
include_once('./conexao.php');

// script para pegar todos dados do banco de dados

$query = 'SELECT * FROM alunos';
$stmt = $conexao->prepare($query);
$stmt->execute();

$dados = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($dados);