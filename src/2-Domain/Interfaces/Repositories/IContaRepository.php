<?php
	namespace Domain\Interfaces\Repositories;
	
	use Domain\Entities\Conta as Conta;
	
	interface IContaRepository{
		function listar($usuario);
		function buscar($id,$usuario);
		function cadastrar(Conta $conta);
		function alterar(Conta $conta);
		function buscarContaPadrao($usuario);
		
	}