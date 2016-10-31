<script src="<?php echo base_url('assets/bootstrap-3.1.1/js/charts/jsapi.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-3.1.1/js/charts/uds_api_contents.js') ?>"></script>
<div id="page-wrapper">
	<h1 class="page-header">Atestados da Equipe</h1>
    <!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
	 <div class="row">

     <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Atestados por mês - <?php  $yearmedicalcertificates = date("Y");
                                                            echo $yearmedicalcertificates;
                                                     ?> - EQUIPE:
                                 <?php echo $teamOne->tname; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Janeiro</th>
                                            <th>Fevereiro</th>
                                            <th>Março</th>
                                            <th>Abril</th>
                                            <th>Maio</th>
                                            <th>Junho</th>
                                            <th>Julho</th>
                                            <th>Agosto</th>
                                            <th>Setembro</th>
                                            <th>Outubro</th>
                                            <th>Novembro</th>
                                            <th>Dezembro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(1, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate1 = $this->db->count_all_results();
                                                        echo $countmedicaldate1;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(2, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate2 = $this->db->count_all_results();
                                                        echo $countmedicaldate2;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(3, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate3 = $this->db->count_all_results();
                                                        echo $countmedicaldate3;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(4, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate4 = $this->db->count_all_results();
                                                        echo $countmedicaldate4;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(5, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate5 = $this->db->count_all_results();
                                                        echo $countmedicaldate5;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(6, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate6 = $this->db->count_all_results();
                                                        echo $countmedicaldate6;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(7, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate7 = $this->db->count_all_results();
                                                        echo $countmedicaldate7;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(8, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate8 = $this->db->count_all_results();
                                                        echo $countmedicaldate8;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(9, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate9 = $this->db->count_all_results();
                                                        echo $countmedicaldate9;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(10, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate10 = $this->db->count_all_results();
                                                        echo $countmedicaldate10;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(11, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate11 = $this->db->count_all_results();
                                                        echo $countmedicaldate11;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(12, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate12 = $this->db->count_all_results();
                                                        echo $countmedicaldate12;

                                            ?>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>


                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Grafico Atestados do ano <?php  $yearmedicalcertificates = date("Y");
                                                            echo $yearmedicalcertificates;
                                                     ?> - EQUIPE:
                                 <?php echo $teamOne->tname; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php
                                        $jan = $countmedicaldate1;
                                        $fev = $countmedicaldate2;
                                        $mar = $countmedicaldate3;
                                        $abr = $countmedicaldate4;
                                        $mai = $countmedicaldate5;
                                        $jun = $countmedicaldate6;
                                        $jul = $countmedicaldate7;
                                        $ago = $countmedicaldate8;
                                        $set = $countmedicaldate9;
                                        $out = $countmedicaldate10;
                                        $nov = $countmedicaldate11;
                                        $dez = $countmedicaldate12;
                                ?>
                                <!-- Add Charts -->
                                <div id="chart_div3"></div>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>


                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Atestados da Equipe:
                            <?php echo $teamOne->tname; ?> - Total por Agente/Funcionario
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NOME</th>
                                            <th class="text-center">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($teams as $team) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $team->wid;?></td>
                                            <td><a href="<?php echo base_url('tasks/tskmedcertworker/'.$team->wid); ?>"><?php echo $team->ename;?></a></td>
                                            <?php
                                                        $this->db->where('worker_id',$team->wid);
                                                        $this->db->from('medical_certificates');
                                                        $count = $this->db->count_all_results();

                                            ?>
                                            <?php if ($count <= 0) { ?>
                                            <td class="text-center"><span class="label label-pill label-success">
                                    		<?php
												echo $count;
                                            } if ($count > 0 && $count <= 5) { ?>
                                            <td class="text-center"><span class="label label-pill label-warning">
                                            <?php
                                                echo $count;
                                                } elseif ($count >= 6) {?>
                                            <td class="text-center"><span class="label label-pill label-danger">
                                            <?php
                                                echo $count;
                                            }
	                                        ?>
                                            </span></td>
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


<script type="text/javascript">
  google.load("visualization", "1.1", {packages: ["bar"]});
  google.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Mês', 'Atestados'],
      ['Janeiro',  <?= $jan; ?>],
      ['Fevereiro',  <?= $fev; ?>],
      ['Março',  <?= $mar; ?>],
      ['Abril',  <?= $abr; ?>],
      ['Maio',  <?= $mai; ?>],
      ['Junho',  <?= $jun; ?>],
      ['Julho',  <?= $jul; ?>],
      ['Agosto',  <?= $ago; ?>],
      ['Setembro',  <?= $set; ?>],
      ['Outubro',  <?= $out; ?>],
      ['Novembro',  <?= $nov; ?>],
      ['Dezembro',  <?= $dez; ?>]
    ]);
    var options = {
      title: 'Atestados por mes',
      width: 850,
      height: 400,
      legend: {
            position: 'none'
        },
    };
    var chart = new google.charts.Bar(document.getElementById('chart_div3'));
    chart.draw(data, options);
  }
</script>