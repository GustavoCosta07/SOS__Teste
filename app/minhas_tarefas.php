<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light">
					<div class="page-header-content header-elements-lg-inline">
						<div class="page-title d-flex">
							<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Tarefas</span> - Minhas Tarefas</h4>
							<a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
						</div>

						<div class="header-elements d-none">
							<div class="d-flex justify-content-center">
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Minhas Tareafas</span></a>
								<a href="#" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Tarefas Criadas</span></a>
								
							</div>
						</div>
					</div>
</div>
				
				
				
				
				
				
				
				
				<!-- Content area -->
				<div class="content">

					<!-- Single mail -->
				

					
							<div class="text-center d-lg-none w-100">
								<button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-read">
									<i class="icon-circle-down2"></i>
								</button>
							</div>

							

								
				
						<!-- Filter toolbar -->
					<div class="navbar navbar-expand-lg navbar-light border rounded mb-3">
						<div class="text-center d-lg-none w-100">
							<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-filter">
								<i class="icon-unfold mr-2"></i>
								Filtros
							</button>
						</div>

						<div class="navbar-collapse collapse" id="navbar-filter">
							<span class="navbar-text font-weight-semibold mr-3">
																Filtros
:
							</span>

							<ul class="navbar-nav flex-wrap">
								<li class="nav-item dropdown">
									<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
										<i class="icon-sort-time-asc mr-2"></i>
										Status
									</a>

									<div class="dropdown-menu">
										<a href="#" class="dropdown-item">Geral</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item">Em Aberto</a>
										<a href="#" class="dropdown-item">Em Execução</a>
										<a href="#" class="dropdown-item">Concluída</a>
										<a href="#" class="dropdown-item">Cancelada</a>
										
									</div>
								</li>

								

								
							</ul>

							<span class="navbar-text font-weight-semibold mr-3 ml-lg-auto">
								
							</span>

							<div class="mb-3 mb-lg-0">
								
							</div>
						</div>
					</div>
					<!-- /filter toolbar -->
					
					
					 
					
					
					
					
						<div class="row">
							
		 <?php
$sqlt = "SELECT * FROM tarefas WHERE tarefa_status <>'2' and tarefa_lixeira ='1' and tarefa_para = '$iduser'  ORDER BY tarefa_prazo asc ";	
$resultadot = mysqli_query($conn, $sqlt);
while ($linhat=mysqli_fetch_array($resultadot)) {
	
// PEGANDO CRIADOR DA TAREFA
$sqlct = "SELECT * FROM users WHERE user_id  = '$linhat[tarefa_quem]'   ";	
$resultadoct = mysqli_query($conn, $sqlct);
$linhact=mysqli_fetch_array($resultadoct);
	

$partest = explode(' ', $linhact['user_nome']);
$primeiroNomec = array_shift($partest);
$ultimoNomec = array_pop($partest);		
	
	
date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');		

$dt_local = new DateTime($date);
$prazo = date('Y-m-d', strtotime($linhat['tarefa_prazo']));	
$dt_remoto = new DateTime($prazo);
$horatarefa = date('H:i', strtotime($linhat['tarefa_prazo']));	


	?>
		
							
							
	 <!-- Primary modal -->
							<form> 
					<div id="modal_theme_primary<?php echo $linha['user_id'] ?>" class="modal fade" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-primary text-white">
									<h6 class="modal-title">Tarefa para: <strong> <?php echo $linha['user_nome'] ?> </strong> </h6>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>

								<div class="modal-body">
									<h6 class="font-weight-semibold">Informe o cliente:*</h6>
									<?php // listando usuaris 

echo "<SELECT NAME='cliente' SIZE='1' class='form-control' required>
<OPTION VALUE='0' SELECTED>Não informar ";
$sqlc = "SELECT * FROM clientes WHERE cliente_status='1' and cliente_lixeira ='1' ORDER BY cliente_nome";
$resultadoc = mysqli_query($conn, $sqlc);
while ($linhac=mysqli_fetch_array($resultadoc)) {
echo "<OPTION VALUE='".$linhac['cliente_id']."'>".utf8_encode($linhac['cliente_nome']);
}
echo "</SELECT>";

?>
									<hr>
									<h6 class="font-weight-semibold">Informe a tarefa:*</h6>
									<textarea class="form-control" required></textarea>

									<hr>

									<h6 class="font-weight-semibold">Prazo de execução</h6>
									<input type="datetime-local" required class="form-control">
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
									<button type="submit"  class="btn btn-primary">Enviar Tarefa</button>
								</div>
							</div>
						</div>
					</div>
					<!-- /primary modal -->						
					</form>		
							
							
							
						
						<div class="col-xl-6">
							
							<?php if ($dt_local > $dt_remoto)  {	{ ?>
							<div class="card border-left-3 border-left-danger rounded-left-0">
								<?php } ?>
								
								<?php } else if ($dt_local < $dt_remoto) {  ?>
							<div class="card border-left-3 border-left-info rounded-left-0">

							<?php } else { ?>	
								<div class="card border-left-3 border-left-warning rounded-left-0">
								<?php } ?>
									
									
									
								
								<div class="card-body">
									<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
										<div>
											<h6><a href="task_manager_detailed.html">#<?php echo $linhat['tarefa_id'] ?>. <?php echo $linhat['tarefa_titulo'] ?></a></h6>
											<p class="mb-3"><?php echo $linhat['tarefa_observacoes'] ?></p>

						                	
						                	
										</div>

										<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
											<li><span class="text-muted"><?php echo date('d/m/Y H:i:s', strtotime($linhat['tarefa_prazo'])); ?></span></li>
											<li class="dropdown">
						                		Status: &nbsp; 
												 <?php if ($linhat['tarefa_status'] =='1') { ?><span class="badge bg-primary">Em aberto</span> <?php } ?>
																	 <?php if ($linhat['tarefa_status'] =='3') { ?><span class="badge bg-success">Concluída</span> <?php } ?> 
																	 <?php if ($linhat['tarefa_status'] =='5') { ?><span class="badge bg-info">Em Execução</span> <?php } ?> 
																	 <?php if ($linhat['tarefa_status'] =='4') { ?><span class="badge bg-danger">Cancelada</span> <?php } ?> 
												
											</li>
											<li><a href="#">Enviada por:</a></li>sas
										</ul>
									</div>
								
								
								</div>
							</div>
						</div>
					
					<?php } ?>
							
					</div>
					
							</div></div></div>
					
			