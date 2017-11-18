<?php
	namespace Domain\Entities;
	
	use Domain\Util\Validacoes as Validacoes;
	
	class Conta{
		private $id;
		private $nome;
		private $dataCadastro;
		private $dataDesativacao;
		private $padrao;
		private $usuario;
		
		public function __construct(){
			$this->dataCadastro=new \DateTime();
			$this->padrao=1;
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			Validacoes::validarTamanhoMinMax($nome, "Nome da conta", 5, 100);
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
		
		public function setPadrao($padrao){
			if($padrao !=1 && $padrao!=2){
				throw new \InvalidArgumentException("Padrão inválido");
			}
			
			$this->padrao=(int)$padrao;
		}
		
		public function getPadrao(){
			return $this->padrao;
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