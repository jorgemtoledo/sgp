

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

            <?php
                        $name = $this->session->userdata('name');
                        // echo $name;
                        $id_user = $this->session->userdata('id');
                        //echo $id_user;
                        $this->db->where('id',$id_user);
                        $this->db->from('users');
                          $query = $this->db->get();
                          if($query->num_rows > 0 ) {
                            foreach ($query->result() as $row) {
                              // echo $row->level;
                            }
                          }
                          $level = $row->level;
                            if($level == 1 || $level == 2 || $level == 3 || $level == 4) {
                ?>

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
                        <!-- <a href="<?php echo base_url(); ?>attendances/listAttendances"> -->
                        <a href="<?php echo base_url(); ?>attendances/listPeriod">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php } ?>

                <?php
                        $name = $this->session->userdata('name');
                        // echo $name;
                        $id_user = $this->session->userdata('id');
                        //echo $id_user;
                        $this->db->where('id',$id_user);
                        $this->db->from('users');
                          $query = $this->db->get();
                          if($query->num_rows > 0 ) {
                            foreach ($query->result() as $row) {
                              // echo $row->level;
                            }
                          }
                          $level = $row->level;
                            if($level == 5 || $level == 1 || $level == 2 || $level == 3) {
                ?>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-thumb-tack fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Controle Presença</div>
                                    <div>Planejamento</div>
                                </div>
                            </div>
                        </div>
                        <!-- <a href="<?php echo base_url(); ?>attendances/listAttendances"> -->
                        <a href="<?php echo base_url(); ?>attendances/listPeriodPlanning">
                            <div class="panel-footer">
                                <span class="text-danger">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-danger"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <?php } ?>

                <?php
                        $name = $this->session->userdata('name');
                        // echo $name;
                        $id_user = $this->session->userdata('id');
                        //echo $id_user;
                        $this->db->where('id',$id_user);
                        $this->db->from('users');
                          $query = $this->db->get();
                          if($query->num_rows > 0 ) {
                            foreach ($query->result() as $row) {
                              // echo $row->level;
                            }
                          }
                          $level = $row->level;
                            if($level == 1) {
                ?>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-minus-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Legenda do Controle</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>attendances/typeAttendances">
                            <div class="panel-footer">
                                <span class="text-warning">Cadastrar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-warning"></i></span>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>

                <!-- <div class="col-lg-3 col-md-4">
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
                </div> -->



                <!-- <div class="col-lg-3 col-md-4">
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
                </div> -->

        </div>
        <!-- /#page-wrapper -->







