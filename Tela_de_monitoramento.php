<?php include_once('./conexao.php') ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de monitoramento</title>
</head>
<body>
    <h1>Todos alunos</h1>
    <ol id="listaDinamica">
        <li>Nenhum aluno na lista</li>
    </ol>
    <!-- Html com a listagem dos alunos -->
    
    <!-- Importação do Jquery, ele já está adicionado em nosso projeto -->
    <script src='./assets/jquery-3.7.1.min.js'></script>
    <script>
        // SetInterval( func, time )
        // func será executada á cada time, em milissegundos
        setInterval( ()=>{
            // Utilizando o ajax do Jquery
            // ajax se trata de atualizar o dados de um site sem recerregar a página
            $.ajax({
                url: 'todosAluno.php',
                type: 'GET',
                beforeSend: ()=>{
                    // Essa função é executada antes do inicio do ajax
                    $('h1').html('Carregando...');
                },
                success: data => {
                    // Essa função é executada quando há sucesso na execução do ajax
                    const dados = JSON.parse(data)

                    $('#listaDinamica').html('')

                    // Substituindo os dados da lista para o que há na tabela de alunos
                    dados.forEach( dado => {
                        let newLi = document.createElement('li');

                        newLi.innerText = `${dado.nome} | ${dado.email}`;

                        $('#listaDinamica').append(newLi)
                    } )
                },
            }).done( ()=>{
                // Essa função é executada no fim do ajax
                $('h1').html('Todos Alunos')
            } )
        }, 5000 )

    </script>
</body>
</html>