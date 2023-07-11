<?php
    $servidor = "mysql";
    $usuario = "myuser";
    $senha = "mypassword";
    $dbname = "sos_teste";

    // Criar a conexão
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    mysqli_set_charset($conn, "utf8");

    // Verificar se a conexão foi estabelecida corretamente
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

    // Recuperar os valores dos parâmetros enviados pela requisição POST ou PUT
    $data = json_decode(file_get_contents('php://input'), true);
    $event_id = $data['event_id'];
    $event_start = $data['event_start'];
    $event_idTecnico = $data['event_idTecnico'];

    // Atualizar os registros na tabela "os"
    $sql = "UPDATE os
            SET os_status = '2',
                direcionado = 'Y',
                os_hora_inicial_esperada = '$event_start',
                os_usuario = '$event_idTecnico'
            WHERE os_id = '$event_id'";

    if (mysqli_query($conn, $sql)) {
        echo "Atualização realizada com sucesso.";
    } else {
        echo "Erro na atualização: " . mysqli_error($conn);
    }

    // Fechar a conexão
    mysqli_close($conn);
?>
