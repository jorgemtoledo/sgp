<div id="page-wrapper">
	<div class="row">
	<h1 class="page-header">Aniversariantes</h1>
	<!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
	</div>

	<div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-gift fa-fw"></i> Aniversariantes do Mês - <?php echo $date = date('d/m/Y'); ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">

                            	<?php foreach($teams as $team) { ?>
									 <a href="#" class="list-group-item info">
									 <?php $day = date('d');
									 	if($day !=$team->dia){
									 		echo $team->dia;?> - <?php echo $team->ename;
									 	} else { ?>
									 		<i class="fa fa-gift fa-fw"></i> <strong><em><?php echo $team->dia;?> - <?php echo $team->ename;?></em></strong>
									 	<?php }?>

                                    <span class="pull-right text-muted small"><em>Equipe: <?php echo $team->tname;?></em>
                                    </span>
                                </a>
								<?php } ?>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>

</div>