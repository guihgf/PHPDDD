<?php
	if(isset($data["tipopagamento"])){
		$tipopagamento=$data["tipopagamento"];
	}
?>
<h3>
	Tipos de Pagamento
	<small>Cadastre um novo tipo de pagamento informando os campos abaixo.</small>
</h3>
<ol class="breadcrumb">
	<li><a href="index"><i class="fa fa-credit-card"></i> Tipos de Pagamento</a></li>
	<li class="active">novo</li>
</ol>
<!-- Default box -->
<form id="form" method="POST" action="<?=isset($tipopagamento["id"])?"alterar":"cadastrar"?>" onsubmit="return false;">
	<?php
		if(isset($tipopagamento["id"])){
	?>
		<input type="hidden" name="codigo" value="<?=$tipopagamento["id"]?>"/>
		
	<?php
		}
	?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Novo Tipo de Pagamento</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
			</div>
			<div class="box-body">
				<div class="col-md-4">
					<div class="form-group">
						<!--input[name="nome"].form-control#nome-->	
						<label for="nome">Nome:</label>
						<input type="text" name="nome" class="form-control" id="nome" value="<?=(isset($tipopagamento["nome"])?$tipopagamento["nome"]:"")?>">
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
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/modal.js"></script>';
$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/tipoPagamento.js"></script>';




