<!-- Main content -->
		<div class="content-wrapper">

			<!-- Inner content -->
			<div class="content-inner">

				<!-- Page header -->
				<div class="page-header page-header-light">
					<div class="page-header-content header-elements-lg-inline">
						<div class="page-title d-flex">
							<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Tarefas</span> - Adicionar Tarefa</h4>
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
					<div class="card">

						<!-- Action toolbar -->
						<div class="navbar navbar-light navbar-expand-lg py-lg-2 rounded-top">
							<div class="text-center d-lg-none w-100">
								<button type="button" class="navbar-toggler w-100 h-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-read">
									<i class="icon-circle-down2"></i>
								</button>
							</div>

							

								
				
				
				<div class="card-body">
							<div class="media flex-column flex-lg-row">
								<a href="#" class="d-none d-lg-block mr-lg-3 mb-3 mb-lg-0">
									<span class="btn btn-teal btn-icon btn-lg rounded-pill">
										<span class="letter-icon">T</span>
									</span>
								</a>

								<div class="media-body">
									<h6 class="mb-0">Criando uma nova tarefa</h6>
									<div class="letter-icon-title font-weight-semibold">Escolha para quem deseja direcionar essa tarefa</div>
								</div>
								
							
								</div>
							
							<hr>
					
					
					
					 
					
					
					
					
						<div class="row">
							
							<?php 
$sql = "SELECT * FROM users WHERE user_status ='1' and user_lixeira ='1'  ORDER BY user_nome";
$resultado = mysqli_query($conn, $sql);
while ($linha=mysqli_fetch_array($resultado)) {
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
									
										<h6 class="font-weight-semibold">Titulo da tarefa:</h6>
									<input type="text" required class="form-control" required>
									
									<hr>
									
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
							
							
							
						<div class="col-xl-3 col-sm-3">
							<div class="card">
								<div class="card-img-actions" align="center">
									<img class="card-img-top img-fluid" style="width: 100px; border-radius: 50px" src="global_assets/images/demo/users/face1.jpg" alt="" data-toggle="modal" data-target="#modal_theme_primary<?php echo $linha['user_id'] ?>">
									
								</div>

						    	<div class="card-body text-center">
						    		<h6 class="font-weight-semibold mb-0"><?php echo $linha['user_nome'] ?></h6>
						    		

					    			
						    	</div>
					    	</div>
						</div>
					
					<?php } ?>
							
					</div>
					
							</div></div></div>
					
			