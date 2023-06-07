<?php // CODIGO DA SESSION
session_start();
if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

?> 


	
		<!-- Libraries/Plugins -->
		<link id="dropzone-css" href="assets/css/dropzone.css" rel="stylesheet">
			<link id="font-awesome-css" href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link id="font-awesome-css" href="assets/css/style.css" rel="stylesheet">



<div class="row"> 
<div class="col-8"> 

		<!-- Wrapper -->
		<div class="wrapper">

			<section class="container-fluid inner-page">

				<div class="row">

					<div >

						<!-- Files section -->

					  <form action="pages/produtos/file-upload.php?id=<?php echo $id2 ?>" class="dropzone files-container" method="get">
							<div class="fallback">
								<input name="file" type="file" multiple />
<input name="id" type="text" value="<?php echo $id ?>" />

							</div>
						</form>

						<!-- Notes -->
						

						<!-- Uploaded files section -->
						<h4 class="section-sub-title"><span>Fotos </span>Carregadas (<span class="uploaded-files-count">0</span>)</h4>
						<span class="no-files-uploaded">Nenhuma foto carregada ainda.
</span>

						<!-- Preview collection of uploaded documents -->
						<div class="preview-container dz-preview uploaded-files">
							<div id="previews">
								<div id="onyx-dropzone-template">
									<div class="onyx-dropzone-info">
										<div class="thumb-container">
											<img data-dz-thumbnail />
										</div>
										<div class="details">
											<div>
												<span data-dz-name></span> <span data-dz-size></span>
											</div>
											<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
											<div class="dz-error-message"><span data-dz-errormessage></span></div>
											<div class="actions">
												<a href="#!" data-dz-remove><img src="trash.png" width="20px"  alt=""/></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Warnings -->
						<div id="warnings">
							<span>Avisos</span>
						</div>

					</div>
				</div><!-- /End row -->

			</section>

		</div>
	
	</div>

<div class="col-4"><strong> Fotos </strong> <br><br>
	
	<div class="row">
	<?php
$pasta = "pages/produtos/fotos/$id2/";
$arquivos = glob("$pasta{*.jpg,*.jpg,*.JPG,*.png,*.gif,*.jpeg,}", GLOB_BRACE);
foreach($arquivos as $id => $img){
	
$remover = str_replace("/","-", $img);
	
	
	?>
		<div class="col-3" align="center">

 <a href="deletar_foto/<?php echo $remover ?>/<?php echo $id2 ?>"> <img src="<?php echo $img ?> " width="120" /> Remover</a>
 </div>
<?php

}
?>
	 </div>
	
	</div>

	</div>

		<!-- /Wrapper -->

		<!-- JQuery -->
<script src="assets/js/jquery-1.10.2.min.js"></script>

		<!-- Dropzone JS -->
<script src="assets/js/dropzone.min.js"></script>

		<!-- Main JS file -->
<script src="assets/js/scripts.js"></script>

	</body>
</html>