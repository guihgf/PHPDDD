<?php
namespace Infra\Data\Factories;

abstract class FactoryBase{
	protected static final function createMap($class){
		$class = new \ReflectionClass("$class");
		$properties = $class->getProperties();
	
		foreach ($properties as $property) {
			$name = $property->getName();
			$propertyVal = $class->getProperty($name);
			$propertyVal->setAccessible(true);
		}
	
		return $class;
	
	}
	
	protected static final function convertReflectionToObj($map,$model){
		$model=new $model();
	
		$class = new \ReflectionClass($model);
		$properties = $class->getProperties();
	
		foreach ($properties as $property) {
			$name = $property->getName();
	
			if (isset($map->$name)) {
	
				$propertyVal = $map->getProperty($name);
				$propertyVal->setAccessible(true);
				$propertyVal->setValue($model,$map->$name);
			}
		}
	
		return $model;
	}

	public static final function makeModel($config){
		$map = self::createMap(static::$model);

		$configuracoes=$config::fields();


		foreach($configuracoes as $key=> $configuracao){
			$prop=$configuracao['model'];
			$map->$prop=$config->$key;
		}
		//converte reflection para o model real
		$model=self::convertReflectionToObj($map, static::$model);

		return $model;

	}

	public static final function makeConfig(){

		$args = func_get_args();
		$model = isset($args[0])?$args[0]:null;
		$config =isset($args[1])?$args[1]:null;

		//Atualização
		if($config !=null){
			$properties=self::makeConfig($model);

			foreach ($properties as $key => $value) {
				$config->$key=$value;
			}
		}
		else
		{
			//outros

			//recuperando de/para
			$config=new static::$config();
			$config=$config::fields();

			//transformando o model em um obj acessivel
			$class = new \ReflectionClass($model);

			//convertendo reflection para o array do config
			$result= array();
			foreach($config as $key=> $configuracao){
				$name=$configuracao['model'];
				$propertyVal = $class->getProperty($name);
				$propertyVal->setAccessible(true);

				$result[$key]=$propertyVal->getValue($model);
			}

			$config=$result;

		}


		return $config;
	}
	
}