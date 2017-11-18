<?php

	namespace Infra\Data\Repositories;

	use Domain\Interfaces\Repositories;
	use Infra\Data\EntityConfig;
	use Infra\Data\Factories\UsuarioFactory as UsuarioFactory;
	use Domain\Entities\Usuario as Usuario;
	
	class UsuarioRepository extends RepositoryBase implements Repositories\IUsuarioRepository {
		protected static $factory="Infra\\Data\\Factories\\UsuarioFactory";

		function __construct(){
            parent::__construct();
		}
		   
		function buscarPorId($id){
			return $this->getById($id);
		}
		
		function buscarPorEmail($email){
            return $this->getByWhereFirst(['email'=>$email]);

		}
		
		function cadastrar(Usuario $usuario){
		  	$this->add($usuario);
		}
		
		function alterar(Usuario $usuario){
			$this->update($usuario);
		}
	}
?>