<?php
	namespace Domain\Entities;
	
	use Domain\Util\Validacoes as Validacoes;
	
	class Participante{
		private $id;
		private $nome;
		private $telefone;
		private $celular;
		private $email;
		private $rua;
		private $numero;
		private $bairro;
		private $complemento;
		private $cidade;
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
			Validacoes::validarTamanhoMinMax($nome, "Nome do participante", 5, 100);
			$this->nome=$nome;
		}
		
		public function getNome(){
			return $this->nome;
		}
		
		public function setTelefone($telefone){
			Validacoes::validarTamanhoMax($telefone,"Telefone do participante",20);
			$this->telefone=$telefone;
		}
		
		public function getTelefone(){
			return $this->telefone;
		}
		
		public function setCelular($celular){
			Validacoes::validarTamanhoMax($celular,"Celular do participante",20);
			$this->celular=$celular;
		}
		
		public function getCelular(){
			return $this->celular;
		}
		
		public function setEmail($email){
			Validacoes::validarTamanhoMax($email,"E-mail do participante",150);
			Validacoes::validarEmail($email);
			$this->email=$email;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setRua($rua){
			Validacoes::validarTamanhoMax($rua,"Rua do participante",100);
			$this->rua=$rua;
		}
		
		public function getRua(){
			return $this->rua;
		}
		
		public function setNumero($numero){
			Validacoes::validarTamanhoMax($numero,"Numero na rua do participante",10);
			$this->numero=$numero;
		}
		
		public function getNumero(){
			return $this->numero;
		}
		
		public function setBairro($bairro){
			Validacoes::validarTamanhoMax($bairro,"Bairro do participante",50);
			$this->bairro=$bairro;
		}
		
		public function getBairro(){
			return $this->bairro;
		}
		
		public function setComplemento($complemento){
			Validacoes::validarTamanhoMax($complemento,"Complemento da localização do participante",150);
			$this->complemento=$complemento;
		}
		
		public function getComplemento(){
			return $this->complemento;
		}
		
		public function setCidade($cidade){
			Validacoes::validarTamanhoMax($cidade,"Cidade do participante",50);
			$this->cidade=$cidade;
		}
		
		public function getCidade(){
			return $this->cidade;
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