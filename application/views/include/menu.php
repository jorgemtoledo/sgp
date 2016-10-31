 <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">

                    <li>
                        <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <!-- <li>
                        <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                    </li> -->
                    <!-- <li>
                        <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li> -->
                     <!-- Level User -->
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
                        switch ($level) {
                            case 1: ?>
                    <!-- Level Administrador -->
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Cadastros Sistema<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>companies">Empresas</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>operations">Departamentos</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>teams">Equipes</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>situations">Situação</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>jobs">Cargos</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>employees">Funcionarios</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>users">Usuários</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> Controle RH<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>workers">Funcionário por Equipe/Setor</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <?php
                            break;
                            case 2:
                    ?>
                    <!-- Level RH -->
                    <!-- Nao crud empresa e nem usuarios do Sistema -->
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Cadastros Sistema<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>companies">Empresas</a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url(); ?>operations">Operações</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>teams">Equipes</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>situations">Situação</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>jobs">Cargos</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>employees">Funcionarios</a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo base_url(); ?>users">Usuários</a>
                            </li> -->
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i> Controle RH<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url(); ?>workers">Funcionário por Equipe/Setor</a>
                            </li>
                            <!-- <li>
                                <a href="#">Second Level Item</a>
                            </li> -->
                            <!-- <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level
                            </li> -->
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <?php
                                break;
                            case 3:
                    ?>
                    <!-- Coordenador/Analista -->
                    <!-- Nao crud no Sistema -->

                    <!-- Supervisor -->
                    <!-- Nao crud no Sistema -->
                    <?php
                            break;
                            case 4:
                                //echo "i equals 2";
                                break;
                    ?>

                    <!-- Operador -->
                    <?php
                            case 5:
                                //echo "i equals 2";
                                break;
                    ?>

                    <?php
                            case 6:
                               // echo "Nao tem level";
                                break;
                            default:
                               //echo "i is not equal to 0, 1 or 2";
                        }
                    ?>



                    <li>
                        <a href="<?php echo base_url(); ?>tasks"><i class="fa fa-tasks fa-fw"></i> Controle Operação</a>
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->