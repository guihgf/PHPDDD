<?php
	namespace Application\Interfaces;

	interface IGrupoLancamentoApp{
		function listar($usuario);
		function listarAtivos($usuario);
		function listarGruposDespesas($usuario);
		function listarGruposReceitas($usuario);
		function buscar($id,$usuario);
		function cadastrar($nome,$tipo,$usuario);
		function alterar($id,$usuario,$nome,$tipo);
		function alterarStatus($id,$usuario);
	}