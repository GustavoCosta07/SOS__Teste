<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados where chamado_id = $_POST[os]  ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);

$cmde = "SELECT * FROM equipamentos e inner join modelos m on e.equipamento_modelo = m.modelo_id inner join marcas ma on e.equipamento_id_marca = ma.marca_id  where e.equipamento_id = $_POST[equipamento] ";
$equipamentos = mysqli_query($conn, $cmde);
$equipamento = mysqli_fetch_array($equipamentos);

?>



 <div class="col-12 mb-4">
 <h3><span class="font-weight-light small">Chamado </span><b>#<?php echo $_POST[chamado] ?></b> OS </span><b>#<?php echo $_POST[os] ?></b></h1> <br>


 <form action="salvar_finalizar_chamado" method="POST">
<div class="card">
<div class="card-body">
<span class="text-uppercase font-weight-bold text-primary"> Observações: </span> <br><br>
<textarea required name="observacoes" class="form-control" rows="4" cols="50">
</textarea>


<input name="equipamento" type="hidden" value="<?php echo $_POST[equipamento] ?>">
<input name="os" type="hidden" value="<?php echo $_POST[os] ?>">
<input name="status" type="hidden" value="<?php echo $_POST[status] ?>">
<input name="chamado" type="hidden" value="<?php echo $_POST[chamado] ?>">


</div>


                           
<button class="btn btn-success rounded"> Salvar </button>

</form>
 </div>
                        </div>  </div>