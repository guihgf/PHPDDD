<?php
	namespace Domain\Interfaces\Repositories;
	
	use Domain\Entities\TipoPagamento as TipoPagamento;
	
	interface ITipoPagamentoRepository{
		function listar($usuario);
		function buscar($id,$usuario);
		function cadastrar(TipoPagamento $tipoPagamento);
		function alterar(TipoPagamento $tipoPagamento);
		
	}