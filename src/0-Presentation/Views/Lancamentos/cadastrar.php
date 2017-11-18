<?php
	if(isset($data["lancamento"])){
		$lancamento=$data["lancamento"];
	}
?>

<link rel="stylesheet" href="<?= $GLOBALS['base_site'] ?>public/plugins/chosen/chosen.css">

<h3>
	Contas
	<small>Cadastre a sua nova conta informando os campos abaixo.</small>
</h3>
<ol class="breadcrumb">
	<li><a href="index"><i class="fa fa-money"></i> Contas</a></li>
	<li class="active">nova</li>
</ol>
<!-- Default box -->
<form id="form" method="POST" action="<?=isset($lancamento["id"])?"alterar":"cadastrar"?>" onsubmit="return false;">
	<?php
		if(isset($lancamento["id"])){
	?>
		<input type="hidden" name="codigo" value="<?=$lancamento["id"]?>"/>
		
	<?php
		}
	?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Nova Conta</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tipo">Tipo:</label>
							<select name="tipo" id="tipo" class="form-control chosen-select">
								<option value="1" <?=(((isset($lancamento["tipo"])&&$lancamento["tipo"]=="1") || !isset($lancamento["tipo"]))?"selected":"")?> >Despesa</option>
								<option value="2" <?=((isset($lancamento["tipo"])&&$lancamento["tipo"]=="2")?"selected":"")?>>Receita</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<!--input[name="nome"].form-control#nome-->	
							<label for="nome">Nome:</label>
							<input type="text" name="nome" class="form-control" id="nome" value="<?=(isset($lancamento["nome"])?$lancamento["nome"]:"")?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<!--input[name="nome"].form-control#nome-->	
							<label for="valor">Valor:</label>
							<input type="text" name="valor" class="form-control" id="valor" value="<?=(isset($lancamento["valor"])?$lancamento["valor"]:"")?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<!--input[name="nome"].form-control#nome-->	
							<label for="data_vencimento">Vencimento:</label>
							<input type="text" name="data_vencimento" class="form-control" id="data_vencimento" value="<?=(isset($lancamento["data_vencimento"])?$lancamento["data_vencimento"]:"")?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<!--input[name="nome"].form-control#nome-->	
							<label for="data_pagamento">Pagamento:</label>
							<input type="text" name="data_pagamento" class="form-control" id="data_pagamento" value="<?=(isset($lancamento["data_pagamento"])?$lancamento["data_pagamento"]:"")?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="tipo">Conta:</label>
							<select name="conta" id="conta" class="form-control chosen-select">
								<?php
									foreach ($data["contas"] as $conta) {?>
										<option value="<?=$conta["id"]?>"><?=$conta["nome"]?></option>	
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tipo">Grupo:</label>
							<select name="grupo" id="grupo" class="form-control chosen-select">
								<?php
									foreach ($data["grupos"] as $grupo) {?>
										<option value="<?=$grupo["id"]?>"><?=$grupo["nome"]?></option>	
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tipo">Tipo do Pagamento:</label>
							<select name="tipo_pagamento" id="tipo_pagamento" class="form-control chosen-select">
								<?php
									foreach ($data["tipos"] as $tipo) {?>
										<option value="<?=$tipo["id"]?>"><?=$tipo["nome"]?></option>	
								<?php
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tipo">Participante:</label>
							<select name="participante" id="participante" class="form-control chosen-select">
								<?php
									foreach ($data["participantes"] as $participante) {?>
										<option value="<?=$participante["id"]?>"><?=$participante["nome"]?></option>	
								<?php
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="observacao">Observação:</label>
							<textarea name="observacao" class="form-control" id="observacao"></textarea>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="box-footer">
			<a href="index" class="btn btn-default">Voltar</a>	
			<button type="submit" class="btn btn-info pull-right">Salvar</button>
		</div>
	</div>
</form>
<?php
$scripts='<script src="'.$GLOBALS["base_site"].'public/plugins/jQueryValidate/jquery.validate.min.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/plugins/jQueryValidate/additional-methods.min.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/plugins/jQueryValidate/localization/messages_pt_BR.min.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/plugins/chosen/chosen.jquery.min.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/modal.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/lancamento.js"></script>';




