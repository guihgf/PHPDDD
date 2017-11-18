<?php
	namespace Domain\Interfaces\Repositories;
	
	use Domain\Entities\GrupoLancamento as GrupoLancamento;
	
	interface IGrupoLancamentoRepository{
		function listar($usuario);
		function buscar($id,$usuario);
		function cadastrar(GrupoLancamento $grupoLancamento);
		function alterar(GrupoLancamento $grupoLancamento);
	}