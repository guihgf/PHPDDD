<?php

namespace Application;

use Application\Interfaces\IUsuarioAppService as IUsuarioAppService;
use Domain\Interfaces\Repositories\IUsuarioRepository as IUsuarioRepository;
use Domain\Entities\Usuario as Usuario;
use Application\Interfaces\IUsuarioApp as IUsuarioApp;

class UsuarioApp implements IUsuarioApp{

    private $repo;

    public function __construct(IUsuarioRepository $repo) {
      
        $this->repo=$repo;
    }
    
    function buscarPorId($id){
    	$usuario=$this->repo->buscarPorId($id);
    	return $usuario;
    }
    
    function buscarPorEmail($email){
    	$usuario=$this->repo->buscarPorEmail($email);

    	return $usuario;
    }
    
    function cadastrar($nome,$email,$senha){
    	$usuario=$this->buscarPorEmail($email);
    	
    	if($usuario!=null){
    		throw new \Exception("E-mail já cadastrado.");
    	}
    	
    	$usuario = new Usuario();
    	
    	$usuario->setNome($nome);
    	$usuario->setEmail($email);
    	$usuario->gerarSenha($senha);
    	
    	$this->repo->cadastrar($usuario);
    }
    
    function autenticar($email,$senha){
    	$usuario=$this->buscarPorEmail($email);

        if($usuario){
           $usuario->verificarSenha($senha);
           return $usuario;
        }
        else{
            throw new \Exception("Usuário inválido");
            
        }
    	
    	
    }
    
    function alterarSenha($id,$senha){
    	$usuario=$this->buscarPorId($id);
    	
    	$usuario->gerarSenha($senha);
    	
    	$this->repo->alterar($usuario);
    }

}



?>