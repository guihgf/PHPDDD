<?php
	namespace Domain\Interfaces\Repositories;

	use Domain\Entities\Usuario as Usuario;
	
	interface IUsuarioRepository{
		function buscarPorId($id);
		function buscarPorEmail($email);
		function cadastrar(Usuario $usuario);
		function alterar(Usuario $usuario);
	}

?>