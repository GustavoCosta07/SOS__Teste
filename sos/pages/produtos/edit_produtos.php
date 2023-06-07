<?php // CODIGO DA SESSION

if (!empty($_SESSION['user_id'])) {
} else {
    $_SESSION['msg'] = "Área restrita";
    header("Location: ../../login.php");
}

// PEGANDO DADOS DOS PRODUTOS
$sql = "SELECT * FROM produtos WHERE produto_id ='$id' ";
$resultado = mysqli_query($conn, $sql);
$linha=mysqli_fetch_array($resultado);
?> 


 <!-- Sweet Alert css-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

<!-- INICIO DADOS INICIAIS -->

<form method="post" action="alterar_produtos" id="formeditar"> 
	
	<div id="dvConteudo2" style="display: block">	
		
		
 <div class="row">
	 
	 <!--Inicio Formulario-->
     <div class="row">
                               
                               <h4 class="mb-sm-0">Produtos</h4>
                               <div class="row gy-3">                              
                           <div class="card">
                                <div class="card-body"> 
                          
                                    <div class="row">

                                        <h4>Produtos</h4>
                                       
                                        
                                        <div class="row gy-3">

                                           <div class="col-lg-12">
                                              <div>

                                                <label class="form-label mb-0">Nome</label>
                                                  <input name="nome" type="text" class="form-control" id="razao" value="<?php echo $linha['produto_nome'] ?>" >
                                               </div>
                                           </div>

                                           <div class="row gy-3">

                                           </div>

                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Fornecedores</label>
                                                  <input name="fornecedores" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_fornecedores'] ?>" >
                                               </div>

                                           </div>

                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Aplicações</label>
                                                  <input name="aplicacoes" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_aplicacoes'] ?>" >
                                               </div>
                                                   </div>

                                               <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">foto</label>
                                                  <input name="foto" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_foto'] ?>" >
                                               </div>

                                           </div>
                                           
                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Tipo</label>
                                                  <input name="tipo" type="text" class="form-control" id="fantasia"  value="<?php echo $linha['produto_tipo'] ?>" >
                                               </div>

                                           </div>
                                           </div></div></div></div>
                                           
<div class= "card">
<div class = "card-body">
   <div class= "row">
       <h4>Estoque</h4>
       <div class="row gy-3">
                                           <div class="col-lg-6">
                                          
                                              <div>
                                                <label class="form-label mb-0">Estoque</label>
                                                  <input name="estoque" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_estoque'] ?>" >
                                               </div>

                                           </div>

                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">NCM</label>
                                                  <input name="ncm" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_ncm'] ?>" >
                                               </div>

                                           </div>


                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Local estoque</label>
                                                  <input name="localestoque" type="text" class="form-control" id="fantasia"  value="<?php echo $linha['produto_local_estoque'] ?>" >
                                               </div>

                                           </div>

                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Estoque Mínimo</label>
                                                  <input name="estoqueminimo" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_estoque_minimo'] ?>" >
                                               </div>

                                           </div>

                                       

                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Valor venda</label>
                                                  <input name="venda" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_valor_venda'] ?>" >
                                               </div>

                                           </div>

                                           <div class="col-lg-6">
                                              <div>
                                                <label class="form-label mb-0">Valor Compra</label>
                                                  <input name="compra" type="text" class="form-control" id="fantasia" value="<?php echo $linha['produto_valor_compra'] ?>" >
                                               </div>
	 
	 

										</div></div></div>	</div></div></div></div></div>
					<!-- Fim de Observações -->
			
			<button class="btn btn-primary"> Salvar </button>
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">		
			</form>			
								
								</div></div></div>		</div></div>
								
									
						<div id="ok">  </div>		
							

<!-- JAVASCRIPT -->
								<script type="text/javascript" >


$(document).ready(function () {
   $('input').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;
   });
});

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

									
	
    </script>