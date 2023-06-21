<?php
include "../../database/conexao.php";
include "../../infra/queryService.php";
$queryService = new queryService($conn);
global $resultadoConsultaTecnicos;
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
            max-height: 350px;
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
    </style>

</head>

<body>
    <br>
    <br>
    <div class="expanded-container">
        <div class="carousel" id="carousel">

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
            </div>


        </div>

    </div>

    <br>
    <div class="container mt-4 timeline-container">

        <div class="mb-4">

            <div class="mb-2" id="sked1"></div>

        </div>

    </div>

    <script type="text/javascript">
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

        var resultadoConsultaTecnicos = <?php echo $resultadoConsultaTecnicos; ?>;
        console.log('ola', resultadoConsultaTecnicos)


        var locations2 = resultadoConsultaTecnicos.map(function(dado, index) {
            return {
                id: index + 1,
                idTecnico: dado.user_id,
                name: dado.user_nome
            };
        });


        var events = [
            //   os ja direcionadas entrarão nestas variaveus com estes parametros
            // mudar o parametro location para tecnicos
            // criar a lógica de adicionar na próxima posição 
            {
                name: 'Meeting 2 (ovelapping)',
                location: '5',
                start: today(8, 30),
                end: today(16, 55),
                started: false,
                type: ''
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(8, 30),
                end: today(15, 40),
                started: true,
                type: ''
            },
            {
                name: 'Meeting 2 (ovelapping)',
                location: '4',
                start: today(15, 40),
                end: today(17, 40),
                started: true,
                type: 'deslocamento'
            }

        ];
        console.log('ola gustyav inicio', events)
        events.forEach(function(event) {
            if (compareCurrentTime(event.start) == 1 && event.started == false) {
                event.start = getCurrentTime()
                console.log('ola gustyav', events)
            }
            if (event.type === 'deslocamento') {
                event.element.addClass('deslocamento'); //isto não funciona, tem que pesquisar como adiciona classe
            }

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
            events: events.slice(),
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
                        duration: 60 * 90 * 1000,
                        started: false
                    });
                    selectedId = null;
                }
            } catch (e) {
                if (e.name !== 'SkedTape.CollisionError') throw e;
                alert('Already exists');
            }
        });
    </script>
</body>

</html>