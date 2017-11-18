<?php
	namespace Application\Interfaces;

	interface IParticipanteApp{
		function listar($usuario);
		function listarAtivos($usuario);
		function buscar($id,$usuario);
		function cadastrar($nome,$telefone,$celular,$email,$rua,$numero,$bairro,$complemento,$cidade,$usuario);
		function alterar($id,$usuario,$nome,$telefone,$celular,$email,$rua,$numero,$bairro,$complemento,$cidade);
		function alterarStatus($id,$usuario);
	}