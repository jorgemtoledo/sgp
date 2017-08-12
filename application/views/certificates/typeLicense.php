

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tipos de Afastamento</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="col-lg-3 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-paste fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="text-warning">Afastamento</div>
                                    <div>Maternidade</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>maternities/index">
                            <div class="panel-footer">
                                <span class="text-warning">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-warning"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-hospital-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>INSS</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="text-danger">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-danger"></i></span>
                            </div>
                        </a>
                    </div>
                </div>



                <!-- Start List Ranking -->
                <?php
                $data_atual = date('d/m/Y');
                $matricula = date ("y-m-d");
                $date_now = date('Y-m-d');
                // Calcula a data daqui 60 dias
                $timestamp = strtotime($matricula . "-60 days");
                $date_old = date('Y-m-d', $timestamp);
                $convert_date_old = date('d/m/Y', $timestamp);
                // echo $convert_date_old;
                ?>

                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading">Quantitativo de dias afastados por Funcionario. Período 60 dias / <span class="label label-danger">Data início:  <?php echo $convert_date_old; ?></span> - <span class="label label-danger">Data atual: <?php echo $data_atual; ?></span></div>
                <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome do Agente</th>
                            <th>Empresa</th>
                            <th>Equipe</th>
                            <th>Dias</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($days as $day) {
                            if($day->number_day >= 15){
                        ?>

                         <tr>
                            <td class="danger"><?php echo $day->WID; ?></td>
                            <td class="danger"><?php echo $day->ENAME; ?></td>
                            <td class="danger"><?php echo $day->CNAME; ?></td>
                            <td class="danger"><?php echo $day->TNAME; ?></td>
                            <td class="danger"><span class="label label-danger"><?php echo $day->number_day; ?></span>  <a href="<?php echo base_url(); ?>medical_certificates/reviewall/<?php echo $day->WID; ?>"
                            class="btn btn-default btn-xs" role="button" aria-pressed="true" target="popup"
                            onclick="window.open('<?php echo base_url(); ?>medical_certificates/reviewall/<?php echo $day->WID; ?>',
                            'popup','width=1000,height=1000'); return false;"><span class="glyphicon glyphicon-search"></span></a></td>
                        </tr>
                        <?php } else { ?>
                        <tr>
                            <td><?php echo $day->WID; ?></td>
                            <td><?php echo $day->ENAME; ?></td>
                            <td><?php echo $day->CNAME; ?></td>
                            <td><?php echo $day->TNAME; ?></td>
                            <td><?php echo $day->number_day; ?>
                            <a href="<?php echo base_url(); ?>medical_certificates/reviewall/<?php echo $day->WID; ?>"
                            class="btn btn-default btn-xs" role="button" aria-pressed="true" target="popup"
                            onclick="window.open('<?php echo base_url(); ?>medical_certificates/reviewall/<?php echo $day->WID; ?>',
                            'popup','width=1000,height=1000'); return false;"><span class="glyphicon glyphicon-search"></span></a>
                            </td>
                        </tr>
                        <?php }} ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
                </div>
                </div>

                <!-- Finish List Ranking -->

        </div>
        <!-- /#page-wrapper -->




