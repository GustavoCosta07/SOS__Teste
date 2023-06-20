<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
include "../../database/conexao.php";
include "../../infra/queryService.php";
$queryService = new queryService($conn);
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
    @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins';
    }

    .container {
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
        max-height: calc(11 * 50px);
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

    table th.hour {
        width: 50px;
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



<div class="container">
    <button style="width: 10%;
         background-color: #6B1F34;
          border: 1px solid #9C273F;
           cursor: pointer;
           color: #fff;
             height: 26px;
              border-radius: 10px;" type="button" onclick="mostraContainer()">Exibir O.S</button>
</div>
<br>

<!-- <div id="meuModal" title="Título do Modal">
    <p>Conteúdo do modal</p>
</div> -->


<div class="table-container">
    <table id="funcionarios" class="rounded-table table">
        <thead class="thead-fixado">
            <tr>
                <th style="width: 200px; height: 50px;" id="dataCelula" colspan="12"></th>
            </tr>
            <tr>
                <th style="width: 100px; height: 50px;">Técnicos</th>
                <th style="border: 1px solid #ddd;" class="hour">8</th>
                <th style="border: 1px solid #ddd;" class="hour">9</th>
                <th style="border: 1px solid #ddd;" class="hour">10</th>
                <th style="border: 1px solid #ddd;" class="hour">11</th>
                <th style="border: 1px solid #ddd;" class="hour">12</th>
                <th style="border: 1px solid #ddd;" class="hour">13</th>
                <th style="border: 1px solid #ddd;" class="hour">14</th>
                <th style="border: 1px solid #ddd;" class="hour">15</th>
                <th style="border: 1px solid #ddd;" class="hour">16</th>
                <th style="border: 1px solid #ddd;" class="hour">17</th>
                <th style="border: 1px solid #ddd;" class="hour">18</th>
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
        var mes = (dataAtual.getMonth() + 1).toString().padStart(2, '0'); // Adiciona um zero na frente se for um mês de 1 a 9
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
            imagem.src = "https://s3.amazonaws.com/attachments.fieldcontrol.com.br/accounts/6118/employees/9271b714-c5cb-4f75-bdd0-abc71276dfd0/518e.83c14040f.png?id=85ae.81f15e935";
            imagem.style.width = "30px";
            imagem.style.height = "30px";
            imagem.style.objectFit = "cover";
            imagem.style.borderRadius = "50%";

            // Criando o span com o nome do técnico
            var span = document.createElement("span");
            span.style.marginLeft = "10px";
            span.style.fontSize = "13px"
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

                var table = document.querySelector('table'); // Selecione a tabela
                var cells = table.querySelectorAll('th.hour');
                var cellWidth = cells[1].offsetWidth; // Obtenha a largura de uma célula

                var rect = this.getBoundingClientRect(); // Obtenha a posição do elemento receptor na página
                console.log('Elemento receptor:', rect.left, rect.top); // Exiba a posição do elemento receptor no console
                console.log('Cursor:', event.clientX, event.clientY); // Exiba a posição do cursor no console
                var x = event.clientX - rect.left; // Calcule a posição do mouse em relação ao elemento receptor
                var cellIndex = Math.floor(x / cellWidth); // Calcule o índice da célula em que o mouse foi solto
                var time = parseInt(cells[cellIndex].textContent); // Obtenha a hora correspondente à célula
                console.log(time); // Exiba a hora no console

                let textNode = document.createTextNode(droppedItem.find('.tech-name').text());
                let container = document.createElement('div');
                container.style.margin = '0 auto';
                container.style.backgroundColor = '#89CFF0';
                container.style.height = '30px';
                // container.style.borderRadius = '10px';
                container.style.boxShadow = '0px 4px 8px rgba(145, 144, 144, 0.2)';
                container.style.position = 'absolute';
                container.style.top = '50%';
                container.style.transform = 'translateY(-50%)';
                container.style.color = 'white';
                container.style.textAlign = 'center';
                container.style.justifyContent = 'center';

                // Gere um número aleatório entre 1 e 4
                var numHoras = Math.floor(Math.random() * 4) + 1;

                // Defina a largura do elemento arrastado com base no número de horas gerado aleatoriamente
                container.style.width = (cellWidth * numHoras) + 'px';

                // Verifique se já existe um elemento na célula
                var existingElement = this.querySelector('div');

                if (existingElement) {
                    console.log('opa')
     
                }


                container.style.left = (cellIndex * cellWidth) + 'px'; // Defina a posição do elemento arrastado como a posição da célula
                $(this).css('position', 'relative');

                container.appendChild(textNode);
                $(this).append(container);
                $(this).removeClass('hoverHighlight');
            }
        });
    };

    // $('.linha').droppable({
    //         accept: ".divCarrossel",
    //         over: function(event, ui) {
    //             $(this).addClass('hoverHighlight');
    //         },
    //         out: function(event, ui) {
    //             $(this).removeClass('hoverHighlight');
    //         },
    //         drop: function(event, ui) {
    //             let droppedItem = ui.draggable;

    //             var table = document.querySelector('table'); // Selecione a tabela
    //             var cells = table.querySelectorAll('th.hour');
    //             var cellWidth = cells[1].offsetWidth; // Obtenha a largura de uma célula

    //             var rect = this.getBoundingClientRect(); // Obtenha a posição do elemento receptor na página
    //             var x = event.clientX - rect.left; // Calcule a posição do mouse em relação ao elemento receptor
    //             var cellIndex = Math.floor(x / cellWidth); // Calcule o índice da célula em que o mouse foi solto
    //             var time = parseInt(cells[cellIndex].textContent); // Obtenha a hora correspondente à célula
    //             console.log(time); // Exiba a hora no console

    //             let textNode = document.createTextNode(droppedItem.find('.tech-name').text());
    //             let container = document.createElement('div');
    //             container.style.margin = '0 auto';
    //             container.style.backgroundColor = '#0C1B38';
    //             container.style.height = '30px';
    //             container.style.borderRadius = '10px';
    //             container.style.boxShadow = '0px 4px 8px rgba(145, 144, 144, 0.2)';
    //             container.style.position = 'absolute';
    //             container.style.top = '50%';
    //             container.style.transform = 'translateY(-50%)';
    //             container.style.color = 'white';
    //             container.style.textAlign = 'center';
    //             container.style.justifyContent = 'center';
    //             $(this).css('position', 'relative');
    //             $(this).empty();
    //             container.appendChild(textNode);
    //             $(this).append(container);
    //             $(this).removeClass('hoverHighlight');
    //         }
    //     });



    function mostraContainer() {
        var container = $('.container');
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
        var minimizedContainer = $('<div class="container"></div>');

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