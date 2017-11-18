<?php

namespace Infra\Data\Repositories;

use Domain\Interfaces\Repositories;

use Infra\Data\EntityConfig;


class RepositoryBase{
	private $db;
	private $factory;

	function __construct(){

		$factory=static::$factory;
		$this->db = (new EntityConfig\Contexto($factory::$config))->Init();
	}

	function getDB(){
		return $this->db;
	}

	function add($obj){
		$entityConfig=$this->makeConfig($obj);
		$this->db->insert($entityConfig,['validate'=>false]);
	}
	function getById($id){
		$config = $this->db->get($id);

		if($config){
			$model= $this->makeModel($config);
			return $model;
		}
		else
			return null;
	}
	function getByWhereFirst($cond){

		$query=$this->db->where($cond)->first();

		if($query){
			$result=$this->makeModel($query);
			return $result;
		}
		else
			return null;
	}
	function getByWhere($cond,$order=null){

		$model_rows=array();
		
		if($order==null)
			$config_rows=$this->db->select()->where($cond);
		else
			$config_rows=$this->db->select()->where($cond)->order($order);
			
		foreach ($config_rows as $entityConfig) {
			array_push($model_rows,$this->makeModel($entityConfig));
		}

		return $model_rows;
	}

	function getAll($order=null){
		$model_rows=array();
		
		if($order==null)
			$config_rows=$this->db->all();
		else
			$config_rows=$this->db->all()->order($order);

		foreach ($config_rows as $entityConfig) {
			array_push($model_rows,$this->makeModel($entityConfig));
		}

		return $model_rows;
	}	
	function update($obj){
		$entityConfig = $this->db->get($obj->getId());

		$entityConfig=$this->makeConfig($obj,$entityConfig);

		$this->db->update($entityConfig,['validate'=>false]);
	}
	function remove($id){
		$entityConfig = $this->db->get($id);

		$this->db->delete($entityConfig);
	}

	function makeModel($query){
		$factory=static::$factory;
		return $factory::makeModel($query);
	}

	function makeConfig($model,$config=null){
		$factory=static::$factory;
		if($config!=null)
			return $factory::makeConfig($model,$config);
		else
			return $factory::makeConfig($model);

	}
}

?>