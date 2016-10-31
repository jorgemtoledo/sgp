<div id="page-wrapper">
	<h1 class="page-header">Atestados do(a) Funcionário(a)</h1>
    <!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
	 <div class="row">

     <div class="col-lg-12">
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php foreach($listWorker as $worker) { ?>

                                <td class="text-center"><?php echo $worker->ename;?></td>

                            <?php } ?>
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


                        ?>


                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Tipo Atestado</th>
                                            <th class="text-center">Abona a Falta?</th>
                                            <th class="text-center">Data Entrega</th>
                                            <th class="text-center">Data Inicio Afastamento</th>
                                            <th class="text-center">Data Fim Afastamento</th>
                                            <?php if($level == 1 || $level == 2 || $level == 3){ ?>
                                            <th class="text-center"></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($listTaskEmployee as $listTaskEmployees) { ?>
                                        <tr class="text-center">
                                            <td><?php echo $listTaskEmployees->mcid;?></td>
                                            <td><?php echo $listTaskEmployees->tpname;?></td>
                                            <td>
                                                <?php
                                                    $mcaccredit = 1;
                                                    if ($mcaccredit == $listTaskEmployees->mcaccredit) {
                                                    echo "<span class='label label-success'>Sim</span>";
                                                    } else {
                                                    echo "<span class='label label-danger'>Não</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $mccreated = strtotime(($listTaskEmployees->mcdeliverydate));
                                                    echo date('d/m/Y', $mccreated);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $mccreated = strtotime(($listTaskEmployees->mcstartcertificate));
                                                    echo date('d/m/Y', $mccreated);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $mccreated = strtotime(($listTaskEmployees->mcfinishcertificate));
                                                    echo date('d/m/Y', $mccreated);
                                                ?>
                                            </td>
                                            <?php if($level == 1 || $level == 2 || $level == 3){ ?>
                                            <td>
                                                <a href="<?php echo base_url('tasks/view/'.$listTaskEmployees->mcid);  ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            </td>
                                            <?php } ?>
                                            
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

</div>