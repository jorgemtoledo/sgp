<div id="page-wrapper">
    <h1 class="page-header">Feedbacks do(a) Funcionário(a)</h1>
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
                                            <th class="text-center">Gestor(a)</th>
                                            <th class="text-center">Funcionario(a)</th>
                                            <th class="text-center">Data</th>
                                            <th class="text-center">Motivo Feedback</th>
                                            <th class="text-center"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($listEditFeedbacks2 as $listEditFeedback) { ?>
                                        <tr class="text-center">
                                            <td><h6><?php echo $listEditFeedback->fid;?></h6></td>
                                            <td><h6><?php echo $listEditFeedback->fmanager;?></h6></td>
                                            <td><h6><?php echo $listEditFeedback->ename;?></h6></td>

                                            <td><h6>
                                                <?php
                                                    $datefeedback1 = $listEditFeedback->fcreated;
                                                    $datefeedback2 = 0000-00-00;
                                                    if($datefeedback1 == $datefeedback2 ){
                                                        echo "Nenhuma data";
                                                    } else {
                                                        $timestamp = strtotime(($listEditFeedback->fcreated));
                                                        echo date('d/m/y', $timestamp);
                                                    }
                                                ?></h6>
                                            </td>
                                            <td><h6><?php echo $listEditFeedback->tpname;?></h6></td>
                                            <td>
                                                <a href="<?php echo base_url('feedbacks/view_feedback/'.$listEditFeedback->fid);  ?>" class="btn btn-default btn-xs""><i class="glyphicon glyphicon-eye-open"></i></a>
                                                <a href="<?php echo base_url('feedbacks/view_feedbackPDF/'.$listEditFeedback->fid);  ?>" class="btn btn-warning btn-xs""><i class="glyphicon glyphicon-print"></i></a>
                                                <a href="<?php echo base_url('feedbacks/feedback_edit/'.$listEditFeedback->fid);  ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
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


