<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}


$sql = "SELECT * FROM equipamentos e INNER JOIN modelos m on e.equipamento_modelo = m.modelo_id where e.equipamento_id = '$id'";
$resultado = mysqli_query($conn, $sql);
$linha = mysqli_fetch_array($resultado);

?>
<!-- Sweet Alert css-->
<link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<div id="dvConteudo2" style="display: block">


    <div class="row">




        <!-- INICIO DADOS contrato -->


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4>Equipamentos / Dados Básicos / Editar</h4>
                        </div>
                     

                        <form method="post" action="edit_equipamento">

                            <div id="dataAdd">
                                <div class="add">
                                    <div class="row my-4">
                                        <div class="col-lg-12">

                                            <label class="form-label mb-0">Nome:</label>
                                            <input name="nome" required="required" type="text" class="form-control" id="nome" value="<?php echo $linha[equipamento_nome] ?>">

                                        </div>

                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">Informe a marca</label>

<?php 
echo "<SELECT NAME='marca2' SIZE='1' class='form-control' id='marca'>
<OPTION VALUE='' SELECTED> Escolha ";
$sqlt = "SELECT * FROM marcas ORDER BY marca_nome";
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat=mysqli_fetch_array($resultadot)) {
echo "<OPTION VALUE='".$linhat['marca_id']."' ";
if ($linha['equipamento_id_marca'] == $linhat['marca_id']) {
  echo "SELECTED";
}
echo ">".$linhat['marca_nome'];
}
echo "</select>";
?>




                                        </div>
                                        <div class="col-lg-6">
<div id='resultsd2' style="display:block">
<label class="form-label mb-0">Modelo</label>
<input class="form-control" value="<?php echo $linha[modelo_nome] ?>" readonly>
<input type="hidden"  value="<?php echo $linha[modelo_id] ?>" name="modelo">

</div>
<div id='resultsd'></div>
</div>
                                        <div class="col-lg-6">

                                            <label class="form-label mb-0">Paradas</label>
                                            <input name="paradas" value="<?php echo $linha[equipamentos_paradas] ?>" type="text" class="form-control" id="paradas">

                                        </div>

                                        <div class="col-lg-6">
                                            <label for="porta"></label>
                                            <select name="porta" id="port" required class="form-control">
                                              <option value="<?php echo $linha[equipamentos_porta] ?>"><?php echo $linha[equipamentos_porta] ?></option>
                                                <option value="Automática">Automática</option>
                                                <option value="Eixo Vertical">Eixo Vertical</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                        <label class="form-label mb-0">Status</label>
                                            <select name="status" id="port" required class="form-control">
<?php if ($linha[equipamento_status] == '1') { ?>
<option value="1">Ativo</option>
<?php } ?>
<?php if ($linha[equipamento_status] == '2') { ?>
<option value="2">Inativo</option>
<?php } ?>


                                                <option value="1">Ativo</option>
                                                <option value="2">Inativo</option>
                                            </select>

<input type="hidden" name="id" value="<?php echo $id ?>" >
<input type="hidden" name="cliente" value="<?php echo $linha[equipamento_id_cliente] ?>" >
                                        </div>





                                    </div>
                                </div>
                            </div>





                    </div>

                </div>
            </div>

            <input type="submit" value="Salvar" class="btn btn-primary">
        </div>




        <!-- FIM DADOS contrato -->



        <!-- <button class="btn btn-primary"> Cadastrar </button> -->

        </form>


    </div>
</div>
</div>
</div>
</div>


<div id="ok"> </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
	
	 $(document).ready(function() {
    $('#marca').on('change', function() {
	
		 
		 var dados = jQuery( this ).serialize();
		 
		$.ajax({
			url: 'pages/equipamentos/listar_modelo.php',
			cache: false,
			data: dados,
			type: "POST",  

			success: function(msg){
				
				$("#resultsd").empty();
				$("#resultsd").append(msg);
                document.getElementById("resultsd2").style.display = "none";

			}
			
		});
		 
		 return false;
	 });
 
 });



</script>	




