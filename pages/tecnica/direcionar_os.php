<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
    
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}
global $resultadoConsulta;
    $resultadoConsulta = minhaFuncao($queryService);

function minhaFuncao(QueryService $queryService)
{
    $tabela = "os";
    $colunas = ["os_status", "os_solicitante"];
    // $condicoes = "coluna = 'valor'";
    $resultado = $queryService->busca($tabela);


    $resultadoJson = json_encode($resultado);




    echo "<script>console.log($resultadoJson);</script>";

    return $resultadoJson;
}

// minhaFuncao($queryService);




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
        border-radius: 10px;
        overflow: hidden;
        margin-top: -15px;
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


<table id="funcionarios" class="rounded-table">
    <tr>
        <th style="width: 200px; height: 50px;" colspan="12">02/06/2023</th>
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
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 1</span>
        </td>
        <td colspan="24" class="linha">

        </td>
    </tr>
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 2</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 3</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>
    <tr>
        <td style="text-align: left;display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 4</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>

    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 5</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 6</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white; "><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 7</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #0C1B38; color: white;"><img src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px; display: flex; align-items: center;">Técnico 8</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>

</table>

<script>
    // Recupere a string JSON do PHP
    var resultadoJson = <?php echo $resultadoConsulta; ?>;
    console.log('ola', resultadoJson)

    // Converta a string JSON em um objeto JavaScript
    var resultadoObj = (resultadoJson);

    // Exiba os valores desejados do objeto JavaScript
    var h1Element = document.getElementById("resultado");
    h1Element.innerHTML = "Valor do os_id: " + resultadoObj;

    function teste() {
        $('.divCarrossel').draggable({
            revert: "invalid",
            cursor: "move",
            helper: function() {
                // var propriedade = $(this).html(droppedItem.attr('id'))
                // console.log('gustavo', propriedade)
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
                    '95px'); // retorna a altura para 70px quando o arrasto termina
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
                let textNode = document.createTextNode('Cliente');
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
                <div class="carousel">
                                        <div id="os1" class="divCarrossel" data-start-time="8" data-end-time="12">
                                            <div class="card-body">
                            <div class="icon-section">
                                <i class="fas fa-wrench"></i>
                            </div>
                            <div class="info-section">
                                <p class="order-number">OS#1234</p>
                                <p class="tech-name">João Silva</p>
                                <p class="location">Minas Shopping</p>
                            </div>
                        </div>
                        </div>
                    <div id="os3" class="divCarrossel" data-start-time="10" data-end-time="11">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>

                    <div id="os4" class="divCarrossel" data-start-time="13" data-end-time="14">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os1" class="divCarrossel" data-start-time="8" data-end-time="12">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os2" class="divCarrossel" data-start-time="15" data-end-time="17">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os3" class="divCarrossel" data-start-time="10" data-end-time="11">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os4" class="divCarrossel" data-start-time="13" data-end-time="14">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os1" class="divCarrossel" data-start-time="8" data-end-time="12">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os2" class="divCarrossel" data-start-time="15" data-end-time="17">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os3" class="divCarrossel" data-start-time="10" data-end-time="11">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os4" class="divCarrossel" data-start-time="13" data-end-time="14">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os1" class="divCarrossel" data-start-time="8" data-end-time="12">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os2" class="divCarrossel" data-start-time="15" data-end-time="17">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os3" class="divCarrossel" data-start-time="10" data-end-time="11">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os4" class="divCarrossel" data-start-time="13" data-end-time="14">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os1" class="divCarrossel" data-start-time="8" data-end-time="12">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os2" class="divCarrossel" data-start-time="15" data-end-time="17">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os3" class="divCarrossel" data-start-time="10" data-end-time="11">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                    <div id="os4" class="divCarrossel" data-start-time="13" data-end-time="14">
                        <div class="card-body">
            <div class="icon-section">
                <i class="fas fa-wrench"></i>
            </div>
            <div class="info-section">
                <p class="order-number">OS#1234</p>
                <p class="tech-name">João Silva</p>
                <p class="location">Minas Shopping</p>
            </div>
        </div>
                        </div>
                </div>
            `);

        container.animate({
            height: "180px"
        }, 500, function() {
            container.replaceWith(expandedContainer);
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