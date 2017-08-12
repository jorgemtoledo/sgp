<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Informações do Funcionario</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>medical_certificates/listmedicalcertificates" ><i class="glyphicon glyphicon-list-alt"></i>   Listar </a>
          </div>
          <div>
                <input type="button" class="btn btn-primary"  value="Voltar" onClick="history.go(-1)"> 
          </div>

          <div class="box box-primary">

          <div class="span12">

        <div class="widget-box">
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                                 <strong>
                                    <?php
                                            $worker_id = $result->wid;
                                            $query = $this->db->get('medical_certificates');
                                            $query = $this->db->get_where('medical_certificates', array('worker_id' => $worker_id));

                                            foreach ($query->result() as $row)
                                            {
                                                // echo $row->id . " - ";
                                            }

                                            echo "<br />";
                                            $this->db->select('*');
                                            $this->db->where('worker_id', $worker_id);
                                            $query = $this->db->get('medical_certificates');
                                            // echo $num = $query->num_rows() . " quantidade";
                                    ?>

                    <div class="col-md-10">
                    <div class="panel-body">
                            <div class="alert alert-danger">
                                O funcionário(a) <?php echo $result->ename   ?> tem no total  <a href="#" class="alert-link"><?php echo $num = $query->num_rows(); ?></a> atestados cadastrado no sistema.
                            </div>
                    </div>
                    <h1 class="page-header">Atestados</h1>
                      

                       <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <i class="fa fa-list-alt"></i>  Lista
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="list-group">
                                                <table id="Companies" class="table table-bordered table-striped">
                                                  <table class="table table-striped" id="table_id">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">ID</th>
                                                            <th class="text-center">Data Entrega</th>
                                                            <th class="text-center">Data Inicio Afastamento</th>
                                                            <th class="text-center">Data Fim Afastamento</th>
                                                            <th class="text-center">Qtd Dias</th>
                                                            <th class="text-center">Abona Falta?</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $query2 = $this->db->get('medical_certificates');
                                                        $query2 = $this->db->order_by("id", "desc");
                                                        $query2 = $this->db->get_where('medical_certificates', array('worker_id' => $worker_id));
                                                     ?>
                                                    <?php foreach ($query2->result() as $results) { ?>
                                                    <tbody>

                                                    <td  class="text-center"><?php echo $results->id ; ?></td>
                                                    <td  class="text-center">
                                                    <?php   $timestamp = strtotime(($results->delivery_date));
                                                        echo date('d/m/y', $timestamp);
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php   $timestamp = strtotime(($results->start_certificate));
                                                        echo date('d/m/y', $timestamp);
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php   $timestamp = strtotime(($results->finish_certificate));
                                                        $timeFinish = date('d/m/y', $timestamp);
                                                        // echo $timeFinish;
                                                        if($timeFinish == '31/12/69'){
                                                            echo "<p class='text-danger'>Sem Data</p>";
                                                        } else {
                                                            echo $timeFinish;
                                                        }
                                                    ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <?php echo $results->number_day; ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <?php
                                                    $accredit = 1;
                                                        if ($accredit == $results->accredit) {
                                                            echo "<span class='label label-success'>Sim</span>";
                                                        } else {
                                                            echo "<span class='label label-danger'>Não</span>";
                                                        }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <a href="<?php echo base_url('medical_certificates/view/'.$results->id);  ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                    </td>

                                                    <?php } ?>
                                                    </tbody>


                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                          </div>

                        </ul>

                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>

            
          </div><!-- /.view -->
          </div>
        </div>
        </div>