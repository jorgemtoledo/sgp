<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Informações do Funcionario de Medidas Disciplinares</h1>

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
                                            $query = $this->db->get('disciplinary_measures');
                                            $query = $this->db->get_where('disciplinary_measures', array('worker_id' => $worker_id));

                                            foreach ($query->result() as $row)
                                            {
                                                // echo $row->id . " - ";
                                            }

                                            echo "<br />";
                                            $this->db->select('*');
                                            $this->db->where('worker_id', $worker_id);
                                            $query = $this->db->get('disciplinary_measures');
                                            // echo $num = $query->num_rows() . " quantidade";
                                    ?>

                    <div class="col-md-10">
                    <div class="panel-body">
                            <div class="alert alert-danger">
                                O funcionário(a) <?php echo $result->ename   ?> tem no total  <a href="#" class="alert-link"><?php echo $num = $query->num_rows(); ?></a> medidas disciplinares cadastrado no sistema.
                            </div>
                    </div>
                    <h1 class="page-header">Medidas Disciplinares</h1>


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
                                                            <th class="text-center">Data da Ocorrência</th>
                                                            <th class="text-center">Total Afastamento</th>
                                                            <th class="text-center">Inicio Afastamento</th>
                                                            <th class="text-center">Fim Afastamento</th>
                                                            <th class="text-center">Retorno</th>
                                                            <th class="text-center">Entrega no RH</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $query2 = $this->db->get('disciplinary_measures');
                                                        $query2 = $this->db->order_by("id", "desc");
                                                        $query2 = $this->db->get_where('disciplinary_measures', array('worker_id' => $worker_id));
                                                     ?>
                                                    <?php foreach ($query2->result() as $results) { ?>
                                                    <tbody>

                                                    <td  class="text-center"><?php echo $results->id ; ?></td>
                                                    <td  class="text-center"><?php echo $results->occurrence_date ; ?></td>
                                                    <td  class="text-center"><?php echo $results->removal ; ?></td>
                                                    <td  class="text-center">
                                                    <?php
                                                        $datemeasure1 = $results->removal_start;
                                                        $datemeasure2 = 0000-00-00;
                                                        if($datemeasure1 == $datemeasure2 ){
                                                            echo "Nenhuma data";
                                                        } else {
                                                            $timestamp = strtotime(($results->removal_start));
                                                            echo date('d/m/y', $timestamp);
                                                        }
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php
                                                        $datemeasure1 = $results->removal_finish;
                                                        $datemeasure2 = 0000-00-00;
                                                        if($datemeasure1 == $datemeasure2 ){
                                                            echo "Nenhuma data";
                                                        } else {
                                                            $timestamp = strtotime(($results->removal_finish));
                                                            echo date('d/m/y', $timestamp);
                                                        }
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php
                                                        $datemeasure1 = $results->return_date;
                                                        $datemeasure2 = 0000-00-00;
                                                        if($datemeasure1 == $datemeasure2 ){
                                                            echo "Nenhuma data";
                                                        } else {
                                                            $timestamp = strtotime(($results->return_date));
                                                            echo date('d/m/y', $timestamp);
                                                        }
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php
                                                        $datemeasure1 = $results->delivery_date;
                                                        $datemeasure2 = 0000-00-00;
                                                        if($datemeasure1 == $datemeasure2 ){
                                                            echo "Nenhuma data";
                                                        } else {
                                                            $timestamp = strtotime(($results->delivery_date));
                                                            echo date('d/m/y', $timestamp);
                                                        }
                                                    ?>
                                                    </td>

                                                    <td>
                                                    <a href="<?php echo base_url('measures/view_measure/'.$results->id);  ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
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