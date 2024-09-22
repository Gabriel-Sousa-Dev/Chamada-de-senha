<?php include_once("./conexao.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Encaminhamentos</title>
    <link rel='stylesheet' href="./assets/bulma/css/bulma.css" >
    <link rel="stylesheet" href="./assets/fontawesome6/css/all.css">
</head>
<body>
    
        <section class="section">
            <nav class="breadcrumb is-centered has-bullet-separator is-medium" aria-label="breadcrumbs">
                <ul>
                    <li><a href="./index.php">Cadastrar aluno</a></li>
                    <li><a href="./CadastrarProfessor.php">Cadastrar Professor</a></li>
                    <li><a href="./CriarEncaminhamento.php">Criar Encaminhamento</a></li>
                    <li class="is-active"><a href="./ListagemEncaminhamento.php">Listagem de Encaminhamento</a></li>
                    <li><a href="./Tela_de_monitoramento.php" target="_blank">Tela de Monitoramento</a></li>
                </ul>
            </nav>
            <div class="container mt-4">
                <h1 class="title is-underlined my-5 is-centered block">Listagem de Encaminhamentos:</h1>
                <table class="table is-fullwidth mt-5 is-striped is-hoverable has-text-centered">
                    <thead>
                        <tr>
                            <th class="has-text-centered">ID</th>
                            <th class="has-text-centered">Aluno</th>
                            <th class="has-text-centered">Professor</th>
                            <th class="has-text-centered">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>12</td>
                            <td>Gabriel</td>
                            <td>Leandro</td>
                            <td>
                                <button class="button is-info" title="Concluir Encaminhamento"><i class="fa-solid fa-check"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Gabriel</td>
                            <td>Leandro</td>
                            <td>
                                <button class="button is-info is-disabled" title="Encaminhamento Concluído" disabled><i class="fa-solid fa-check"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Gabriel</td>
                            <td>Leandro</td>
                            <td>
                                <button class="button is-info" title="Concluir Encaminhamento"><i class="fa-solid fa-check"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
</body>
</html>