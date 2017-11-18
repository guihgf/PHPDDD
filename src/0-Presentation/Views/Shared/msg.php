<?php
if(isset($_SESSION["msg_erro"])){

	?>
	<script type="text/javascript">alerta("Erro!",'<span style="color:red"><?=$_SESSION["msg_erro"]?></span>');</script>
	
	<?php 
}

if(isset($_SESSION["msg_ok"])){
	?>
	<script type="text/javascript">alerta("Sucesso!",'<?=$_SESSION["msg_ok"]?>');</script>
	<?php
}
$_SESSION["msg_ok"]=null;
$_SESSION["msg_erro"]=null;
?>