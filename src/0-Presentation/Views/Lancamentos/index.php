<link rel="stylesheet" href="<?= $GLOBALS['base_site'] ?>public/plugins/datatables/jquery.dataTables.min.css">

<h3>
	Contas
	<small>Aqui estão cadastradas todas as suas contas que podem ser sua conta corrente, poupança, conta em corretoras de investimentos ou até mesmo sua carteira</small>
</h3>
<ol class="breadcrumb">
	<li><a href="index"><i class="fa fa-money"></i> Contas</a></li>
	<li class="active">lista</li>
</ol>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<a href="nova" class="btn btn-primary">Nova Conta</a>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
	</div>
	<div class="box-body">
		<div class="table-responsive table-hover ">
			<table class="table table_page jquery_data_table text-center" id="table1">
				<thead>
					<tr>
						<!--<th>Número</th>-->
						<th>Nome</th>
						<th>Data de Cadastro</th>
						<th>Status</th>
						<th>Conta Padrão?</th>
						<th>Saída</th>
						<th>Entrada</th>
						<th>Saldo</th>
						<th>Editar</th>
						<th>Status</th>
						<th>Remover</th>
					</tr>
				</thead>
				<tbody>
					<?php

					foreach ( $data ["contas"] as $conta ) {

						$classe = "";
						$status = "";
						$padrao = "";
						$btn_desa = "";
						$btn_ativ = "";

						if ($conta ["dataDesativacao"] !=null) {
							$classe = "danger";
							$status = "Inativo";
							$btn_desa = "hidden";
						} else {
							$status = "Ativo";
							$btn_ativ = "hidden";
						}

						if ($conta ["padrao"] == 2) {
							$padrao = "Sim";
						} else {
							$padrao = "Não";
						}?>

						<tr id="<?=$conta ["id"]?>" class="<?=$classe?>">
							<!--<td><?=$conta ["id"]?></td>-->
							<td><?=$conta ["nome"]?></td>
							<td><?=$conta ["dataCadastro"]->format ( 'd/m/Y' ) ?></td>
							<td><?=$status?></td>
							<td><?=$padrao?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>
								<a href="editar?id=<?=$conta ["id"]?>" class="btn btn-info" title="Alterar dados da conta"><i class="fa fa-pencil"></i></a>
							</td>
							<td>
								<a href="alterarStatus?id=<?=$conta ["id"]?>" class="btn btn-warning <?=$btn_desa?>" title="Desativar a conta"><i class="fa fa-check-square-o " ></i></a>
								<a href="alterarStatus?id=<?=$conta ["id"]?>" class="btn btn-success <?=$btn_ativ?>" title="Ativar a conta"><i class="fa fa-check-square-o "></i></a>
							</td>
							<td>
								<a class="btn btn-danger" title="Apagar a conta" onclick="questao('Remover conta','Deseja realmente apagar esta conta?','removerConta()');"><i class="fa fa-remove"></i></a>
							</td>
						</tr>

						<?php
						$classe = "";
						$status = "";
					}
					?>

				</tbody>
			</table>
		</div>
		<!-- table-responsive -->
	</div>
</div>
		<!-- /.box -->

<?php
$scripts='<script src="'.$GLOBALS["base_site"].'public/plugins/datatables/jquery.dataTables.min.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/tables.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/modal.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/conta.js"></script>';
?>




