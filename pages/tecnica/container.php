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

    body {
        background-color: #e2e2e2;
    }

    .container {
        width: 65%;
        margin: 0 auto;
        background-color: #c2ceff;
        height: 50px;
        border-radius: 10px;
        overflow-x: auto;
        white-space: nowrap;
        justify-content: center;
        place-items: center;
        display: flex;
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
        height: 95px;
        border-radius: 12px;
        background-color: #8AAAE6;
        border: 1px solid #0446c2;
        margin: 10px 15px -76px;
        cursor: move;
        font-size: 0.8em;
        color: white;
        padding: 5px;
        z-index: 1000 !important;
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
        width: 65%;
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
        border-bottom: 1px solid #ccc;
    }

    .rounded-table th:first-child {
        border-left: 1px solid #ccc;
    }

    .rounded-table th:last-child {
        border-right: 1px solid #ccc;
    }

    th {
        background-color: #c2ceff;
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
        width: 65%;
        margin: 0 auto;
        background-color: #c2ceff;
        height: 180px;
        border-radius: 10px;
        overflow-x: auto;
        white-space: nowrap;
    }

    .minimization-container {
        width: 65%;
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
<div class="container">
    <button style="width: 10%;
     background-color: rgba(47, 79, 206, 0.5);
      border: 1px solid rgba(47, 79, 206, 1.0);
       cursor: pointer;
       color: rgb(8, 46, 196);
         height: 26px;
          border-radius: 10px;" type="button" onclick="mostraContainer()">Exibir O.S</button>
</div>
<br>

<table id="funcionarios" class="rounded-table">
    <tr>
        <th style="width: 200px; height: 70px;" colspan="12">02/06/2023</th>
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
        <td style="text-align: left; display: flex; align-items: center; background-color: #C2CEFF;"><img
                src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 1</span>
        </td>
        <td colspan="24" class="linha">

        </td>
    </tr>
    <tr>
        <td style="text-align: left; display: flex; align-items: center; background-color: #C2CEFF;"><img
                src="https://images.unsplash.com/photo-1595152452543-e5fc28ebc2b8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                alt="" style="width: 30px; height: 30px; object-fit: cover; border-radius: 50%;">
            <span style="margin-left: 10px;display: flex; align-items: center;">Técnico 2</span>
        </td>
        <td colspan="24" class="linha"></td>
    </tr>


</table>

<script>
    function teste() {

        $('.divCarrossel').draggable({
            revert: "invalid",
            cursor: "move",
            helper: function () {

                return $(this).clone().css({
                    'z-index': 1000,
                    'height': '20px' // diminui a altura ao arrastar
                }).html('');
            },
            start: function (event, ui) {
                $(this).fadeTo('fast', 0.5);
            },
            stop: function (event, ui) {
                $(this).fadeTo(0, 1);
                $(this).css('height',
                    '95px'); // retorna a altura para 70px quando o arrasto termina
            }
        });

        $('.linha').droppable({
            accept: ".divCarrossel",
            over: function (event, ui) {
                $(this).addClass('hoverHighlight');
            },
            out: function (event, ui) {
                $(this).removeClass('hoverHighlight');
            },
            drop: function (event, ui) {
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
                container.style.backgroundColor = '#8AAAE6';
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
        var container = $('.container');
        var expandedContainer = $('<div class="expanded-container"></div>');

        expandedContainer.html(`
  
        <div class="botaoFecharContainer">
<div class="botaoWrapper">
    <button type="button" onclick="minimizarContainer()"
        style="width: 10%; background-color: #2f4fce; border: #8AAAE6; cursor: pointer; color: white; height: 26px; border-radius: 10px;">Fechar</button>
</div>
</div>
<div class="carousel">

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
        }, 500, function () {
            container.replaceWith(expandedContainer);
        });

        setTimeout(teste, 1000);


    }

    function minimizarContainer() {
        var container = $('.expanded-container');
        var minimizedContainer = $('<div class="container"></div>');

        minimizedContainer.html(`
        <button style="width: 10%;
     background-color: rgba(47, 79, 206, 0.5);
      border: 1px solid rgba(47, 79, 206, 1.0);
       cursor: pointer;
       color: rgb(8, 46, 196);
         height: 26px;
          border-radius: 10px;" type="button" onclick="mostraContainer()">Exibir O.S</button>
`);

        container.animate({
            height: "50px"
        }, 500, function () {
            container.replaceWith(minimizedContainer);
        });
    }
</script>