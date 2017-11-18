<?php
	namespace Domain\Util;
	
	class Validacoes{
		static  function validarEmail($email){
			if($email!=null && !filter_var($email, FILTER_VALIDATE_EMAIL))
				throw new \InvalidArgumentException("E-mail inválido.");
		}
		
		static function validarTamanhoMinMax($campo,$nome,$min,$max){
			if(strlen($campo)<$min || strlen($campo)>$max)
				throw new \InvalidArgumentException($nome." deve possuir entre ".$min." e ".$max." caracteres");
		}
		
		static function validarTamanhoMax($campo,$nome,$max){
			if(strlen($campo)>$max)
				throw new \InvalidArgumentException($nome." deve possuir no máximo ".$max." caracteres");
		}
		
		static function validarNulos($campo,$nome){
			if($campo==null || $campo==""){
				throw new \InvalidArgumentException($nome." não pode ser vazio");
			}
		}
		
		static function converterData($data){
			list($dd,$mm,$yyyy) = explode('/',$data);
			if (!checkdate($mm,$dd,$yyyy)) {
				throw new \InvalidArgumentException("Data inválida.");
			}
			
			return $yyyy.'-'.$mm.'-'.$dd;
		}
				
	}
?>