<?php
include "../../database/conexao.php";
include "../../infra/queryService.php";
$queryService = new queryService($conn);
global $resultadoConsultaTecnicos;
global $resultadoConsulta;
$resultadoConsultaTecnicos = buscarUsers($queryService);
$resultadoConsulta = minhaFuncao($conn);
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

function minhaFuncao($conn)
{
    $query1 = "SELECT os.*, clientes.cliente_fantasia, os_tipos.os_tipo_nome, os_status.os_status_nome
FROM os
JOIN clientes ON os.os_cliente = clientes.cliente_id
JOIN os_status ON os.os_status = os_status.os_status_id
JOIN os_tipos ON os.os_tipo = os_tipos.os_tipo_id";
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    // Armazenar os resultados da primeira consulta em um array
    $data1 = array();
    while ($row = mysqli_fetch_assoc($result1)) {
        $data1[] = $row;
    }

    // Executar a segunda consulta
    $query2 = "SELECT os_eventos.*, id_tecnico AS os_usuario, os_status.os_status_nome AS status, os_tipo_eventos.nome_evento
    FROM os_eventos
    JOIN os_status ON os_eventos.status = os_status.os_status_id
    JOIN os_tipo_eventos ON os_eventos.tipo = os_tipo_eventos.id_evento
    ";
    $result2 = mysqli_query($conn, $query2);
    if (!$result2) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    // Armazenar os resultados da segunda consulta em um array e adicionar a propriedade "evento" com valor true
    $data2 = array();
    while ($row = mysqli_fetch_assoc($result2)) {
        $row['evento'] = true;
        $data2[] = $row;
    }

    // Mesclar os dois arrays de resultados em um único array
    $data = array_merge($data1, $data2);

    // Codificar o array em JSON
    $resultadoJson = json_encode($data);
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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
    <link rel=" stylesheet" href="jquery.skedTape.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">
    <link rel=" stylesheet" href="jquery.skedTape copy.css">
    <!-- <script src="skedtape.js"></script> -->
    <!-- <script src="skeedtapee.js"></script> -->
    <script src="skedtaapee.js"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        .expanded-container {
            width: 100%;
            margin: 0 auto;
            background-color: #0C1B38;
            height: 140px;
            border-radius: 10px;
            overflow-x: auto;
            white-space: nowrap;

            display: flex;
            justify-content: left;
            align-items: center;
        }

        .divCarrossel {
            display: inline-block;
            width: 160px;
            height: 95px;
            border-radius: 12px;
            background-color: #0C1B38;
            border: 1px solid #0446c2;
            margin: 10px 15px;
            cursor: pointer;
            font-size: 0.8em;
            color: white;
            /* padding: 5px; */
            /* z-index: 1000 !important; */
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

        .deslocamento {
            background-color: #CFD8DC;
            border: #CFD8DC;
            pointer-events: none;
            /* height: 30px; */
        }

        .deslocamento-event:hover {
            background-color: black;
        }

        .atendimento {
            background-color: #E4771F;
            pointer-events: none;
            border: #E4771F;
            /* height: 30px; */
        }

        .direcionado {
            background-color: #105BFB;
            border: #105BFB;

        }

        .concluido {
            background-color: #24B787;
            border: #24B787;
            /* pointer-events: none; */
            
        }

        .descanso {
            background-color: yellowgreen;
            border: yellowgreen;
            pointer-events: none;
        }

        .servico {
            background-color: #FF1493;
        }

        .aguardandoAtendimento {
            background-color: blue;
        }

        .icone {
            width: 30px;
            height: 30px;
            object-fit: cover;
            border-radius: 50%;

            /* margin: auto; */
        }

        .sked-tape__location {
            position: relative;
            padding: 0 15px;
            background-color: #0C1B38;
            color: #fff;
            line-height: 54px;
            height: 54px;

            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
        }

        .sked-tape__caption {
            display: block;
            background-color: #0C1B38;
            height: 24px;
            color: #fff;
            position: relative;
            top: 0;
            text-align: center;
            border-radius: 10px 0 0 0;
        }

        .sked-tape__indicator {
            position: absolute;
            z-index: 4;
            top: 0;
            bottom: 0;
            border-left: 1px solid #0C1B38;
        }

        .sked-tape__indicator--serifs::before {
            top: 0;
            border-bottom-width: 3px;
            border-top: 3px solid #0C1B38;
        }

        .sked-tape__indicator--serifs::after {
            bottom: 0;
            border-top-width: 3px;
            border-bottom: 3px solid #0C1B38;
        }

        .sked-tape__indicator--serifs::before,
        .sked-tape__indicator--serifs::after {
            content: '';
            display: block;
            position: absolute;
            left: -4px;
            width: 0;
            height: 0;
            border: 3px solid transparent;
        }

        .sked-tape__grid>li {
            display: block;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px), linear-gradient(to right, #fff 1px, #fff 1px);
            background-size: 1px 100%, 1px 100%, 1px 100%, 1px 100%, 1px 100%;
            background-repeat: no-repeat;
            background-position: 0 0, 100% 0, 25% 0, 50% 0, 75% 0;
            min-width: 96px;
            width: 96px;
        }

        /* .sked-tape__date:nth-child(odd) {
            background: #751b1b;
        } */
    </style>

</head>

<body>
    <div class="expanded-container">
        <div class="carousel" id="carousel"></div>
    </div>

    <br>
    <div class="teste">

        <div class="container mt-4 timeline-container">

            <div class="mb-4">

                <div class="mb-2" id="sked1"></div>

            </div>

        </div>
    </div>
    <button type="button" class="btn btn-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" title="" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-bs-original-title="Top Popover">
            Popover on top
        </button>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.concluido, .deslocamento');

elements.forEach(function(element) {
  const input = element.querySelector('input');
  if (input) {
    const value = input.value;
    console.log('value', value);
  }

  const balloon = document.createElement('div');
  balloon.style.display = 'none';
  balloon.style.position = 'absolute';
  balloon.style.zIndex = '9999';
  balloon.style.width = '300px';
  balloon.style.height = '200px';
  balloon.style.backgroundColor = 'lightblue';
  balloon.style.border = '2px dashed darkblue';
  balloon.style.padding = '15px';
  balloon.style.borderRadius = '10px';
  element.appendChild(balloon);

  const title = document.createElement('h2');
  title.textContent = 'Balloon title';
  title.style.color = 'darkblue';
  title.style.textAlign = 'center';
  balloon.appendChild(title);

  const content = document.createElement('p');
  content.textContent = 'Balloon content';
  content.style.color = 'black';
  content.style.fontFamily = 'Arial';
  content.style.fontSize = '18px';
  balloon.appendChild(content);

  element.addEventListener('mouseover', () => {
    balloon.style.display = 'block';
  });

  element.addEventListener('mouseout', () => {
    balloon.style.display = 'none';
  });

  element.addEventListener('click', function(event) {
    event.stopPropagation();
  });
});




        });





        let resultadoConsulta = <?php echo $resultadoConsulta; ?>;
        let OsPorTecnico = []
        let osDirecionar = processOrders(resultadoConsulta, 1)

        var carouselContainer = document.getElementById("carousel");

        for (var i = 0; i < osDirecionar.length; i++) {
            var objeto = osDirecionar[i];

            var divOs = document.createElement("div");
            divOs.id = "os" + (i + 3); // Começando com "os3" para evitar conflitos com os IDs existentes
            divOs.className = "divCarrossel";


            var innerHTML = `
                    <div class="card-body" id="${objeto.os_id}">
                    <div class="icon-section">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <div class="info-section">
                        <p class="order-number" style="font-size: 8px;">${objeto.cliente_fantasia}</p>
                        <p class="tech-name" style="font-size: 12px;">${objeto.os_tipo_nome}</p>
                        <p class="location">${converterDataHora(objeto.os_data_abertura)}</p>
                    </div>
                    </div>
                `;

            divOs.innerHTML = innerHTML;
            carouselContainer.appendChild(divOs);
        }

        var el = document.getElementById('carousel');
        var selectedId = null;

        el.addEventListener('click', function(event) {
            var card = event.target.closest('.card-body');
            if (card) {
                var previousCard = el.querySelector('.highlight-card');
                if (previousCard) {
                    previousCard.classList.remove('highlight-card');
                }
                card.classList.add('highlight-card');
                selectedId = card.id;
            }
        });

        var resultadoConsultaTecnicos = <?php echo $resultadoConsultaTecnicos ?>;

        var locations2 = resultadoConsultaTecnicos.map(function(dado, index) {
            return {
                id: index + 1,
                idTecnico: dado.user_id,
                name: dado.user_nome
            };
        });

        let teste2 = processOrders(resultadoConsulta, 2)

        teste2.forEach(function(event) {
            if (compareCurrentTime(event.start) == 1 && event.started == false) {
                event.start = getCurrentTime()

            }

        });

        function getCurrentTime() {
            var currentDate = new Date();
            return currentDate;
        }

        function addMinutesToTime(initialTime, minutesToAdd, status, ordem) {
            var updatedTime = new Date(initialTime);
            updatedTime.setMinutes(updatedTime.getMinutes() + minutesToAdd);

            if (compareCurrentTime(initialTime) == 1 && status === 'Direcionado') {
                var updatedTime = new Date()
                updatedTime.setMinutes(updatedTime.getMinutes() + minutesToAdd);

            }

            if (status === 'Direcionado') {
                var updatedTime = new Date()
                let minutes = minutesToAdd + 1
                updatedTime.setMinutes(updatedTime.getMinutes() + minutes);

            }

            if (status === 'Em atendimento' && ordem.os_finalized == 'N') {
                //    implementar logica de uma segunda os que ja acabou   
                updatedTime = getCurrentTime()

            }

            if (status === 'Em atendimento' && ordem.os_finalized == 'Y') {
                //    implementar logica de uma segunda os que ja acabou  (temporario, colocar o status correto de finalizado) 
                updatedTime = ordem.os_hora_final

            }
            return updatedTime
        }

        function converterDataHora(dataHoraString) {
            // Extrair as partes da data e hora
            var partes = dataHoraString.split(" ");
            var dataPartes = partes[0].split("-");
            var horaPartes = partes[1].split(":");

            // Criar uma instância de Date com as partes extraídas
            var dataHora = new Date(
                parseInt(dataPartes[0]),
                parseInt(dataPartes[1]) - 1,
                parseInt(dataPartes[2]),
                parseInt(horaPartes[0]),
                parseInt(horaPartes[1]),
                parseInt(horaPartes[2])
            );

            // Formatar a data e hora como string no formato desejado
            var dataFormatada = ("0" + dataHora.getDate()).slice(-2);
            var mesFormatado = ("0" + (dataHora.getMonth() + 1)).slice(-2);
            var anoFormatado = dataHora.getFullYear();
            var horaFormatada = ("0" + dataHora.getHours()).slice(-2);
            var minutosFormatados = ("0" + dataHora.getMinutes()).slice(-2);
            var segundosFormatados = ("0" + dataHora.getSeconds()).slice(-2);

            var dataHoraFormatada = dataFormatada + "/" + mesFormatado + "/" + anoFormatado + " " +
                horaFormatada + ":" + minutosFormatados + ":" + segundosFormatados;

            return dataHoraFormatada;
        }

        function verifyOrdemAnterior(ordemAtual, ordemAnterior, type) {
            //O type vai representar qual verificação foi feita, exemplo: 
            // - esta atrasado e não iniciou? type = 1
            // - esta atrasado mas ja começou? type = 2
            //talvez uma abordagem boa seria verificar o type como algo que começou ou não

            if (type == 1) {

                if (ordemAnterior.os_finalized == 'N' && compareBeforeAfter(ordemAnterior.end, ordemAtual.os_hora_inicial_esperada) == 0) {
                    //Esta condição significa que a ordem anterior a que esta sendo verificada no momento 
                    //ainda não foi finalizada pelo técnico e que seu atributo end esta setado como o horario atual
                    //se a segunda condição for atendida significa que o end da anterior é menor do que a hora de 
                    //inicio esperada da ordem atual, logo seu start pode ser setado como sua hora de inicio de origem 
                    return ordemAtual.os_hora_inicial_esperada
                }

                if (ordemAnterior.status == 'Em atendimento' && compareBeforeAfter(ordemAnterior.end, ordemAtual.os_hora_inicial_esperada) == 0) {
                    //esta condição significa que a ordem anterior é um evento de descanso, deslocamento e etc... 
                    //este evento ainda não terminou e seu atributo end esta setado como o horario atual
                    //se a segunda condição for atendida significa que o end do evento é menor do que a hora de 
                    //inicio esperada da ordem atual, logo seu start pode ser setado como sua hora de inicio de origem 
                    //(eu só sei que é um evento pois as ordens não contém a propriedade status)
                    return ordemAtual.os_hora_inicial_esperada
                }

                if (ordemAnterior.os_status_nome == 'Concluido' && compareBeforeAfter(ordemAnterior.end, ordemAtual.os_hora_inicial_esperada) == 1) {
                    //esta condição significa que a ordem anterior ja finalizou, mas finalizou roubando tempo da hora atual 
                    //o motivo até então é desconhecido, ela pode ter começado atrasada por conta de uma outra ordem ou pode
                    //simplesmente ter atrasado mesmo seu horário de término
                    //neste caso simplesmente retorne para o start da ordem atual a hora end da ordem anterior
                    //para dar a sensação de empurramento
                    return addMinutesToTimeMaisUm(ordemAnterior.end)
                }

                if (ordemAnterior.status == 'Concluido' && compareBeforeAfter(ordemAnterior.end, ordemAtual.os_hora_inicial_esperada) == 0) {
                    //esta condição significa que um evento já finalizou, e seu horario de fim não impactou 
                    //no horario de inicio na ordem atual

                    return ordemAtual.os_hora_inicial_esperada

                }

                if (ordemAnterior.status == 'Concluido' && compareBeforeAfter(ordemAnterior.end, ordemAtual.os_hora_inicial_esperada) == 1) {
                    //esta condição significa que um evento já finalizou, e seu horario de fim impactou 
                    //no horario de inicio na ordem atual (mas impactou como? ela ja começou ou não? )
                    //acredito que automaticamente se algo começou, o retorno sempre será o end, sendo assim, o type é 2

                    return getCurrentTime()
                }
            }
        }

        function gerarHoraInicio(OsPorTecnicoFunction) {
            const teste = OsPorTecnicoFunction

            OsPorTecnicoFunction.forEach(tecnico => {
                const ordensDoTecnico = tecnico.ordens;
                let OrdemAtualOuAnterior = true

                // Ordenar as ordens pelo horário de início imutável (horaInicialEsperada)
                ordensDoTecnico.sort((a, b) => Date.parse(a.os_hora_inicial_esperada || a.evento_inicio) - Date.parse(b.os_hora_inicial_esperada || b.evento_inicio));

                for (let i = 0; i < ordensDoTecnico.length; i++) {
                    // debugger 
                    const ordem = ordensDoTecnico[i];
                    const ordemAnterior = i > 0 ? ordensDoTecnico[i - 1] : ordensDoTecnico[i];

                    if (ordem.os_id != ordemAnterior.os_id || ordem.os_id == undefined) { //se for diferente é hora de mexer na ordem atual, se for igual não precisa pois significa que é a primeira
                        //continuar logica dos eventos de almoço e deslocamento a partir daqui

                        if (ordem.evento_inicio && ordem.status == "Em atendimento") {
                            //acredito que não precisa preocupar com a anterior pois seria impossivel ter esta propriedade
                            //se o tecnico tiver uma ordem aberta 
                            ordem.start = ordem.evento_inicio
                            ordem.end = getCurrentTime()

                        }

                        if (ordem.evento_inicio && ordem.status == "Concluido") {
                            //acredito que não precisa preocupar com a anterior pois seria impossivel ter esta propriedade
                            //se o tecnico tiver uma ordem aberta 
                            ordem.start = ordem.evento_inicio
                            ordem.end = ordem.evento_fim


                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_status_nome == "Direcionado") {
                            //isto significa que a hora atual ja passou da hora inicial esperada e que a os ainda não iniciou
                            //sendo assim ela esta atrasada e deve ir sendo arrastada 
                            ordem.start = getCurrentTime();
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final))
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_status_nome == "Em atendimento") {
                            //isto significa que a hora atual ja passou da hora inicial esperada mas ja esta em atendimento
                            //então ela começou com atraso, neste caso ela obrigatoriamente deve conter hora de inicio

                            ordem.start = ordem.os_hora_inicio;
                            ordem.end = getCurrentTime()
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 0 && ordem.os_status_nome == "Direcionado") {
                            //isto significa que a hora atual ja passou da hora inicial esperada mas ja esta em atendimento
                            //então ela começou com atraso, neste caso ela obrigatoriamente deve conter hora de inicio

                            ordem.start = ordem.os_hora_inicial_esperada
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final))
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_status_nome == "Concluido") {
                            //isto significa que a hora atual ja passou da hora inicial esperada 
                            //mas pode 
                            ordem.start = ordem.os_hora_inicio
                            ordem.end = ordem.os_hora_final
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_started == false) {
                            //isto significa que a hora atual ja passou da hora inicial esperada 
                            //mas pode 
                            ordem.start = i > 0 ? verifyOrdemAnterior(ordem, ordemAnterior, 1) : getCurrentTime();
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final))
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_started == true) {
                            //isto só significa que a os esta atrasada e o tecnico não iniciou a ordem
                            ordem.start = i > 0 ? verifyOrdemAnterior(ordem, ordemAnterior, 1) : getCurrentTime();
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final), ordem.os_status_nome, ordem)
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 0 && ordem.os_started == false) {
                            //isto só significa que a os esta atrasada e o tecnico não iniciou a ordem
                            ordem.start = i > 0 ? verifyOrdemAnterior(ordem, ordemAnterior, 1) : getCurrentTime();
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final))
                        }

                    }
                    // as verificações vão ser quase sempre as mesma, depois da para atribuir isto a um serviço dinamico
                    if (OrdemAtualOuAnterior) {

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_status_nome == "Concluido") {
                            //isto significa que a hora atual ja passou da hora inicial esperada 
                            //mas pode 
                            ordem.start = ordem.os_hora_inicio
                            ordem.end = ordem.os_hora_final
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 1 && ordem.os_status_nome == "Direcionado") {
                            //isto significa que a hora atual ja passou da hora inicial esperada 
                            //mas pode 
                            ordem.start = getCurrentTime()
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final))
                        }

                        if (compareCurrentTime(ordem.os_hora_inicial_esperada) == 0 && ordem.os_status_nome == "Direcionado") {
                            //isto significa que a hora atual ja passou da hora inicial esperada 
                            //mas pode 
                            ordem.start = ordem.os_hora_inicial_esperada
                            ordem.end = addMinutesToTime(ordem.start, parseInt(ordem.os_previsao_hora_final))
                        }

                        if (compareCurrentTime(ordemAnterior.os_hora_inicial_esperada) == 1 && ordemAnterior.os_started == false) {
                            ordemAnterior.start = getCurrentTime()
                            ordemAnterior.end = addMinutesToTime(ordemAnterior.start, parseInt(ordemAnterior.os_previsao_hora_final))
                        }

                        if (compareCurrentTime(ordemAnterior.os_hora_inicial_esperada) == 1 && ordemAnterior.os_started == true) {
                            ordemAnterior.start = ordemAnterior.os_hora_inicio
                            ordemAnterior.end = verifyFinalHour(addMinutesToTime(ordemAnterior.os_hora_inicio,
                                    parseInt(ordemAnterior.os_previsao_hora_final)), ordemAnterior) ? getCurrentTime() :
                                addMinutesToTime(ordemAnterior.os_hora_inicio, parseInt(ordemAnterior.os_previsao_hora_final));

                            // o end é 60 minutos se ela ainda n tiver sifo finalizada e o horario atual seja maior que 
                            // o horario de termino, se ela não tiver sido finalizada e o end esperado ja for menor que a 
                            // hora atual significa que esta em atraso para terminarm, sendo assim setar o end com a hora atual 
                        }

                        if (compareCurrentTime(ordemAnterior.os_hora_inicial_esperada) == 1 && ordemAnterior.os_started == true && ordemAnterior.os_finalized == 'Y') {
                            ordemAnterior.start = ordemAnterior.os_hora_inicio
                            ordemAnterior.end = ordemAnterior.os_hora_final
                            // o end é 60 minutos se ela ainda n tiver sifo finalizada e o horario atual seja maior que 
                            // o horario de termino, se ela não tiver sido finalizada e o end esperado ja for menor que a 
                            // hora atual significa que esta em atraso para terminarm, sendo assim setar o end com a hora atual 
                        }

                        if (ordemAnterior.os_started == true && compareCurrentTime(ordemAnterior.end) == 1 && ordemAnterior.finalized == false) {
                            ordemAnterior.end = addMinutesToTime(ordemAnterior.os_hora_inicio, parseInt(ordemAnterior.os_previsao_hora_final))
                        }

                        if (ordemAnterior.os_started == false && compareCurrentTime(ordemAnterior.os_hora_inicial_esperada) == 0) {
                            //não começou 
                            //não esta em atraso 
                            ordemAnterior.start = ordemAnterior.os_hora_inicial_esperada
                            ordemAnterior.end = addMinutesToTime(ordemAnterior.os_hora_inicial_esperada, parseInt(ordemAnterior.os_previsao_hora_final))
                        }
                        OrdemAtualOuAnterior = false
                    }

                }
            });
            console.log(OsPorTecnicoFunction)
            const listaSimples = Object.values(OsPorTecnicoFunction).flatMap(item => item.ordens);

            return listaSimples
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
                return 0;
            } else {
                return 2;
            }
        }

        function compareBeforeAfter(timeBefore, timeAfter) {
            let timeBeforeVar = new Date(timeBefore)
            let timeAfterVar = new Date(timeAfter)

            if (timeBeforeVar > timeAfterVar) {
                return 1;
            } else if (timeBeforeVar < timeAfterVar) {
                return 0
            }
        }

        function verifyFinalHour(ProvavelHoraFinal, ordem) {
            var currentTime = new Date();
            let HoraFinal = new Date(ProvavelHoraFinal)

            if (currentTime > HoraFinal && ordem.os_finalized == 'N') {
                return 1
            }

            if (currentTime < HoraFinal && ordem.os_finalized == 'N') {
                return 0
            }
        }

        function addMinutesToTimeMaisUm(date) {
            const newDate = new Date(date.getTime());

            newDate.setMinutes(newDate.getMinutes() + 1);

            return newDate;
        }

        var $sked1 = $('#sked1').skedTape({
            caption: 'Técnicos',
            start: today(8, 0),
            end: today(24, 0),
            showEventTime: true,
            showEventDuration: true,
            scrollWithYWheel: true,
            locations: locations2.slice(),
            events: teste2.slice(),
            maxTimeGapHi: 60 * 1000, // 1 minute
            minGapTimeBetween: 1 * 60 * 1000,
            snapToMins: 1,
            editMode: true,
            timeIndicatorSerifs: true,
            showIntermission: true,
            formatters: {
                date: function(date) {
                    return $.fn.skedTape.format.date(date, 'l', '/');
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
                // $el.prepend('<img src="https://s3.amazonaws.com/attachments.fieldcontrol.com.br/accounts/6118/employees/9271b714-c5cb-4f75-bdd0-abc71276dfd0/518e.83c14040f.png?id=1bf9.cb7bee33a" alt="Imagem" class="icone"/>');
            }
        });
        $sked1.on('event:dragEnded.skedtape', function(e) {
            //realizar 2 ifs, quando contém locations2 significa que é manipulação da própria tabela
            //quando não contém locations2 dentro de userData significa que é manipulação do carrossel
            var event = e.detail.event;
            var startTime = event.start;
            event.status = true
            var currentTime = new Date();
            if (startTime < currentTime) {
                event.start = currentTime;
                $sked1.skedTape('updateEvent', event);
            }

            direcionar(event)
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
                        name: 'New meeting ' + selectedId,
                        id: selectedId,
                        start: startTime,
                        duration: 60 * 90 * 1000, //1h e meia
                        started: false,
                        className: 'deslocamento-event',
                        userData: {
                            locations: locations2,
                            id_os: selectedId,
                            // cliente: e.detail.event.cliente_fantasia
                        },
                    });
                    document.getElementById(selectedId).classList.remove('highlight-card');
                    selectedId = null;


                }
            } catch (e) {
                if (e.name !== 'SkedTape.CollisionError') throw e;
                alert('Already exists');
            }
        });

        // Mon Jun 26 2023 08:30:00 GMT-0300 (Horário Padrão de Brasília) exemplo data

        function processOrders(data, type) {
            if (type === 1) {
                // Retornar apenas as ordens de serviço com 'direcionado' igual a 'N'
                return data.filter(order => order.os_status_nome === 'Aberta');
            } else if (type === 2) {
                // Filtrar as ordens de serviço com 'direcionado' igual a 'Y'
                const filteredData = data.filter(order => order.direcionado === 'Y' || order.evento == true);

                const processedData2 = filteredData.map(order => {
                    let processedOrder = {
                        ...order
                    };
                    const technician = locations2.find(tech => tech.idTecnico === order.os_usuario);
                    processedOrder.location = technician.id;
                    // processedOrder.os_started = (processedOrder.os_status_nome === 'Em atendimento') ? tr  ue : (order.os_status_nome === 'Aberta') ? false : false;
                    const statusToClassNameMap = {
                        'Em atendimento': 'atendimento',
                        'Direcionado': 'direcionado',
                        'Cancelado': 'cancelado',
                        'Concluido': 'concluido',
                        'Orçamento': 'orcamento'
                    };

                    processedOrder.className = statusToClassNameMap[processedOrder.os_status_nome || processedOrder.status] || 'aviso';

                    if (processedOrder.nome_evento == "descanso") {
                        processedOrder.className = "descanso"
                    }
                    if (processedOrder.nome_evento == "deslocamento") {
                        processedOrder.className = "deslocamento"
                    }

                    processedOrder.userData = {
                        id_os: processedOrder.os_id,
                        locations: locations2,
                        cliente: processedOrder.cliente_fantasia
                    }

                    if (processedOrder.evento == true) {
                        processedOrder.userData = {
                            id_os: processedOrder.id,
                            locations: locations2,
                            cliente: processedOrder.nome_evento
                        }
                    }
                    if (technician) {
                        const tecnicoIndex = OsPorTecnico.findIndex(item => item.idTecnico === technician.idTecnico);
                        if (tecnicoIndex !== -1) {
                            OsPorTecnico[tecnicoIndex].ordens.push(processedOrder);
                        } else {
                            OsPorTecnico.push({
                                idTecnico: technician.idTecnico,
                                ordens: [processedOrder]
                            });
                        }
                    }

                    // Converter o array "OsPorTecnico" em um array com base nas posições
                    const OsPor0TecnicoArray = OsPorTecnico.map((item, index) => ({
                        posição: index,
                        ordens: item.ordens
                    }));

                    return processedOrder;
                });
                const teste = gerarHoraInicio(OsPorTecnico)

                return teste;
            }
        }

        function direcionar(event) {
            console.log('hshshshs', event)
            // alert(event.start)
            const event_id = event.userData.id_os; // exemplo
            const event_start = event.start; // exemplo
            const event_idTecnico = event.userData.locations[event.location - 1].idTecnico
            // Montar o objeto de dados a ser enviado no corpo da requisição
            const data = {
                event_id: event_id,
                event_start: event_start,
                event_idTecnico: event_idTecnico
            };
            console.log('data', data)

            fetch('rotaDirecionar.php', {
                    method: 'POST', // ou 'PUT'
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(function(response) {
                    if (response.ok) {
                        return response.text();
                    } else {
                        throw new Error('Erro na requisição: ' + response.status);
                    }
                })
                .then(function(data) {
                    // Tratar a resposta do PHP, se necessário
                    console.log(data);
                })
                .catch(function(error) {
                    // Tratar qualquer erro ocorrido durante a requisição
                    console.log('Erro: ' + error.message);
                });

            alert(`O.S Direcionada para o técnico ${event.userData.locations[event.location - 1].name}`)
            location.reload();
        }
    </script>
</body>

</html>