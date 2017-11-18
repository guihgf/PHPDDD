<?php
	namespace Application\Interfaces;
	
	interface IUsuarioApp{
		function buscarPorId($id);
		function buscarPorEmail($email);
		function cadastrar($nome,$email,$senha);
		function alterarSenha($id,$senha);
		function autenticar($email,$senha);
	}
?>