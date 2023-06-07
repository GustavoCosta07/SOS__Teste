<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados c INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id
inner join os o ON c.chamado_os = o.os_id

where c.chamado_tecnico ='$user[user_id]' 
and c.chamado_status = '2' or c.chamado_status = '7' or c.chamado_tecnico ='9999' 
and c.chamado_status = '2' or c.chamado_status = '7'    ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);

?>
<div class="col-12  mt-3 mb-4">
<p class="text-uppercase font-weight-bold text-primary">Bem-vindo, <?php echo $user[user_nome] ?></p>
<h1><span class="font-weight-light small">Você tem</span> <b class="text-primary"><?php echo $totaltarefas ?></b> <span class="font-weight-light small">chamados</span></h1>
</div>



                    <h2 class="block-title">Chamados</h2>
                    <div class="col-12 mb-4 ">
                        <ul class="list-group ">

<?php while($tarefa = mysqli_fetch_array($tarefas)) { ?> 



                            <li class="list-group-item py-4 ">

                            <?php if($tarefa['os_tipo']  == '4') { ?>
                            <div class="alert alert-danger" role="alert">
  EMÈRGENCIA - EMÈRGENCIA - EMÈRGENCIA
</div>
<?php } ?>
                            
                                <h5><i class="material-icons text-warning vm mr-2">home</i><?php echo $tarefa['cliente_fantasia'] ?></h5>
                                <p class="mb-0"><strong> Aberto dia: </strong> <?php echo date('d/m/Y H:i:s', strtotime($tarefa[chamado_data_os])); ?> </p>
                                <p class="mb-0"><strong> Direcionado dia: </strong>  <?php echo date('d/m/Y H:i:s', strtotime($tarefa[chamado_data_aberto])); ?> </p>
                            <br>
                                <div class="col-12 mb-4 text-center">
                                    <?php if($tarefa['chamado_status'] == '7') { ?>
                                        <a href="tratar_chamado/<?php echo $tarefa['chamado_id'] ?>" class="btn btn-warning rounded">Em Atendimento</a>
                                        <?php }?>
                                        <?php if($tarefa['chamado_status'] == '2') { ?>
                        <a href="ver_chamado/<?php echo $tarefa['chamado_id'] ?>" class="btn btn-primary rounded">Acessar</a>
                        <?php }?>
                    </div>
                            
                            </li>
                           
                           <?php } ?>


                        </ul>
                    </div>