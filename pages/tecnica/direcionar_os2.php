<?php
include "../../database/conexao.php";
include "../../infra/queryService.php";
$queryService = new queryService($conn);
global $resultadoConsultaTecnicos;
global $resultadoConsulta;
$resultadoConsultaTecnicos = buscarUsers($queryService);
$resultadoConsulta = minhaFuncao($queryService);
function buscarUsers(QueryService $queryService)
{
    $tabelaUsers = "users";
    $colunaUsers = null;
    $condicoesUsers = "user_tipo = 2";
    $joins = null;
    $resultado = $queryService->busca($tabelaUsers, $colunaUsers, $condicoesUsers, $joins);
    $resultadoJson = json_encode($resultado);
    // echo "<script>console.log($resultadoJson);</script>";
    return $resultadoJson;
}

function minhaFuncao(QueryService $queryService)
{
    $tabelaOS = "os";
    $colunaUsers = "";
    $condicoesUsers = null;
    $joins = array(
        "JOIN os_status ON os.os_status = os_status.os_status_id"
    );
    $resultado = $queryService->busca($tabelaOS, $colunaUsers, $condicoesUsers, $joins);


    $resultadoJson = json_encode($resultado);




    echo "<script>console.log('osss',$resultadoJson);</script>";

    return $resultadoJson;
}
?>
<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>jQuery.skedTape</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel=" stylesheet" href="jquery.skedTape.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
    <script src="jquery.skedTape.js"></script>
    <link rel=" stylesheet" href="jquery.skedTape copy.css">



    <style>
        .expanded-container {
            width: 100%;
            margin: 0 auto;
            background-color: #0C1B38;
            height: 140px;
            border-radius: 10px;
            overflow-x: auto;
            white-space: nowrap;
        }

        .divCarrossel {
            display: inline-block;
            width: 160px;
            height: 95px;
            border-radius: 12px;
            background-color: #0C1B38;
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


        .highlight-card {
            filter: brightness(200%);
            /* Aumenta o brilho em 20% */
            animation: pulse 1s ease-in-out infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                /* Escala inicial */
            }

            50% {
                transform: scale(1.05);
                /* Escala aumentada */
            }

            100% {
                transform: scale(1);
                /* Volta para a escala inicial */
            }
        }

        .timeline-container {
            max-height: 500px;
            overflow-y: auto;
        }

        .icone {
            width: 30px;
            height: 30px;
            object-fit: cover;
            border-radius: 50%;
        }

        .deslocamento {

            background-color: #0446c2;
            transition: 200ms background-color;
            top: 1px;
            bottom: 0;
            display: block;
            position: absolute;
            z-index: 3;
            white-space: nowrap;
            overflow: hidden;
            font-size: 12px;
            color: white;
            border: 1px solid #0446c2;
            min-width: 10px;
            cursor: default;
            line-height: 16px;

        }

        .deslocamento-event {
            background-color: blue;
            /* height: 30px; */
        }

        .deslocamento-event:hover {
            background-color: black;
        }

        .atendimento {
            background-color: yellow;
        }

        .servico {
            background-color: #FF1493;
        }

        .aguardandoAtendimento {
            background-color: blue;
        }
    </style>

</head>

