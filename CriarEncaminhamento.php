<?php include_once("./conexao.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Encaminhamento</title>
    <link rel='stylesheet' href="./assets/bulma/css/bulma.css" >
    <link rel="stylesheet" href="./assets/fontawesome6/css/all.css">
</head>
<body>
    
        <section class="section">
            <nav class="breadcrumb is-centered has-bullet-separator is-medium" aria-label="breadcrumbs">
                <ul>
                    <li><a href="./index.php">Cadastrar aluno</a></li>
                    <li><a href="./CadastrarProfessor.php">Cadastrar Professor</a></li>
                    <li class="is-active"><a href="#">Criar Encaminhamento</a></li>
                    <li><a href="./ListagemEncaminhamento.php">Listagem de Encaminhamento</a></li>
                    <li><a href="./Tela_de_monitoramento.php" target="_blank">Tela de Monitoramento</a></li>
                </ul>
            </nav>
            <div class="container mt-4">
                <h1 class="title is-underlined my-5 is-centered">Criar Encaminhamento:</h1>
                <form action="" method="post">
                    <div class="columns is-8">

                        <?php
                            $queryAlunos = "SELECT * FROM alunos";
                            $stmtAlunos = $conexao->prepare($queryAlunos);
                            $stmtAlunos->execute();
                        ?>
                        <div class="column">
                            <div class="field">
                                <label for="" class="label" >Nome do aluno:</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select required name='aluno'>
                                            <option value="*" disabled selected>Escolha um Aluno</option>
                                            <?php 
                                                while($show = $stmtAlunos->fetch(PDO::FETCH_OBJ)){
                                                    echo "<option value=".$show->id.">".$show->nome."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                            $queryProfessores = "SELECT * FROM professor";
                            $stmtProfessores = $conexao->prepare($queryProfessores);
                            $stmtProfessores->execute();
                        ?>
                        <div class="column">
                            <div class="field">
                                <label for="" class="label">Professor:</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select required name="professor">
                                            <option value="*" disabled selected>Escolha um Professor</option>
                                            <?php
                                                while($show = $stmtProfessores->fetch(PDO::FETCH_ASSOC)){
                                                    echo "<option value=".$show['id'].">".$show['nome']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="button is-primary is-rounded">Cadastrar Encaminhamento</button>

                </form>
            </div>
            <?php
                if($_SERVER["REQUEST_METHOD"] === "POST"){
                    if(isset($_POST["aluno"]) && isset($_POST["professor"]) && $_POST["aluno"] !== "" && $_POST["professor"] !== ""){
                        $query = "INSERT INTO encaminhamentos (id, id_tb_aluno, id_tb_professor) VALUES (NULL, :id_aluno, :id_professor)";
                    
                        $stmt = $conexao->prepare($query);
                        $stmt->bindParam(":id_aluno", $_POST['aluno'], PDO::PARAM_STR);
                        $stmt->bindParam(":id_professor", $_POST['professor'], PDO::PARAM_STR);
                        
                        $isForwarding = $stmt->execute();
                        if ($isForwarding) {
                            echo "
                                <article class='message is-success mt-5'>
                                    <div class='message-body'>
                                        O aluno foi encaminhado com sucesso
                                    </div>
                                </article>
                            ";
                        }else{
                            echo "
                                <article class='message is-danger mt-5'>
                                    <div class='message-body'>
                                        Não foi possível realizar o encaminhamento!
                                    </div>
                                </article>
                            ";

                        }
                    }
                }
            ?>
        </section>
</body>
</html>