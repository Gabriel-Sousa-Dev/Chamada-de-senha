<?php include_once("./conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Professor</title>
    <link rel='stylesheet' href="./assets/bulma/css/bulma.css" >
    <link rel="stylesheet" href="./assets/fontawesome6/css/all.css">
</head>
<body>
    
        <section class="section">
            <nav class="breadcrumb is-centered has-bullet-separator is-medium" aria-label="breadcrumbs">
                <ul>
                    <li><a href="./index.php">Cadastrar aluno</a></li>
                    <li class="is-active"><a href="./CadastrarProfessor.php">Cadastrar Professor</a></li>
                    <li><a href="./CriarEncaminhamento.php">Criar Encaminhamento</a></li>
                    <li><a href="./ListagemEncaminhamento.php">Listagem de Encaminhamento</a></li>
                    <li><a href="./Tela_de_monitoramento.php" target="_blank">Tela de Monitoramento</a></li>
                </ul>
            </nav>
            <div class="container mt-4">
                <h1 class="title is-underlined my-5 is-centered">Cadastrar Professor:</h1>
                <form action="" method="post">
                    <div class="columns is-8">
                        
                        <div class="column">
                            <div class="field">
                                <label for="" class="label" >Nome do Professor:</label>
                                <div class="control has-icons-left">
                                    <input type="text" class="input" placeholder="Digite o nome do professor" required name="NomeProfessor">
                                    <span class="icon is-left"><i class="fa-solid fa-user"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="column">
                            <div class="field">
                                <label for="" class="label">Email do Professor:</label>
                                <div class="control has-icons-left">
                                    <input type="text" class="input" placeholder="Digite o email do professor" required name="EmailProfessor">
                                    <span class="icon is-left"><i class="fa-solid fa-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="button is-primary is-rounded">Cadastrar Encaminhamento</button>

                </form>
            </div>
            <?php
                if($_SERVER["REQUEST_METHOD"] === "POST"){
                    if(isset($_POST["NomeProfessor"]) && isset($_POST["EmailProfessor"]) && $_POST["NomeProfessor"] !== "" && $_POST["EmailProfessor"] !== ""){
                        $query = "INSERT INTO professor (id, nome, email) VALUE (NULL, :nome, :email)";
                        $stmt = $conexao->prepare($query);

                        $stmt->bindParam(':nome', $_POST["NomeProfessor"], PDO::PARAM_STR);
                        $stmt->bindParam(':email', $_POST["EmailProfessor"], PDO::PARAM_STR);
                        $userIsRegistered = $stmt->execute();
                    
                        if($userIsRegistered){
                            echo "
                            <article class='message is-success mt-5'>
                                <div class='message-body'>
                                    <strong>Professor </strong> ".$_POST["NomeProfessor"]." foi cadastrado com sucesso!
                                </div>
                            </article>
                            ";
                        }else{
                            echo 'nao';
                        }
                    }else{
                        echo "
                        <article class='message is-danger mt-5'>
                            <div class='message-body'>
                                Não foi possível cadastrar o Professor!
                            </div>
                        </article>
                        ";
                    } 
                }
            ?>
        </section>
</body>
</html>