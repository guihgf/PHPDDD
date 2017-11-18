<link rel="stylesheet" href="<?= $GLOBALS['base_site'] ?>public/plugins/datatables/jquery.dataTables.min.css">

<h3>
	Participantes
	<small>Aqui estão cadastrados os participantes que são lojas, supermercados, shoppings, ou até mesmo pessoas onde você
	você obteve as suas receitas e fez as suas despesas.</small>
</h3>
<ol class="breadcrumb">
	<li><a href="index"><i class="fa fa-users"></i> Participantes</a></li>
	<li class="active">lista</li>
</ol>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<a href="nova" class="btn btn-primary">Novo Participante</a>

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
						<th>Cidade</th>
						<th>Data de Cadastro</th>
						<th>Status</th>
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

					foreach ( $data ["participantes"] as $participante ) {

						$classe = "";
						$status = "";
						$btn_desa = "";
						$btn_ativ = "";

						if ($participante ["dataDesativacao"] !=null) {
							$classe = "danger";
							$status = "Inativo";
							$btn_desa = "hidden";
						} else {
							$status = "Ativo";
							$btn_ativ = "hidden";
						}
						?>

						<tr id="<?=$participante["id"]?>" class="<?=$classe?>">
							<td><?=$participante ["nome"]?></td>
							<td><?=$participante ["cidade"]?></td>
							<td><?=$participante ["dataCadastro"]->format ( 'd/m/Y' ) ?></td>
							<td><?=$status?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>
								<a href="editar?id=<?=$participante ["id"]?>" class="btn btn-info" title="Alterar dados do participante"><i class="fa fa-pencil"></i></a>
							</td>
							<td>
								<a href="alterarStatus?id=<?=$participante ["id"]?>" class="btn btn-warning <?=$btn_desa?>" title="Desativar o participante"><i class="fa fa-check-square-o " ></i></a>
								<a href="alterarStatus?id=<?=$participante ["id"]?>" class="btn btn-success <?=$btn_ativ?>" title="Ativar o participante"><i class="fa fa-check-square-o "></i></a>
							</td>
							<td>
								<a class="btn btn-danger" title="Apagar o participante" onclick="questao('Remover participante','Deseja realmente apagar este participante?','removerParticipante()');"><i class="fa fa-remove"></i></a>
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
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/participante.js"></script>';
?>




