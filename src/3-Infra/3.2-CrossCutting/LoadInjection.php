<?php
	namespace Infra\Ioc;

	use Dice;

	class LoadInjection{
		function start(){
			
			$dice = new \Dice\Dice;

			$rule = new \Dice\Rule;
			
			$rule->substitutions['Domain\\Interfaces\\Repositories\\IUsuarioRepository'] = new \Dice\Instance('Infra\\Data\\Repositories\\UsuarioRepository');
			$rule->substitutions['Application\\Interfaces\\IUsuarioApp'] = new \Dice\Instance('Application\\UsuarioApp');
			
			$rule->substitutions['Domain\\Interfaces\\Repositories\\IContaRepository'] = new \Dice\Instance('Infra\\Data\\Repositories\\ContaRepository');
			$rule->substitutions['Application\\Interfaces\\IContaApp'] = new \Dice\Instance('Application\\ContaApp');
			
			$rule->substitutions['Domain\\Interfaces\\Repositories\\IParticipanteRepository'] = new \Dice\Instance('Infra\\Data\\Repositories\\ParticipanteRepository');
			$rule->substitutions['Application\\Interfaces\\IParticipanteApp'] = new \Dice\Instance('Application\\ParticipanteApp');

			$rule->substitutions['Domain\\Interfaces\\Repositories\\ITipoPagamentoRepository'] = new \Dice\Instance('Infra\\Data\\Repositories\\TipoPagamentoRepository');
			$rule->substitutions['Application\\Interfaces\\ITipoPagamentoApp'] = new \Dice\Instance('Application\\TipoPagamentoApp');

			$rule->substitutions['Domain\\Interfaces\\Repositories\\IGrupoLancamentoRepository'] = new \Dice\Instance('Infra\\Data\\Repositories\\GrupoLancamentoRepository');
			$rule->substitutions['Application\\Interfaces\\IGrupoLancamentoApp'] = new \Dice\Instance('Application\\GrupoLancamentoApp');
			
			$rule->substitutions['Domain\\Interfaces\\Repositories\\ILancamentoRepository'] = new \Dice\Instance('Infra\\Data\\Repositories\\LancamentoRepository');
			$rule->substitutions['Application\\Interfaces\\ILancamentoApp'] = new \Dice\Instance('Application\\LancamentoApp');


			$dice->addRule('*', $rule);

			return $dice;
		}
	}
?>