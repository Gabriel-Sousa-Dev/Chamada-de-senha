<?php

    include_once("./conexao.php");
    if(isset($_GET['id'])){
        $query = "UPDATE `encaminhamentos` SET `terminado` = '1' WHERE `encaminhamentos`.`id` = :alunoID";

        $stmt = $conexao->prepare($query);

        $stmt->bindParam(":alunoID", $_GET["id"], PDO::PARAM_INT);
        $stmt->execute();


    }

header("Location: ListagemEncaminhamento.php");