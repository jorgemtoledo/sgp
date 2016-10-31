<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Controle Funcionarios</h1>

		<div class="table-responsive">
			<form>
<?php $user_id = $this->session->userdata('id'); ?>
			<!-- /.col-lg-8 -->
                <div class="col-lg-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-cloud-download"></i> Controle Funcionarios
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="<?php echo base_url('workers/listworkers/'); ?>" class="list-group-item">
                                    <i class="fa fa-flag fa-fw"></i> Equipe ou Setor
                                    <span class="pull-right text-muted small"><em>Cadastrar o funcionário na equipe ou setor.</em>
                                    </span>
                                </a>

                                <a href="<?php echo base_url('certificates/index/'); ?>" class="list-group-item">
                                    <i class="fa fa-ambulance fa-fw"></i> Atestados Médicos
                                    <span class="pull-right text-muted small"><em>Controle de atestados médicos</em>
                                    </span>
                                </a>
                                <!-- <a href="<?php echo base_url('attendances/'); ?>" class="list-group-item">
                                    <i class="fa fa-file-text-o fa-fw"></i> Controle de faltas
                                    <span class="pull-right text-muted small"><em>Controle de faltas do funcionário</em>
                                    </span>
                                </a> -->
                    		</div>
                    	</div>
                	</div>
                </div>

                            <!-- /.list-group -->

			</form>
		</div>

		

	</div>

</div>


