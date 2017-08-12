<div id="page-wrapper">
  <div class="row">
     <h1 class="page-header">Periodo de Experiencia dos Funcionários</h1>

      <div class="box box-primary">
      <div class="box-header">
        <!-- Botao voltar -->
        <a class="btn btn-primary" onClick="history.go(-1)" >
        <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
        <!-- Fim Botao voltar -->
      </div>
      </div><!-- /.view -->
    </div>

    <div class="row">

    <!-- Somente funcionarios com 45 dias de experiencia na empresa -->
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-square-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            1° PERÍODO DE EXPERIÊNCIA
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/experiencesOne">
                <div class="panel-footer">
                    <span class="text-warning">Listar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-warning"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-square-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            2° PERÍODO DE EXPERIÊNCIA
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/experiencesTwo">
                <div class="panel-footer">
                    <span class="text-primary">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-primary"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <!-- <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            Listar
                        </div>
                        <div> Exames Periódicos</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>employees/listExaminations">
                <div class="panel-footer">
                    <span class="text-success">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-success"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> -->

    <!-- <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            Geral
                        </div>
                        <div> Periódicos</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>employees/examinationschedule">
                <div class="panel-footer">
                    <span class="text-danger">Detalhes</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-danger"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div> -->



    </div>


</div>