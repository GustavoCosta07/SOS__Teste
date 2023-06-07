<?php
//cCODIGO DA SESSION
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
    
}
include "database/conexao.php";
$clientesValues = $_POST['clientes']; // Returns an array
$nomeValues = $_POST['nome'];
$modeloValues = $_POST['modelo'];
$paradasValues = $_POST['paradas'];
$portaValues = $_POST['porta'];

$arr = array(
    $clientesValues,
    $nomeValues,
    $modeloValues,
    $paradasValues,
    $portaValues
);

if(is_array($arr)):
    foreach($arr as $cliente):
      $nome_cliente = mysql_real_escape_string ($arr[$cliente][0]);
      $nome_nome = mysql_real_escape_string ($arr[$cliente][1]);
      $nome_modelo = mysql_real_escape_string ($arr[$cliente][2]);
      $nome_parada = mysql_real_escape_string ($arr[$cliente][3]);
      $nome_porta = mysql_real_escape_string ($arr[$cliente][4]);
      $conn->query($insert = "INSERT INTO equipamentos (equipamento_id_cliente,equipamento_nome,equipamento_modelo,equipamentos_paradas,equipamentos_porta)
      VALUES ('$nome_cliente','$nome_nome','$nome_modelo','$nome_parada','$nome_porta')");
      mysqli_query($conn, $query);
    endwhile;
endif;






 ?>
<script src="assets/js/jquery.js"></script>
<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
	<?php

 


	$ultimo_id = $conn->insert_id; 
//echo $conn;

?>

 <style>

.button {     
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;        
}

</style>
<body onload="sendForm();">
<button type="button" class="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="sa-departamento"></button>


                                                <!-- staticBackdrop Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon
                                                                    src="https://cdn.lordicon.com/lupuorrc.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:120px;height:120px">
                                                                </lord-icon>
                                                                
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Tudo certo!</h4>
                                                                    <p class="text-muted mb-4"> Cadastro realizado com sucesso.</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        
                                                                        <a href="formulario_anotacoes2/<?php echo $ultimo_id ?>" class="btn btn-success">Fechar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

<script>
	function sendForm() {
        $("#sa-departamento").click();
      } 	
		
		</script>