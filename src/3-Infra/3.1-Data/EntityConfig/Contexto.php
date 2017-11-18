<?php

namespace Infra\Data\EntityConfig;

	class Contexto {
		private $cfg;
		private $spot;
		private $mapper;

		//Inicializando conexão e informando qual entity config será utilizado
		function __construct($entity=null){
			
			$this->cfg = new \Spot\Config();

			// MySQL
			$this->cfg->addConnection('mysql',
									  ['user'=>'seuusuario',
									   'password'=>'suasenha',
									   'charset'=>'UTF8',
									   'host'=>'localhost',
									   'dbname'=>'seubanco',
									   'driver' => 'pdo_mysql']);


			/*Versão com Oracle, no config deve colocar o campos da tabela em maiusculo
				return [
					'CODIGO'=> ['type' => 'integer', 'primary' => true,'model'=>'codigo'],
					'DESCRICAO'=> ['type' => 'string','model'=>'descricao']
				];
			*/

			/*
            $this->cfg->addConnection('oracle',[
                'user' => 'seuusuario',
                'password' => 'seuusuario',
                'charset'=>'UTF8',
                'dbname' => '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=192.168.10.18)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=ac)))',
                'driver' => 'oci8'
            ]);
            */
			
			$this->spot = new \Spot\Locator($this->cfg);

			if($entity!=null)
				$this->mapper = $this->spot->mapper($entity);
			
		}

		//Retorna Mapper já iniciado
		function init(){
			return $this->mapper;
		}

	}