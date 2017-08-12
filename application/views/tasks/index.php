

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Atividades Operação</h1>
                    <?php
                                $id_user = $this->session->userdata('id');
                                //echo $id_user;
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
                            if($level == 1 || $level == 2 ||$level == 3 || $level == 4 ) {
                ?>
                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-file-text-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Listar Atestado</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('tasks/taskteammedcertificates/'.$id_user); ?>">
                            <div class="panel-footer">
                                <span class="text-muted">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted"></i></span>
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
                                    <i class="fa  fa-files-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Listar Medidas Disciplinares</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('measures/teammeasures/'.$id_user); ?>">
                            <div class="panel-footer">
                                <span class="text-muted">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumb-tack fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Controle de Presença</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('attendances/'); ?>">
                            <div class="panel-footer">
                                <span class="text-warning">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted text-warning"></i></span>
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
                                    <i class="fa  fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Aniversariantes</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('tasks/taskbirthdays/'.$id_user); ?>">
                            <div class="panel-footer">
                                <span class="text-muted">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted"></i></span>
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
                            if($level == 1 || $level == 2 ||$level == 3 ) {
                ?>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-flag fa-fw fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Funcionário Equipe/Setor</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('workers/listworkers/'); ?>">
                            <div class="panel-footer">
                                <span class="text-muted">Cadastrar / Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted"></i></span>
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
                            if($level == 1 || $level == 2 ||$level == 3 || $level == 4 ) {
                ?>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-exclamation-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Listar Feedbacks</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('feedbacks/teamfeedbacks/'.$id_user); ?>">
                            <div class="panel-footer">
                                <span class="text-muted">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-muted"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <?php } ?>

                <div class="col-lg-3 col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-bar-chart-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div>Planejamento</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url('attendances/'); ?>">
                            <div class="panel-footer">
                                <span class="text-warning">Listar</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-warning"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

        </div>
        <!-- /#page-wrapper -->







