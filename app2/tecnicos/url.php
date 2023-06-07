<?php

				
    if( !empty($_GET['url']) ){
        $url = explode( "/" , $_GET['url']);
        if( empty($url[count($url)-1]) ){
            unset($url[count($url)-1]);
        }

        switch( $url[0] ){
            
case 'home': include('home.php');break;
case 'criar_tarefa': include('criar_tarefa.php');break;
case 'minhas_tarefas': include('minhas_tarefas.php');break;

case 'ver_chamado':
@$id = $url[1];
include('ver_chamado.php');break;

case 'iniciar_atendimento':
@$id = $url[1];
@$id2 = $url[2];
@$id3 = $url[3];
include('iniciar_atendimento.php');break;

case 'tratar_chamado':
@$id = $url[1];
@$id2 = $url[2];
include('tratar_chamado.php');break;

case 'tratar_chamado2':
include('tratar_chamado2.php');break;

case 'chamado_finalizado':
include('chamado_finalizado.php');break;

case 'finalizar_chamado':
include('finalizar_chamado.php');break;

case 'solicitacao_orcamento_ok':
@$id = $url[1];
include('solicitacao_orcamento_ok.php');break;


case 'salvar_finalizar_chamado':
include('salvar_finalizar_chamado.php');break;
    
case 'solicitar_orcamento':
include('solicitar_orcamento.php');break;
 
case 'salvar_solicitacao_orcamento':
include('salvar_solicitacao_orcamento.php');break;



case 'sair':
include('sair.php');break;
	
	   default: include('requisicao.php');
        }
    }
?>