<?php 
@session_start();
if(!empty($_SESSION['id'])){
	
}else{
	header("Location: logar.php");	
}

$cmdt = "select * from chamados c INNER JOIN clientes cl ON c.chamado_cliente = cl.cliente_id INNER JOIN os o ON c.chamado_os = o.os_id 
where c.chamado_tecnico ='$user[user_id]' and c.chamado_status = '2' and c.chamado_id = $id or c.chamado_tecnico ='9999' and c.chamado_status = '2' and c.chamado_id = $id     ";
$tarefas = mysqli_query($conn, $cmdt);
$totaltarefas = mysqli_num_rows($tarefas);
$tarefa = mysqli_fetch_array($tarefas);
?>



 <div class="col-12 mb-4">
 <h1><span class="font-weight-light small">Chamado </span><b>#<?php echo $id ?></b></h1> <br>



                        <div class="card">
                            <div class="card-body">
                               
                                <p class="text-uppercase font-weight-bold text-primary"><?php echo $tarefa[cliente_fantasia] ?> </p>
                                <p class="mb-4"><?php echo $tarefa[cliente_logradouro] ?> , <?php echo $tarefa[cliente_numero] ?> <?php echo $tarefa[cliente_complemento] ?>
                                <?php echo $tarefa[cliente_bairro] ?> - Cep: <?php echo $tarefa[cliente_cep] ?> <?php echo $tarefa[cliente_cidade] ?> <?php echo $tarefa[cliente_estado] ?>
                                <p class="mb-4"> <strong> Telefone: </strong> <?php echo $tarefa[cliente_telefone] ?> <br>
                                <strong> Síndico: </strong><?php echo $tarefa[cliente_sindico] ?> </p>

                            
                            </p>
                               
                            </div>
                        </div>  </div>

                        <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                               
                                <p class="mb-4"><strong> Solicitante: </strong>  <?php echo $tarefa[os_solicitante] ?> </p>
                                <span class="text-uppercase font-weight-bold text-primary"> Informações iniciais: </span> <br>
                                <?php echo $tarefa[os_consideracoes] ?> <br><hr>
                                <span class="text-uppercase font-weight-bold text-primary"> Observações: </span> <br>
                                <?php echo $tarefa[chamado_observacoes] ?> 
                            </p>
                               
                            </div>
                        </div>  </div>

                        <div class="col-12 mb-4 text-center">
                        <a href="iniciar_atendimento/<?php echo $id ?>/<?php echo $tarefa[chamado_os] ?>/<?php echo $tarefa[os_status] ?>" class="btn btn-success rounded">Iniciar Atendimento</a>
                    </div>
                            