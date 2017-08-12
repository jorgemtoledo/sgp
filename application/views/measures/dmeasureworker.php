<div id="page-wrapper">
	<h1 class="page-header">Medidas disciplinares do(a) Funcionário(a)</h1>
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
                                            <th class="text-center">Data da Ocorrência</th>
                                            <th class="text-center">Total Afastamento</th>
                                            <th class="text-center">Tipo de Medida</th>
                                            <th class="text-center">Motivo</th>
                                            <th class="text-center"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($listMeasureEmployee as $listMeasureEmployees) { ?>
                                        <tr class="text-center">
                                            <td><?php echo $listMeasureEmployees->dmid;?></td>
                                            <td><?php echo $listMeasureEmployees->dmoccurrencedate;?></td>
                                            <td><?php echo $listMeasureEmployees->dmremoval;?></td>
                                            <td><?php echo $listMeasureEmployees->tmname;?></td>
                                            <td><?php echo $listMeasureEmployees->rmname;?></td>
                                            <td>
                                                <a href="<?php echo base_url('measures/view_measure/'.$listMeasureEmployees->dmid);  ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
                                            </td>
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