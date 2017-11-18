<?php
	namespace Domain\Entities;
	
	use Domain\Util\Validacoes as Validacoes;
	
	class GrupoLancamento{
		private $id;
		private $nome;
		private $dataCadastro;
		private $dataDesativacao;
		private $tipo;
		private $usuario;
		
		public function __construct(){
			$this->dataCadastro=new \DateTime();
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			Validacoes::validarTamanhoMinMax($nome, "Nome do grupo de lançamento inválido", 5, 100);
			$this->nome=$nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function getDataCadastro(){
			return $this->dataCadastro;
		}
		
		public function getDataDesativacao(){
			return $this->dataDesativacao;
		}
		
		public function setTipo($tipo){
			if($tipo !=1 && $tipo!=2 && $tipo!=3){
				throw new \InvalidArgumentException("Tipo do grupo inválido");
			}
			
			$this->tipo=(int)$tipo;
		}
		
		public function getTipo(){
			return $this->tipo;
		}
		
		public function getStatus(){
			if($this->dataDesativacao==null){
				return 1;
			}
			else{
				return 2;
			}
		}
		
		public function alterarStatus(){
			if($this->dataDesativacao==null){
				$this->dataDesativacao=new \DateTime();
			}
			else{
				$this->dataDesativacao=null;
			}
		}

		public function setUsuario($id){
			$this->usuario=$id;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
	} 