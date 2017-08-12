<div id="page-wrapper">
    <div class="row">
        <h1 class="page-header">Lista Feedbacks</h1>
        <div class="box-tools pull-right">
            <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>"  />

                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>feedbacks/feedbacks_add" >
                            <i class="glyphicon glyphicon-plus"></i>  Feedback</a>
                            <!-- <a class="btn btn-warning" href="<?php echo base_url() ?>feedbacks/exp_excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a> -->

                            <br />
                        </div>
                        <div class="form-group">

                        </div>

                    </div>
                </div>
            </form>
        </div>

        <a class="btn btn-primary" href="<?php echo base_url() ?>feedbacks" >
                            <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a><br />
        <div class="table-responsive">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr>
                        <th><h6><strong>ID</strong></h6></th>
                        <th><h6><strong>Gestor(a)</strong></h6></th>
                        <th><h6><strong>Funcionario(a)</strong></h6></th>
                        <th><h6><strong>Data</strong></h6></th>
                        <th><h6><strong>Motivo Feedback</strong></h6></th>
                        <th><h6><strong>Cadastrado Por</strong></h6></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($feedbacks as $feedback) { ?>
                        <tr>
                            <td><h6><?php echo $feedback['fid']; ?></h6></td>
                            <td><h6><?php echo $feedback['fmanager']; ?></h6></td>
                            <td><h6><?php echo $feedback['ename']; ?></h6></td>
                            <td>
                            <h6>
                            <?php
                                $datemeasure1 = $feedback['fcreated'];
                                $datemeasure2 = 0000-00-00;
                                if($datemeasure1 == $datemeasure2 ){
                                    echo "Nenhuma data";
                                } else {
                                    $timestamp = strtotime(($feedback['fcreated']));
                                    echo date('d/m/y', $timestamp);
                                }
                            ?>
                            </h6>
                            </td>
                            <td><h6><?php echo $feedback['tpname']; ?></h6></td>
                            <td><h6><?php echo $feedback['uname']; ?></h6></td>

                            <td>
                            <a href="<?php echo base_url('feedbacks/view_feedback/'.$feedback['fid']);  ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="<?php echo base_url('feedbacks/view_feedbackPDF/'.$feedback['fid']);  ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-print"></i></a>
                              <a href="<?php echo base_url('feedbacks/feedreview/'.$feedback['wid']);  ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-search"></i></a>
                             <a href="<?php echo base_url('feedbacks/feedback_edit/'.$feedback['fid']);  ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="<?php echo base_url('feedbacks/delete_feedback/'.$feedback['fid']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php echo $pag; ?>
        </div>

    </div>

</div>


