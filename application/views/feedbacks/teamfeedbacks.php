<div id="page-wrapper">
	<div class="row">
	<h1 class="page-header">Feedbacks das Equipe</h1>
	<!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>

    <a class="btn btn-success" href="<?php echo base_url() ?>feedbacks/manager_feedbacks_add" >
                            <i class="glyphicon glyphicon-plus"></i>  Feedback</a><br><br>
    <!-- Fim Botao voltar -->
		<?php foreach($teams as $team) { ?>
			<a href="<?php echo base_url('feedbacks/tdfeedbacks/'.$team->tid); ?>"><p><?php echo $team->tname;?></p></a>
		<?php } ?>
	</div>

</div>