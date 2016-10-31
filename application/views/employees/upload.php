<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Cadastrar Funcionarios da Empresa</h1>

		<h2 class="sub-header">Importar dados do Excel no formato CSV!</h2>

		<?php echo $error;?>

		<?php echo form_open_multipart('employees/do_upload');?>

		Selecione o arquivo:
		<input type="file" name="userfile" size="20" />

		<br />

		<input class="btn btn-primary" type="submit" value="Enviar">

		</form>




	</div>

</div>


