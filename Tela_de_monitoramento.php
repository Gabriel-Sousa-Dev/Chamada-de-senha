<?php include_once('./conexao.php') ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de monitoramento</title>
    <link rel='stylesheet' href="./assets/bulma/css/bulma.css" >
    <link rel="stylesheet" href="./assets/fontawesome6/css/all.css">
</head>
<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-head has-text-centered mt-6">
            <p class="title is-1 is-underlined has-text-white">Aluno encaminhado:</p>
        </div>

        <div class="hero-body box has-text-centered m-6">
            <div class="container">
                <p class="title is-size-1 is-capitalized has-text-white" style="font-size: 4.5rem !important" id="NomeAluno">placeholder</p>
                <p class="subtitle has-text-white"><strong class="has-text-white">Professor:</strong> <span id='NomeProfessor'>Leandro Costa</span></p>
            </div>
        </div>
    </section>
    
    <!-- Importação do Jquery, ele já está adicionado em nosso projeto -->
    <script src='./assets/jquery-3.7.1.min.js'></script>
    <script>
        // SetInterval( func, time )
        // func será executada á cada time, em milissegundos
        setInterval( ()=>{
            // Utilizando o ajax do Jquery
            // ajax se trata de atualizar o dados de um site sem recerregar a página
            $.ajax({
                url: 'alunoEncaminhado.php',
                type: 'GET',
                beforeSend: ()=>{
                    // Essa função é executada antes do inicio do ajax
                    $('h1').html('Carregando...');
                },
                success: data => {
                    // Essa função é executada quando há sucesso na execução do ajax
                    const dados = JSON.parse(data)
                    console.log(dados);

                    if(dados.dados_aluno.nome == null || dados.dados_professor.nome == null){
                        $('#NomeAluno').text("Nenhum aluno encaminhado!")
                        $("#NomeProfessor").text("...")
                        return;
                    }
                    
                    $('#NomeAluno').text(dados.dados_aluno.nome)
                    $("#NomeProfessor").text(dados.dados_professor.nome)

                },
            }).done( ()=>{
                // Essa função é executada no fim do ajax
                $('h1').html('Todos Alunos')
            } )
        }, 5000 )

    </script>
</body>
</html>