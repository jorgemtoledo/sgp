<div id="page-wrapper">
	<div class="row">
	<h1 class="page-header">Lista Equipes</h1>
	<!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
		<?php foreach($teams as $team) { ?>
			<a href="<?php echo base_url('attendances/checkteam/'.$team->tid); ?>"><p><?php echo $team->tname;?></p></a>
		<?php } ?>
	</div>

</div>