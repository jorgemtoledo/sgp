<div id="page-wrapper">
  <div class="row">
     <h1 class="page-header">Lista 1° Período de Experiência</h1>

      <div class="box box-primary">
      <div class="box-header">
        <!-- Botao voltar -->
        <a href="<?php echo base_url('experiences'); ?>"  class="btn btn-primary">
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
                        <i class="fa fa-th-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            Funcionáros sem
                        </div>
                        <div>avaliação de Experiência</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/experListOne">
                <div class="panel-footer">
                    <span class="text-warning">Listar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-warning"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-edit fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            Editar ou Concluir
                        </div>
                        <div>Avaliação de Experiência</div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/editExpOne">
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
                        <i class="fa fa-check fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            Avaliação do Coordenador
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/editExpOneCood">
                <div class="panel-footer">
                    <span class="text-primary">Listar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-primary"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-search fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">
                            Avaliação do RH
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/editExpOneRH">
                <div class="panel-footer">
                    <span class="text-danger">Listar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-danger"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-save fa-5x"></i>
                    </div>
                    <div class="col-xs-12 text-right">
                        <div class="huge">
                            Avaliações finalizadas
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>experiences/listFinishOne">
                <div class="panel-footer">
                    <span class="text-warning">Listar</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right text-warning"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


    </div>


</div>