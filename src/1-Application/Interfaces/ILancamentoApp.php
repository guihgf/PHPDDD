<?php
	namespace Application\Interfaces;

	interface ILancamentoApp{
		function listar($usuario);
		function buscar($id,$usuario);
		function cadastrar($tipo, $nome, $dataVencimento, $dataPagamento, $valor,$observacao, $conta, $grupo, $participante, $tipoPagamento, $usuario);
		function alterar($id,$usuario,$tipo, $nome, $dataVencimento, $dataPagamento, $valor,$observacao, $conta, $grupo, $participante, $tipoPagamento);
		function excluir($id,$usuario);
	}

