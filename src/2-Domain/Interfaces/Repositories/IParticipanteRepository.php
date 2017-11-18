<?php
	namespace Domain\Interfaces\Repositories;
	
	use Domain\Entities\Participante as Participante;
	
	interface IParticipanteRepository{
		function listar($usuario);
		function buscar($id,$usuario);
		function cadastrar(Participante $participante);
		function alterar(Participante $participante);
	}