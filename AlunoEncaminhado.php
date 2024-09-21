<?php
include_once("./conexao.php");

$query = "SELECT * FROM encaminhamentos ORDER BY criado_em DESC LIMIT 1";

$stmt = $conexao->prepare($query);
$stmt->execute();

$dados = $stmt->fetch(PDO::FETCH_ASSOC);

$queryProfessor = "SELECT * FROM professor WHERE id = :id_professor";
$stmtProfessor = $conexao->prepare($queryProfessor);
$stmtProfessor->bindParam(":id_professor", $dados['id_tb_professor'], PDO::PARAM_INT);
$stmtProfessor->execute();
$dadosProfessor = $stmtProfessor->fetch(PDO::FETCH_ASSOC);

$queryAluno = "SELECT * FROM alunos WHERE id = :id_aluno";
$stmtAluno = $conexao->prepare($queryAluno);
$stmtAluno->bindParam(":id_aluno", $dados['id_tb_aluno'], PDO::PARAM_INT);
$stmtAluno->execute();
$dadosAluno = $stmtAluno->fetch(PDO::FETCH_ASSOC);

$dados["dados_aluno"] = $dadosAluno;
$dados["dados_professor"] = $dadosProfessor;


echo json_encode($dados);


#echo json_encode($dados);