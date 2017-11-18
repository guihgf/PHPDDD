<?php
	namespace Domain\Interfaces\Repositories;

	use Domain\Entities\Lancamento;

	interface ILancamentoRepository{
		function listar($usuario);
		function buscar($id,$usuario);
		function cadastrar(Lancamento $lancamento);
		function alterar(Lancamento $lancamento);
		function excluir($id,$usuario_id);
		
	}