<body>
    <br>
    <br>
    <div class="expanded-container">
        <div class="carousel" id="carousel">

            <!-- <div id="os3" class="divCarrossel" data-start-time="10" data-end-time="11">
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
            <div id="os4" class="divCarrossel " data-start-time="13" data-end-time="14">
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
            </div> -->


        </div>

    </div>

    <br>
    <div class="teste">

        <div class="container mt-4 timeline-container">

            <div class="mb-4">

                <div class="mb-2" id="sked1"></div>

            </div>

        </div>
    </div>

    <script>
        let resultadoConsulta = <?php echo $resultadoConsulta; ?>;

         let osDirecionar = processOrders(resultadoConsulta, 1)

        var carouselContainer = document.getElementById("carousel");

        for (var i = 0; i < osDirecionar.length; i++) {
            var objeto = osDirecionar[i];

            var divOs = document.createElement("div");
            divOs.id = "os" + (i + 3); // Começando com "os3" para evitar conflitos com os IDs existentes
            divOs.className = "divCarrossel";
          

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
            carouselContainer.appendChild(divOs);
        }
        var el = document.getElementById('carousel');
        var selectedId = null;
        // var skedTapeEvents = [];
        // var now = new Date();
        // now.setSeconds(0, 0);
        // // Adicionando listener de eventos aos elementos do carrossel.
        el.addEventListener('click', function(event) {
            // Suponho que o ID do elemento está armazenado no atributo data-id.
            event.target.classList.add('highlight-card');
            selectedId = Math.floor(Math.random() * 400) + 1;
        });

        var resultadoConsultaTecnicos = <?php echo $resultadoConsultaTecnicos ?>;

        var locations2 = resultadoConsultaTecnicos.map(function(dado, index) {
            return {
                id: index + 1,
                idTecnico: dado.user_id,
                name: dado.user_nome
            };
        });

        console.log('tecnicos', locations2)


        console.log('opaió', resultadoConsulta)
        let teste = processOrders(resultadoConsulta, 2)

        console.log('yuri', teste)

        var events = [
            //   os ja direcionadas entrarão nestas variaveus com estes parametros
            // mudar o parametro location para tecnicos
            // criar a lógica de adicionar na próxima posição 
            {
                name: 'Meeting 2 (ovelapping)',
                location: '5',
                start: today(8, 30),
                end: today(16, 55),
                // className: 'deslocamento-event',
                started: false,
                type: ''
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(8, 0),
                end: today(10, 0),
                started: true,
                type: ''
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(10, 01),
                end: today(12, 0),
                started: true,
                type: 'deslocamento'
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(12, 01),
                end: today(13, 0),
                started: true,
                type: 'deslocamento',
                className: 'deslocamento-event'
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(13, 01),
                end: today(15, 0),
                started: true,
                type: 'deslocamento',
                className: 'atendimento-event'
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(13, 01),
                end: today(15, 0),
                started: true,
                type: 'deslocamento',
                className: 'atendimento-event'
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(15, 01),
                end: today(18, 0),
                started: true,
                type: '',
                className: 'servico'
            }


        ];

        events.forEach(function(event) {
            if (compareCurrentTime(event.start) == 1 && event.started == false) {
                event.start = getCurrentTime()

            }
            // if (event.type === 'deslocamento') {
            //     event.element.addClass('deslocamento'); //isto não funciona, tem que pesquisar como adiciona classe
            // }

        });

        teste.forEach(function(event) {
            if (compareCurrentTime(event.start) == 1 && event.started == false) {
                event.start = getCurrentTime()

            }
            // if (event.type === 'deslocamento') {
            //     event.element.addClass('deslocamento'); //isto não funciona, tem que pesquisar como adiciona classe
            // }

        });

        function getCurrentTime() {
            var currentDate = new Date();
            return currentDate;
        }

        function today(hours, minutes) {
            var date = new Date();
            date.setHours(hours, minutes, 0, 0);
            return date;
        }

        function yesterday(hours, minutes) {
            var date = today(hours, minutes);
            date.setTime(date.getTime() - 24 * 60 * 60 * 1000);
            return date;
        }

        function tomorrow(hours, minutes) {
            var date = today(hours, minutes);
            date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
            return date;
        }

        function compareCurrentTime(timeString) {
            var currentTime = new Date();
            var comparisonTime = new Date(timeString);
            if (currentTime > comparisonTime) {
                return 1;
            } else if (currentTime < comparisonTime) {
                return -1;
            } else {
                return 0;
            }
        }

        var $sked1 = $('#sked1').skedTape({
            caption: 'Técnicos',
            start: today(8, 0),
            end: today(24, 0),
            showEventTime: true,
            showEventDuration: true,
            scrollWithYWheel: true,
            locations: locations2.slice(),
            events: teste.slice(),
            maxTimeGapHi: 60 * 1000, // 1 minute
            minGapTimeBetween: 1 * 60 * 1000,
            snapToMins: 1,
            editMode: true,
            timeIndicatorSerifs: true,
            showIntermission: true,
            formatters: {
                date: function(date) {
                    return $.fn.skedTape.format.date(date, 'l', '.');
                },
                duration: function(ms, opts) {
                    return $.fn.skedTape.format.duration(ms, {
                        hrs: 'ч.',
                        min: 'мин.'
                    });
                },
            },

            postRenderLocation: function($el, location, canAdd) {
                this.constructor.prototype.postRenderLocation($el, location, canAdd);
                $el.prepend('<img src="https://s3.amazonaws.com/attachments.fieldcontrol.com.br/accounts/6118/employees/9271b714-c5cb-4f75-bdd0-abc71276dfd0/518e.83c14040f.png?id=1bf9.cb7bee33a" alt="Imagem" class="icone"/>');
            }
        });
        $sked1.on('event:dragEnded.skedtape', function(e) {
            var event = e.detail.event;
            var startTime = event.start;
            var currentTime = new Date();
            if (startTime < currentTime) {
                event.start = currentTime;
                $sked1.skedTape('updateEvent', event);
            }
        });
        $sked1.on('event:click.skedtape', function(e) {
            $sked1.skedTape('removeEvent', e.detail.event.id);
        });
        $sked1.on('timeline:click.skedtape', function(e, api) {
            try {
                if (selectedId) {
                    var startTime = e.detail.time;
                    var currentTime = new Date();
                    if (startTime < currentTime) {
                        startTime = currentTime;
                    }
                    $sked1.skedTape('startAdding', {
                        name: 'New meeting' + selectedId,
                        id: selectedId,
                        start: startTime,
                        // active: true,
                        duration: 60 * 90 * 1000,
                        started: false,
                        className: 'deslocamento-event'
                    });
                    selectedId = null;
                }
            } catch (e) {
                if (e.name !== 'SkedTape.CollisionError') throw e;
                alert('Already exists');
            }
        });










        function processOrders(data, type) {
            if (type === 1) {
                // Retornar apenas as ordens de serviço com 'direcionado' igual a 'N'
                return data.filter(order => order.direcionado === 'N');
            } else if (type === 2) {
                // Filtrar as ordens de serviço com 'direcionado' igual a 'Y'
                const filteredData = data.filter(order => order.direcionado === 'Y');

                // Processar as ordens de serviço para adicionar chaves e valores
                const processedData = filteredData.map(order => {
                    let processedOrder = {
                        ...order
                    };

                    if (order.os_status_nome === 'Em atendimento') {
                        // Adicionar 'className' e 'started' para 'Em atendimento'
                        processedOrder.className = 'atendimento';
                        processedOrder.started = true;
                        processedOrder.name = processedOrder.os_consideracoes;
                        const technician = locations2.find(tech => tech.idTecnico === order.os_usuario);
                        processedOrder.location = technician.id;
                        processedOrder.start = processedOrder.os_hora_inicio,
                            processedOrder.end = today(15, 0),
                            processedOrder.started = true
                    } else if (order.os_status_nome === 'Direcionado') {
                        // Adicionar 'className' e 'started' para 'Direcionado'
                        processedOrder.className = 'aguardandoAtendimento';
                        processedOrder.started = false;
                        processedOrder.name = processedOrder.os_consideracoes;
                        const technician = locations2.find(tech => tech.idTecnico === order.os_usuario);
                        processedOrder.location = technician.id;
                        processedOrder.start = processedOrder.os_hora_inicio,
                            processedOrder.end = today(18, 0),
                            processedOrder.started = false

                    }

                    return processedOrder;
                });

                // Retornar apenas o item que teve os novos atributos adicionados
                const filteredProcessedData = processedData.filter(order => 'className' in order && 'started' in order);

                return filteredProcessedData;
            }
        }
    </script>
</body>

</html>