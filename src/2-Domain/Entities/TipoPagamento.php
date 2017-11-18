<?php
	namespace Domain\Entities;
	
	use Domain\Util\Validacoes as Validacoes;
	
	class TipoPagamento{
		private $id;
		private $nome;
		private $dataCadastro;
		private $dataDesativacao;
		private $usuario;
		
		public function __construct(){
			$this->dataCadastro=new \DateTime();
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setNome($nome){
			Validacoes::validarTamanhoMinMax($nome, "Nome do tipo de pagamento", 5, 100);
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