<?php
    include_once('./conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
    <link rel='stylesheet' href="./assets/bulma/css/bulma.css" >
    <link rel="stylesheet" href="./assets/fontawesome6/css/all.css">
</head>
<body>
    
    <section class="section">
        <nav class="breadcrumb is-centered has-bullet-separator is-medium" aria-label="breadcrumbs">
            <ul>
                <li class="is-active"><a href="./index.php">Cadastrar aluno</a></li>
                <li><a href="./CadastrarProfessor.php">Cadastrar Professor</a></li>
                <li><a href="./CriarEncaminhamento.php">Criar Encaminhamento</a></li>
                <li><a href="./ListagemEncaminhamento.php">Listagem de Encaminhamento</a></li>
                <li><a href="./Tela_de_monitoramento.php" target="_blank">Tela de Monitoramento</a></li>
            </ul>
        </nav>
        <div class="container mt-4">
            <h1 class="title is-underlined my-5 is-centered">Cadastro de aluno:</h1>
            <form action="" method="post">
                <div class="columns is-8">

                    <div class="column">
                        <div class="field">
                            <label for="NomeAluno" class="label">Nome do aluno</label>
                            <div class="control has-icons-left">
                                <input type="text" placeholder="Digite o nome do aluno" class="input" name="NomeAluno">
                                <span class="icon is-left"><i class="fa-solid fa-user"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label for="EmailAluno" class="label">Email do aluno</label>
                            <div class="control has-icons-left">
                                <input type="text" placeholder="Digite o email do aluno" class="input" name="EmailAluno" required>
                                <span class="icon is-left"><i class="fa-solid fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="button is-primary is-rounded">Cadastrar Aluno</button>

            </form>
        </div>
        <?php
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                if(isset($_POST["NomeAluno"]) && isset($_POST["EmailAluno"]) && $_POST["NomeAluno"] !== "" && $_POST["EmailAluno"] !== ""){
                    $query = "INSERT INTO alunos (id, nome, email) VALUE (NULL, :nome, :email)";
                    $stmt = $conexao->prepare($query);
                    
                    $stmt->bindParam(':nome', $_POST["NomeAluno"], PDO::PARAM_STR);
                    $stmt->bindParam(':email', $_POST["EmailAluno"], PDO::PARAM_STR);
                    $userIsRegistered = $stmt->execute();

                    if($userIsRegistered){
                        echo "
                        <article class='message is-success mt-5'>
                            <div class='message-body'>
                                <strong>Usuário </strong> ".$_POST["NomeAluno"]." foi cadastrado com sucesso!
                            </div>
                        </article>
                        ";
                    }
                }else{
                    echo "
                    <article class='message is-danger mt-5'>
                        <div class='message-body'>
                            Não foi possível cadastrar o Aluno!
                        </div>
                    </article>
                    ";
                } 
            }
        ?>
    </section>
</body>
</html>