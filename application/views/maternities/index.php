<div id="page-wrapper">
    <div class="row">
        <h1 class="page-header">Afastamento Maternidade</h1>
        <div class="box-tools pull-right">
            <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-default" href="<?php echo base_url() ?>certificates/typeLicense/" >
                            <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a><br />
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <h2 class="sub-header">Dados</h2>
        <div class="table-responsive">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr>
                        <th><h6><strong>ID</strong></h6></th>
                        <th><h6><strong>Nome</strong></h6></th>
                        <th><h6><strong>Matricula</strong></h6></th>
                        <th><h6><strong>Data de Entrega</strong></h6></th>
                        <th><h6><strong>Data Inicio</strong></h6></th>
                        <th><h6><strong>Data Fim</strong></h6></th>
                        <th><h6><strong>CID</strong></h6></th>
                        <th><h6><strong>Criado</strong></h6></th>
                        <th><h6><strong>Ações</strong></h6></th>
                        <th><h6><strong></strong></h6></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($maternities as $maternity) { ?>
                        <tr>
                            <td><h6><?php echo $maternity['mcid']; ?></h6></td>
                            <td><h6><?php echo $maternity['ename']; ?></h6></td>
                            <td><h6><?php echo $maternity['eregistration']; ?></h6></td>
                            <td><h6>
                            <?php   $timestamp = strtotime(($maternity['mcdeliverydate']));
                                echo date('d/m/y', $timestamp);
                            ?></h6>
                            </td>
                            <td><h6>
                            <?php   $timestamp = strtotime(($maternity['mcstartcertificate']));
                                echo date('d/m/y', $timestamp);
                            ?></h6>
                            </td>
                            <td><h6>
                            <?php   $timestamp = strtotime(($maternity['mcfinishcertificate']));
                                echo date('d/m/y', $timestamp);
                            ?></h6>
                            </td>
                            <td><h6><?php echo $maternity['cname']; ?></h6></td>
                            <td><h6>
                            <?php   $timestamp = strtotime(($maternity['mccreated']));
                                echo date('d/m/y', $timestamp);
                            ?></h6>
                            </td>
                            <td><h6>
                            <?php
                            $mcid = $maternity['mcid'];
                            // echo $mcid;
                             $this->db->where('medical_certificate_id',$mcid);
                             $this->db->from('maternities');
                              $query = $this->db->get();
                                if($query->num_rows > 0 ) { ?>
                                    <a href="<?php echo base_url('maternities/edit/'.$maternity['mcid']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <?php foreach ($query->result() as $row) {
                                       $id_maternity =  $row->id;
                                       $status_maternity =  $row->finish_maternity;
                                        if($status_maternity != 0){
                                    ?>
                                    <a href="#" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-ok"></i></a>
                                    <a href="<?php echo base_url('maternities/delete/'.$id_maternity); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
                                    <?php    }else{ ?>
                                    <a href="#" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-warning-sign"></i></a>
                                    <a href="<?php echo base_url('maternities/delete/'.$id_maternity); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
                                    <?php }     } ?>

                            <?php } else { ?>
                                    <a href="<?php echo base_url('maternities/add/'.$maternity['mcid']); ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-list-alt"></i></a>
                            <?php } ?></h6>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php echo $pag; ?>
        </div>

    </div>

</div>


