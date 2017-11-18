<?php
namespace Infra\Data\Factories;

abstract class UsuarioFactory extends FactoryBase{

	public static $model="Domain\\Entities\\Usuario";
    public static $config="Infra\\Data\\EntityConfig\\UsuarioConfig";
	
}