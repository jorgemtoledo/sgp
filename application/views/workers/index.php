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

                                <a href="<?php echo base_url('certificates/typeLicense'); ?>" class="list-group-item">
                                    <i class="fa fa-file-text-o fa-fw"></i> Inss / Lic. Maternidade
                                    <span class="pull-right text-muted small"><em>Controle Formularios INSS / LIC.MATERNIDADE</em>
                                    </span>
                                </a>

                                <a href="<?php echo base_url('measures/index'); ?>" class="list-group-item">
                                    <i class="fa  fa-book"></i> Medidas Disciplinares
                                    <span class="pull-right text-muted small"><em>Controle de Medidas Disciplinares</em>
                                    </span>
                                </a>

                                <a href="<?php echo base_url('feedbacks/index'); ?>" class="list-group-item">
                                    <i class="fa  fa-check"></i> Feedbacks
                                    <span class="pull-right text-muted small"><em>Controle Feedbacks</em>
                                    </span>
                                </a>

                                <a href="<?php echo base_url('attendances/listholiday'); ?>" class="list-group-item">
                                    <i class="fa  fa-calendar"></i> Afastamento / Férias
                                    <span class="pull-right text-muted small"><em>Controle Afastamentos / Férias</em>
                                    </span>
                                </a>

                                <a href="<?php echo base_url('employees/examinations'); ?>" class="list-group-item">
                                    <i class="fa  fa-file-text-o"></i> Exames Periódicos
                                    <span class="pull-right text-muted small"><em>Controle Exames  Clinicos Periódicos</em>
                                    </span>
                                </a>

                                <a href="<?php echo base_url('experiences/'); ?>" class="list-group-item">
                                    <i class="fa  fa-pencil-square-o"></i> Periodo de Experiencia
                                    <span class="pull-right text-muted small"><em>Controle Periodo de Experiencia</em>
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


