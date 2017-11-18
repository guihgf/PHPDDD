<?php
	namespace Application\Interfaces;

	interface ITipoPagamentoApp{
		function listar($usuario);
		function listarAtivos($usuario);
		function buscar($id,$usuario);
		function cadastrar($nome,$usuario);
		function alterar($id,$usuario,$nome);
		function alterarStatus($id,$usuario);
	}