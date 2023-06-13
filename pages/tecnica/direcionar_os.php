<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
global $resultadoConsulta;
global $resultadoConsultaTecnicos;

$resultadoConsulta = minhaFuncao($queryService);
$resultadoConsultaTecnicos = buscarUsers($queryService);

function buscarUsers(QueryService $queryService)
{
    $tabelaUsers = "users";
    $colunaUsers = "";
    $condicoesUsers = "user_tipo = 2";

    $resultado = $queryService->busca($tabelaUsers, $colunaUsers, $condicoesUsers);
    $resultadoJson = json_encode($resultado);
    echo "<script>console.log($resultadoJson);</script>";
    return $resultadoJson;
}
function minhaFuncao(QueryService $queryService)
{
    $tabelaOS = "os";
    $colunasOS = ["os_status", "os_solicitante"];

    $resultado = $queryService->busca($tabelaOS);


    $resultadoJson = json_encode($resultado);




    echo "<script>console.log($resultadoJson);</script>";

    return $resultadoJson;
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
    .containerr {
        width: 100%;
        margin: 0 auto;
        background-color: #0C1B38;
        height: 50px;
        border-radius: 10px;
        /* overflow-x: auto; */
        /* white-space: nowrap; */
        justify-content: center;
        place-items: center;
        display: flex;
        /* margin-top: -10px; */
    }


    .container::-webkit-scrollbar {
        width: 12px;
    }

    .container::-webkit-scrollbar-track {
        background-color: #f1f1f1;
        border-radius: 10px;
    }

    .container::-webkit-scrollbar-thumb {
        background-color: #bebebe;
        border-radius: 10px;
    }

    .container::-webkit-scrollbar-thumb:hover {
        background-color: #919191;
    }

    .carousel {
        display: inline-block;
    }

    .divCarrossel {
        display: inline-block;
        width: 160px;
        height: 85px;
        border-radius: 12px;
        background-color: #0C1B38;
        border: 1px solid #0446c2;
        margin: 10px 15px -76px;
        cursor: move;
        font-size: 0.8em;
        color: white;
        padding: 5px;
    }

    .card-body {
        display: flex;
        flex-direction: row;
        align-items: center;
        height: 100%;
    }

    .icon-section {
        flex-basis: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .info-section {
        flex-basis: 80%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .info-section p {
        margin: 0;
        padding: 0;
    }

    .fas.fa-wrench {
        font-size: 1.2em;
    }

    .hoverHighlight {
        background-color: #777777;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-left: auto;
        margin-right: auto;
        /* overflow: hidden; */
        margin-top: -15px;
    }

    .table-container {
        max-height: calc(8 * 50px);
        /* Altura máxima para mostrar 8 linhas */
        overflow-y: auto;
        /* Habilita a rolagem vertical */
        border-radius: 10px;
    }

    .thead-fixado {
        position: sticky;
        top: 0;
        background-color: white;
        z-index: 1;
    }

    .espacamento {
        height: 15px;
    }







    .rounded-table {
        border-collapse: separate;
        border-spacing: 0;
    }

    th,
    td {
        height: 40px;
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
        position: relative;

    }

    .rounded-table th {
        border-bottom: 1px solid #0C1B38;
    }

    .rounded-table th:first-child {
        border-left: 1px solid #ccc;
    }

    .rounded-table th:last-child {
        border-right: 1px solid #ccc;
    }

    th {
        background-color: #0C1B38;
        color: white;
        border: #ffffff;
        vertical-align: bottom;
    }

    tr {
        background-color: #ffffff;
    }

    tr:hover {
        background-color: #bebebe;
    }

    .expanded-container {
        width: 100%;
        margin: 0 auto;
        background-color: #0C1B38;
        height: 170px;
        border-radius: 10px;
        overflow-x: auto;
        white-space: nowrap;
    }

    .minimization-container {
        width: 100%;
        margin: 0 auto;
        background-color: #c2ceff;
        height: 120px;
        border-radius: 10px;
        overflow-x: auto;
        white-space: nowrap;
    }

    .expanded-container::-webkit-scrollbar {
        width: 12px;

    }

    .expanded-container::-webkit-scrollbar-track {
        background-color: #f1f1f1;
        border-radius: 10px;
    }

    .expanded-container::-webkit-scrollbar-thumb {
        background-color: #bebebe;
        border-radius: 10px;
    }

    .expanded-container::-webkit-scrollbar-thumb:hover {
        background-color: #919191;
    }

    .botaoWrapper {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
</style>
<h1 id="resultado"></h1>



<div class="containerr">
    <button style="width: 10%;
         background-color: #6B1F34;
          border: 1px solid #9C273F;
           cursor: pointer;
           color: #fff;
             height: 26px;
              border-radius: 10px;" type="button" onclick="mostraContainer()">Exibir O.S</button>
</div>
<br>


<div class="table-container">
    <table id="funcionarios" class="rounded-table">
        <thead class="thead-fixado">
            <tr>
                <th style="width: 200px; height: 50px;" id="dataCelula" colspan="12"></th>
            </tr>
            <tr>
                <th style="width: 200px; height: 50px;">Técnicos</th>
                <th style="border: 1px solid #ddd;">8</th>
                <th style="border: 1px solid #ddd;">9</th>
                <th style="border: 1px solid #ddd;">10</th>
                <th style="border: 1px solid #ddd;">11</th>
                <th style="border: 1px solid #ddd;">12</th>
                <th style="border: 1px solid #ddd;">13</th>
                <th style="border: 1px solid #ddd;">14</th>
                <th style="border: 1px solid #ddd;">15</th>
                <th style="border: 1px solid #ddd;">16</th>
                <th style="border: 1px solid #ddd;">17</th>
                <th style="border: 1px solid #ddd;">18</th>
            </tr>
        </thead>
        <tbody id="tbodyFuncionarios">
            <!-- As linhas dos técnicos serão adicionadas dinamicamente aqui -->
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        retornarDataAtual()
    });

    function retornarDataAtual() {
        var dataCelula = document.getElementById("dataCelula");

        var dataAtual = new Date();

        var dia = dataAtual.getDate();
        var mes = dataAtual.getMonth() + 1;
        var ano = dataAtual.getFullYear();
        var dataFormatada = dia + "/" + mes + "/" + ano;

        dataCelula.textContent = dataFormatada;
    }
    var resultadoConsultaTecnicos = <?php echo $resultadoConsultaTecnicos; ?>;

    function montarTabelaTecnicos() {
        var tbody = document.getElementById("tbodyFuncionarios");

        // Limpar o conteúdo atual do tbody
        tbody.innerHTML = "";

        var linhaEspacamento = document.createElement("tr");
        linhaEspacamento.classList.add("espacamento");
        tbody.appendChild(linhaEspacamento);

        // Gerando as linhas da tabela com base nos técnicos
        resultadoConsultaTecnicos.forEach(function(tecnico) {
            // Criando uma nova linha
            var novaLinha = document.createElement("tr");

            // Criando a célula com o nome do técnico
            var nomeCelula = document.createElement("td");
            nomeCelula.style.textAlign = "left";
            nomeCelula.style.display = "flex";
            nomeCelula.style.alignItems = "center";
            nomeCelula.style.backgroundColor = "#0C1B38";
            nomeCelula.style.color = "white";
            nomeCelula.style.border = "none"; // Removendo a borda

            // Criando a imagem do técnico
            var imagem = document.createElement("img");
            imagem.src = "https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80";
            imagem.style.width = "30px";
            imagem.style.height = "30px";
            imagem.style.objectFit = "cover";
            imagem.style.borderRadius = "50%";

            // Criando o span com o nome do técnico
            var span = document.createElement("span");
            span.style.marginLeft = "10px";
            span.style.display = "flex";
            span.style.alignItems = "center";
            span.textContent = tecnico.user_nome;

            // Adicionando a imagem e o span à célula
            nomeCelula.appendChild(imagem);
            nomeCelula.appendChild(span);

            // Adicionando a célula com o nome do técnico à nova linha
            novaLinha.appendChild(nomeCelula);

            // Criando a célula vazia com colspan
            var colspanCelula = document.createElement("td");
            colspanCelula.colSpan = "11";
            colspanCelula.classList.add("linha");

            // Adicionando a célula vazia à nova linha
            novaLinha.appendChild(colspanCelula);

            // Adicionando a nova linha ao tbody
            tbody.appendChild(novaLinha);
        });
    }

    montarTabelaTecnicos();

    var tabela = document.getElementById("funcionarios");
    var thead = tabela.querySelector("thead");
    thead.classList.add("thead-fixado");




    // Recupere a string JSON do PHP
    var resultadoJson = <?php echo $resultadoConsulta; ?>;
    console.log('ola', resultadoJson)

    // Converta a string JSON em um objeto JavaScript
    var resultadoObj = (resultadoJson);

    // Exiba os valores desejados do objeto JavaScript
    // var h1Element = document.getElementById("resultado");
    // h1Element.innerHTML = "Valor do os_id: " + resultadoObj;
    var h1Element = document.getElementById("resultado");
    h1Element.innerHTML = ""

    // for (var i = 0; i < resultadoObj.length; i++) {
    //     // Exibir todas as propriedades do objeto
    //     var objeto = resultadoObj[i];
    //     h1Element.innerHTML += i + ":<br>";

    //     for (var prop in objeto) {
    //         h1Element.innerHTML += prop + ": " + objeto[prop] + "<br>";
    //     }

    //     h1Element.innerHTML += "<br>";
    // }

    function teste() {
        $('.divCarrossel').draggable({
            revert: "invalid",
            cursor: "move",
            helper: function() {
                return $(this).clone().css({
                    'z-index': 1000,
                    'height': '20px' // diminui a altura ao arrastar
                }).html('');
            },
            start: function(event, ui) {
                $(this).fadeTo('fast', 0.5);
            },
            stop: function(event, ui) {
                $(this).fadeTo(0, 1);
                $(this).css('height',
                    '85px'); // retorna a altura para 70px quando o arrasto termina
            }
        });

        $('.linha').droppable({
            accept: ".divCarrossel",
            over: function(event, ui) {
                $(this).addClass('hoverHighlight');
            },
            out: function(event, ui) {
                $(this).removeClass('hoverHighlight');
            },
            drop: function(event, ui) {
                let droppedItem = ui.draggable;
                let startTime = parseInt(droppedItem.attr('data-start-time'));
                let endTime = parseInt(droppedItem.attr('data-end-time'));
                let totalHours = 18 - 8;
                let adjustedStartTime = startTime - 8;
                let adjustedEndTime = endTime - 8;
                let textNode = document.createTextNode(droppedItem.find('.tech-name').text());
                let startPercentage = (adjustedStartTime / totalHours) * 100;
                let endPercentage = (adjustedEndTime / totalHours) * 100;
                let container = document.createElement('div');
                container.style.margin = '0 auto';
                container.style.backgroundColor = '#0C1B38';
                container.style.width = endPercentage - startPercentage + '%';

                container.style.height = '30px';
                container.style.borderRadius = '10px';
                container.style.boxShadow = '0px 4px 8px rgba(145, 144, 144, 0.2)';
                container.style.position = 'absolute';
                container.style.left = startPercentage + '%';
                container.style.top = '50%';
                container.style.transform = 'translateY(-50%)';
                container.style.color = 'white';
                container.style.textAlign = 'center';
                container.style.justifyContent = 'center';
                // container.style.display = 'flex';
                $(this).css('position', 'relative');
                $(this).empty();
                container.appendChild(textNode);
                $(this).append(container);
                // $(this).html(droppedItem.attr('id'));
                $(this).removeClass('hoverHighlight');
            }
        });
    };



    function mostraContainer() {
        var container = $('.containerr');
        var expandedContainer = $('<div class="expanded-container"></div>');

        expandedContainer.html(`
        <div class="botaoFecharContainer">
            <div class="botaoWrapper">
                <button type="button" onclick="minimizarContainer()" style="width: 10%; background-color: #6B1F34; border: 1px solid #9C273F;; cursor: pointer; color: #fff; height: 26px; border-radius: 10px;">Fechar</button>
            </div>
        </div>
        <div class="carousel" id="divContainer"></div>
    `);

        container.animate({
            height: "180px"
        }, 500, function() {
            container.replaceWith(expandedContainer);

            var divContainer = document.getElementById("divContainer");

            for (var i = 0; i < resultadoObj.length; i++) {
                var objeto = resultadoObj[i];

                var divOs = document.createElement("div");
                divOs.id = "os" + (i + 1);
                divOs.className = "divCarrossel";
                divOs.setAttribute("data-start-time", "13");
                divOs.setAttribute("data-end-time", "14");

                var innerHTML = `
                                    <div class="card-body">
                                        <div class="icon-section">
                                            <i class="fas fa-wrench"></i>
                                        </div>
                                        <div class="info-section">
                                            <p class="order-number">OS#${objeto.os_id}</p>
                                            <p class="tech-name">${objeto.os_cliente}</p>
                                            <p class="location">${objeto.os_solicitante}</p>
                                        </div>
                                    </div>
    `;

                divOs.innerHTML = innerHTML;
                divContainer.appendChild(divOs);
            }
        });

        setTimeout(teste, 1000);


    }

    function minimizarContainer() {
        var container = $('.expanded-container');
        var minimizedContainer = $('<div class="containerr"></div>');

        minimizedContainer.html(`
                        <button style="width: 10%;
         background-color: #6B1F34;
          border: 1px solid #9C273F;
           cursor: pointer;
           color: #fff;
             height: 26px;
              border-radius: 10px;" type="button" onclick="mostraContainer()">Exibir O.S</button>
    `);

        container.animate({
            height: "50px"
        }, 500, function() {
            container.replaceWith(minimizedContainer);
        });
    }
</script>