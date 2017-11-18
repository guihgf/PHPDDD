<?php
	namespace Application\Interfaces;

	interface IContaApp{
		function listar($usuario);
		function listarAtivas($usuario);
		function buscar($id,$usuario);
		function cadastrar($nome,$padrao,$usuario);
		function alterar($id,$usuario,$nome,$padrao);
		function alterarStatus($id,$usuario);
	}