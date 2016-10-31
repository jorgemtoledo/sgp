

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Controle de Falta e Presença</h1>
                    <?php
                                $id_user = $this->session->userdata('id');
                                // echo $id_user;
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="col-lg-3 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-thumb-tack fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Cadastrar</div>
                                    <div>Falta/Presença</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>attendances/add">
                            <div class="panel-footer">
                                <span class="pull-left">Cadastrar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flag fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Listar Equipes</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('attendances/attendancesteam/'.$id_user); ?>">
                            <div class="panel-footer">
                                <span class="text-muted">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Dados & Grafico</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

        </div>
        <!-- /#page-wrapper -->







