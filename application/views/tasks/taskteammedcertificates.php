<div id="page-wrapper">
	<div class="row">
	<h1 class="page-header">Atestados da Equipe</h1>
	<!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
		<?php foreach($teams as $team) { ?>
			<a href="<?php echo base_url('tasks/taskmedcertificates/'.$team->tid); ?>"><p><?php echo $team->tname;?></p></a>
		<?php } ?>
	</div>

</div>