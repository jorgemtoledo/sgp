<div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>dashboard">SGP - Contato</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down">
                            <?php
                                $name = $this->session->userdata('name');
                                echo $name;
                                $id_user = $this->session->userdata('id');
                                //echo $id_user;
                                $this->db->where('id',$id_user);
                                $this->db->from('users');
                                  $query = $this->db->get();
                                  if($query->num_rows > 0 ) {
                                    foreach ($query->result() as $row) {
                                      //echo $row->level;
                                    }
                                  }
                            ?>
                        </i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> Dados Usuário</a> -->
                        </li>
                        <li><a href="<?php echo base_url('users/myEdit/'.$id_user); ?>"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url() ?>dashboard/logout"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
