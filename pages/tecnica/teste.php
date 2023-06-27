<?php
$servidor = "mysql";
$usuario = "myuser";
$senha = "mypassword";
$dbname = "sos_teste";

// Criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
mysqli_set_charset($conn, "utf8");

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Dados a serem atualizados
$os_status = 1;
$direcionado = 'Y';
$os_hora_inicio = $_POST['start']; // Substitua $_POST['start'] pela variável correta que contém o valor de event.start

$os_id = $_POST['id']; // Substitua $_POST['id'] pela variável correta que contém o valor de event.id

// Monta a query de atualização
$query = "UPDATE os
          SET os_status = '$os_status',
              direcionado = '$direcionado',
              os_hora_inicio = '$os_hora_inicio'
          WHERE os_id = '$os_id'";

// Executa a query de atualização
if (mysqli_query($conn, $query)) {
    echo "Dados atualizados com sucesso!";
} else {
    echo "Erro ao atualizar dados: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
