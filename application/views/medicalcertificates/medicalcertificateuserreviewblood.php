<div id="page-wrapper">
  <div class="row">
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

                    <div class="col-md-12">
                      <h1 class="page-header">Informações do Funcionario</h1>
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
                                                            <th class="text-center">Tipo de Atestado</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $this->db->select('mc.id as mcid,
                                                        mc.user_id as mcuser,
                                                        mc.worker_id as mcworker,
                                                        mc.delivery_date as mcdeliverydate,
                                                        mc.start_certificate as mcstartcertificate,
                                                        mc.finish_certificate as mcfinishcertificate,
                                                        mc.day_off_id as mcdayoffid,
                                                        mc.number_day as mcnumberday,
                                                        mc.type_certificate_id as mctypecertificate,
                                                        mc.cid_id as mccid,
                                                        mc.accredit as mcaccredit,
                                                        mc.doctor_id as mcdoctor,
                                                        mc.health_station_id as mchealthstation,
                                                        mc.description as mcdescription,
                                                        mc.inss as mcinss,
                                                        mc.maternity_leave as mcmaternity_leave,
                                                        mc.created as mccreated,
                                                        mc.modified as mcmodified,
                                                        tp.id as tpid,
                                                        tp.name as tpname');
                                                        $this->db->from('medical_certificates as mc');
                                                        $this->db->join('type_certificates as tp', 'tp.id = mc.type_certificate_id','inner');
                                                        $this->db->where('mc.worker_id', $worker_id);
                                                        $this->db->where('mc.type_certificate_id', 8);
                                                        $this->db->order_by("mc.id", "desc");
                                                        $query2 = $this->db->get();
                                                     ?>
                                                    <?php foreach ($query2->result() as $results) { ?>
                                                    <tbody>

                                                    <td  class="text-center"><?php echo $results->mcid ; ?></td>
                                                    <td  class="text-center">
                                                    <?php   $timestamp = strtotime(($results->mcdeliverydate));
                                                        echo date('d/m/y', $timestamp);
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php   $timestamp = strtotime(($results->mcstartcertificate));
                                                        echo date('d/m/y', $timestamp);
                                                    ?>
                                                    </td>
                                                    <td  class="text-center">
                                                    <?php   $timestamp = strtotime(($results->mcfinishcertificate));
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
                                                    <?php echo $results->mcnumberday; ?>
                                                    </td>
                                                    <td class="text-center">
                                                    <?php
                                                    $accredit = 1;
                                                        if ($accredit == $results->mcaccredit) {
                                                            echo "<span class='label label-success'>Sim</span>";
                                                        } else {
                                                            echo "<span class='label label-danger'>Não</span>";
                                                        }
                                                    ?>
                                                    </td>

                                                    <td class="text-center">
                                                    <?php echo $results->tpname; ?>
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