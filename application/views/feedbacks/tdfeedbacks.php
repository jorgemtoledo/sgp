<script src="<?php echo base_url('assets/bootstrap-3.1.1/js/charts/jsapi.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-3.1.1/js/charts/uds_api_contents.js') ?>"></script>
<div id="page-wrapper">
    <h1 class="page-header">Feedbacks da Equipe</h1>
    <!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
     <div class="row">

     <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Feedbacks por mês - <?php  $yearmeasures = date("Y");
                                                            echo $yearmeasures;
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
                                                        $this->db->where(1, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate1 = $this->db->count_all_results();
                                                        echo $countmeasuredate1;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(2, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate2 = $this->db->count_all_results();
                                                        echo $countmeasuredate2;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(3, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate3 = $this->db->count_all_results();
                                                        echo $countmeasuredate3;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(4, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate4 = $this->db->count_all_results();
                                                        echo $countmeasuredate4;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(5, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate5 = $this->db->count_all_results();
                                                        echo $countmeasuredate5;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(6, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate6 = $this->db->count_all_results();
                                                        echo $countmeasuredate6;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(7, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate7 = $this->db->count_all_results();
                                                        echo $countmeasuredate7;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(8, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate8 = $this->db->count_all_results();
                                                        echo $countmeasuredate8;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(9, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate9 = $this->db->count_all_results();
                                                        echo $countmeasuredate9;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(10, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate10 = $this->db->count_all_results();
                                                        echo $countmeasuredate10;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(11, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate11 = $this->db->count_all_results();
                                                        echo $countmeasuredate11;

                                            ?>
                                            </td>
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(12, 'MONTH(feedbacks.created)' , FALSE);
                                                        $this->db->where($yearmeasures, 'YEAR(feedbacks.created)' , FALSE);
                                                        $this->db->from('feedbacks');
                                                        $this->db->join('workers', 'workers.id = feedbacks.worker_id');
                                                        $countmeasuredate12 = $this->db->count_all_results();
                                                        echo $countmeasuredate12;

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
                                 Grafico Feedbacks do ano <?php  $yearmedicalcertificates = date("Y");
                                                            echo $yearmedicalcertificates;
                                                     ?> - EQUIPE:
                                 <?php echo $teamOne->tname; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php
                                        $jan = $countmeasuredate1;
                                        $fev = $countmeasuredate2;
                                        $mar = $countmeasuredate3;
                                        $abr = $countmeasuredate4;
                                        $mai = $countmeasuredate5;
                                        $jun = $countmeasuredate6;
                                        $jul = $countmeasuredate7;
                                        $ago = $countmeasuredate8;
                                        $set = $countmeasuredate9;
                                        $out = $countmeasuredate10;
                                        $nov = $countmeasuredate11;
                                        $dez = $countmeasuredate12;
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
                                            <td><a href="<?php echo base_url('feedbacks/feedreview/'.$team->wid); ?>"><?php echo $team->ename;?></a></td>
                                            <?php
                                                        $this->db->where('worker_id',$team->wid);
                                                        $this->db->from('feedbacks');
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
      ['Mês', 'Feedbacks'],
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
      title: 'Feedbacks por mes',
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