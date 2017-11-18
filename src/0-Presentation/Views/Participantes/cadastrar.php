<?php
if(isset($data["participante"])){
	$participante=$data["participante"];
}
?>
<h3>
	Participantes
	<small>Cadastre um novo participante informando os campos abaixo.</small>
</h3>
<ol class="breadcrumb">
	<li><a href="index"><i class="fa fa-user"></i> Participantes</a></li>
	<li class="active">nova</li>
</ol>
<!-- Default box -->
<form id="form" method="POST" action="<?=isset($participante["id"])?"alterar":"cadastrar"?>" onsubmit="return false;">
	<?php
	if(isset($participante["id"])){
		?>
		<input type="hidden" name="codigo" value="<?=$participante["id"]?>"/>
		
		<?php
	}
	?>
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Novo Participante</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					<i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
						<i class="fa fa-times"></i></button>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">	
									<label for="nome">Nome:</label>
									<input type="text" name="nome" class="form-control" id="nome" value="<?=(isset($participante["nome"])?$participante["nome"]:"")?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">	
									<label for="telefone">Telefone:</label>
									<input type="text" name="telefone" class="form-control" id="telefone" value="<?=(isset($participante["telefone"])?$participante["telefone"]:"")?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">	
									<label for="celular">Celular:</label>
									<input type="text" name="celular" class="form-control" id="celular" value="<?=(isset($participante["celular"])?$participante["celular"]:"")?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">	
									<label for="email">E-mail:</label>
									<input type="text" name="email" class="form-control" id="email" value="<?=(isset($participante["email"])?$participante["email"]:"")?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">	
									<label for="rua">Rua:</label>
									<input type="text" name="rua" class="form-control" id="rua" value="<?=(isset($participante["rua"])?$participante["rua"]:"")?>">
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">	
									<label for="numero">Número:</label>
									<input type="text" name="numero" class="form-control" id="numero" value="<?=(isset($participante["numero"])?$participante["numero"]:"")?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">	
									<label for="bairro">Bairro:</label>
									<input type="text" name="bairro" class="form-control" id="bairro" value="<?=(isset($participante["bairro"])?$participante["bairro"]:"")?>">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">	
									<label for="cidade">Cidade:</label>
									<input type="text" name="cidade" class="form-control" id="cidade" value="<?=(isset($participante["cidade"])?$participante["cidade"]:"")?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">	
									<label for="complemento">Complemento:</label>
									<textarea name="complemento" class="form-control" id="complemento" ><?=(isset($participante["complemento"])?$participante["complemento"]:"")?></textarea>
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
		$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/modal.js"></script>';
		$scripts.='<script src="'.$GLOBALS["base_site"].'public/dist/js/participante.js"></script>';




