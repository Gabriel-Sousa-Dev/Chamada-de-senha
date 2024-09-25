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

        <div class="hero-body box has-text-centered m-6 has-background-dark">
            <div class="container ">
                <p class="title is-size-1 is-capitalized has-text-white" style="font-size: 4.5rem !important" id="NomeAluno">Aguarde alguns segundos...</p>
                <p class="subtitle has-text-white"><strong class="has-text-white">Professor:</strong> <span id='NomeProfessor'>...</span></p>
            </div>
        </div>
    </section>
    
    <script src='./assets/jquery-3.7.1.min.js'></script>
    <script>
        const spc = window.speechSynthesis;
        const audioPlayer = new Audio("./assets/toquezim.mpeg")
        audioPlayer.volume = 0.5
        let dadosAntigos = { id: 0 }

        setInterval( ()=>{
            $.ajax({
                url: 'AlunoEncaminhado.php',
                type: 'GET',
                success: async (data) => {
                    const dados = JSON.parse(data)
                    console.log(dados);

                    if(dados.dados_aluno.nome == null || dados.dados_professor.nome == null){
                        $('#NomeAluno').text("Nenhum aluno encaminhado!")
                        $("#NomeProfessor").text("...")
                        return;
                    }

                    console.log(dados.id, dadosAntigos.id);
                    
                    if(dadosAntigos.id === dados.id){
                        return;
                    }

                    $('#NomeAluno').text(dados.dados_aluno.nome)
                    $("#NomeProfessor").text(dados.dados_professor.nome)

                    const texto = `O aluno ${dados.dados_aluno.nome} deve ir para o professor ${dados.dados_professor.nome}`;
                    const spcU = new SpeechSynthesisUtterance(texto);
                    await audioPlayer.play()

                    setTimeout(()=>{
                        spc.speak(spcU)

                    }, 800)

                    dadosAntigos = dados;

                },
            })
        }, 5000 )

    </script>
</body>
</html>