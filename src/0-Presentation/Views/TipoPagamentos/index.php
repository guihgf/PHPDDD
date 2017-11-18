<link rel="stylesheet" href="<?= $GLOBALS['base_site'] ?>public/plugins/datatables/jquery.dataTables.min.css">

<h3>
	Tipos de Pagamento
	<small>Aqui estão cadastrados todos os tipos de pagamento utilizados em suas receitas e despesas.</small>
</h3>
<ol class="breadcrumb">
	<li><a href="index"><i class="fa fa-credit-card"></i> Tipos de Pagamento</a></li>
	<li class="active">lista</li>
</ol>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<a href="nova" class="btn btn-primary">Novo Tipo de Pagamento</a>

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

					foreach ( $data ["tipoPagamentos"] as $tipoPagamento ) {

						$classe = "";
						$status = "";
						$padrao = "";
						$btn_desa = "";
						$btn_ativ = "";

						if ($tipoPagamento ["dataDesativacao"] !=null) {
							$classe = "danger";
							$status = "Inativo";
							$btn_desa = "hidden";
						} else {
							$status = "Ativo";
							$btn_ativ = "hidden";
						}?>

						<tr id="<?=$tipoPagamento ["id"]?>" class="<?=$classe?>">
							<!--<td><?=$tipoPagamento ["id"]?></td>-->
							<td><?=$tipoPagamento ["nome"]?></td>
							<td><?=$tipoPagamento ["dataCadastro"]->format ( 'd/m/Y' ) ?></td>
							<td><?=$status?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>R$ <?=number_format ( 0, 2, ',', '.' )?></td>
							<td>
								<a href="editar?id=<?=$tipoPagamento ["id"]?>" class="btn btn-info" title="Alterar dados do tipo de pagamento"><i class="fa fa-pencil"></i></a>
							</td>
							<td>
								<a href="alterarStatus?id=<?=$tipoPagamento ["id"]?>" class="btn btn-warning <?=$btn_desa?>" title="Desativar o tipo de pagamento"><i class="fa fa-check-square-o " ></i></a>
								<a href="alterarStatus?id=<?=$tipoPagamento ["id"]?>" class="btn btn-success <?=$btn_ativ?>" title="Ativar o tipo de pagamento"><i class="fa fa-check-square-o "></i></a>
							</td>
							<td>
								<a class="btn btn-danger" title="Apagar o tipo de pagamento" onclick="questao('Remover tipo de pagamento','Deseja realmente apagar este tipo de pagamento?','removerTipoPagamento()');"><i class="fa fa-remove"></i></a>
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
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/tipoPagamento.js"></script>';
?>




