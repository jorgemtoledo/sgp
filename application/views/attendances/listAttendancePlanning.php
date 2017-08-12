<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informações Equipes na Operação</h1>
            <!-- Botao voltar -->
            <a class="btn btn-primary" onClick="history.go(-1)" >
            <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
            <!-- Fim Botao voltar -->
            </div></ul>
            </div>
        </div>
    </div>
</div>
</div>

<?php
            $name = $this->session->userdata('name');
    // echo $name;
    $id_user = $this->session->userdata('id');
    //echo $id_user;
    $this->db->where('id',$id_user);
    $this->db->from('users');
      $query = $this->db->get();
?>

<div class="col-lg-12">
  <div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-signal"></i> Dados da Equipe no Controle - <strong><?php echo $day; ?> / <?php echo $month; ?> / <?php echo $year; ?></strong>
    </div><br />
      <div class="col-lg-12">
      <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
         <thead>

         <tr align="center">
            <td><strong>EQUIPES/SETOR </strong></td>
        <?php
            $this->db->select('*');
            $query_type = $this->db->get('type_attendances');
            $num = $query_type->num_rows();
             foreach ($query_type->result() as $row)
            {
                 echo "<td><strong> " . $row->sgl ."</strong> </td>";
                //$wid = $row->wid;
                // echo "<td>" . $row->wid ."</td>";
            }
        ?>

          <td><strong> TOTAL </strong></td>
          <td><strong> PLANEJADO </strong></td>
          <td><strong> REAL </strong></td>

          <td><strong> ABS </strong></td>

         </tr>
         </thead>
         <tbody>
<?php
            $this->db->select('
          TS.id as wid,
          TS.team_id as wteam,
          TS.user_id as wuser,
          U.id as uid,
          U.name as uname,
          T.id as tid,
          T.name as tname');
             $this->db->join('users as U', 'U.id = TS.user_id','inner');
             $this->db->join('teams as T', 'T.id = TS.team_id','inner');
             $this->db->where('TS.user_id',$id_user);
             $this->db->order_by('tname', 'ASC');
            $query_Planning = $this->db->get('teams_users as TS');
             //echo $num = $query->num_rows() . " quantidade";
             foreach ($query_Planning->result() as $row)
            {

        ?>
         <tr align="center">
            <td><h6><?php echo $row->tname; ?></h6> </td>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 1);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id1 = $this->db->get('attendances');
                  $num_at1 = $queryType_id1->num_rows();
                  echo "<td>" .$num_at1 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 2);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id2 = $this->db->get('attendances');
                  $num_at2 = $queryType_id2->num_rows();
                  // echo "<td>" .$num_at2 .  "</td>";
                  if($num_at2  != 0){
                    echo "<td><p class='text-danger'><strong>" .$num_at2.  "</strong></p></td>";
                  } else {
                    echo "<td>" .$num_at2.  "</td>";
                  }
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 3);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id3 = $this->db->get('attendances');
                  $num_at3 = $queryType_id3->num_rows();
                  echo "<td>" .$num_at3 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 4);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id4 = $this->db->get('attendances');
                  $num_at4 = $queryType_id4->num_rows();
                  echo "<td>" .$num_at4 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 5);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id5 = $this->db->get('attendances');
                  $num_at5 = $queryType_id5->num_rows();
                  echo "<td>" .$num_at5 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 6);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id6 = $this->db->get('attendances');
                  $num_at6 = $queryType_id6->num_rows();
                  echo "<td>" .$num_at6 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 7);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id7 = $this->db->get('attendances');
                  $num_at7 = $queryType_id7->num_rows();
                  echo "<td>" .$num_at7 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 8);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id8 = $this->db->get('attendances');
                  $num_at8 = $queryType_id8->num_rows();
                  echo "<td>" .$num_at8 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 9);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id9 = $this->db->get('attendances');
                  $num_at9 = $queryType_id9->num_rows();
                  echo "<td>" .$num_at9 .  "</td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 10);
                  $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id10 = $this->db->get('attendances');
                  $num_at10 = $queryType_id10->num_rows();
                  if($num_at10  != 0){
                    echo "<td><p class='text-danger'><strong>" .$num_at10.  "</strong></p></td>";
                  } else {
                    echo "<td>" .$num_at10.  "</td>";
                  }

                  $PP = $num_at10;
                  // $PP = $num_at10*0.5
                  // echo $PP;
            ?>

            <?php
                  $total=array($num_at1, $num_at2, $num_at3, $num_at4, $num_at5, $num_at6, $num_at7, $num_at8, $num_at9, $num_at10 );
                  $sumTotal = array_sum($total) ;
                  echo "<td><strong>" .$sumTotal.  "</strong></td>";
            ?>

            <?php
                  $sumPlanning=array($num_at1, $num_at2, $PP );
                  $planning = array_sum($sumPlanning) ;
                  echo "<td><p class='text-success'><strong>" .$planning.  "</strong></p></td>";
            ?>

            <?php
                  $actual= $num_at1+$PP;
                  echo "<td><p class='text-warning'><strong>" .$actual.  "</strong></p></td>";
            ?>

            <?php
                  // $sum=array($num_at2, $num_at3, $num_at4, $num_at5, $num_at6, $num_at7, $num_at8, $num_at9, $num_at10 );
                  // $TotalSum = array_sum($sum) ;
                  $value = $num_at2;
                  $actual= $num_at1;
                  if($actual > 0){
                        $calc = ($value/$planning)*100;
                        if ($calc < 10) {
                          echo "<td><p><strong>" .round($calc). "%</strong></p></td>";
                        } else {
                          echo "<td><p class='text-danger'><strong>" .round($calc). "%</strong></p></td>";
                        }

                  } else {
                    echo "<td><strong>0%</strong></td>";
                  }
            ?>
            <!-- <td> 10 </td> -->
            <?php } ?>


         </tr>

         </tbody>
          <thead>

         <tr align="center">
            <td class='danger'><strong>TOTAL </strong></td>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 1);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id1 = $this->db->get('attendances');
                  $num_atTotal1 = $queryType_id1->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal1 .  "</strong></td>";
            ?>



            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 2);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id2 = $this->db->get('attendances');
                  $num_atTotal2 = $queryType_id2->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal2 .  "</strong></td>";
            ?>
            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 3);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id3 = $this->db->get('attendances');
                  $num_atTotal3 = $queryType_id3->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal3 .  "</strong></td>";
            ?>


            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 4);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id4 = $this->db->get('attendances');
                  $num_atTotal4 = $queryType_id4->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal4 .  "</strong></td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 5);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id5 = $this->db->get('attendances');
                  $num_atTotal5 = $queryType_id5->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal5 .  "</strong></td>";
            ?>


            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 6);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id6 = $this->db->get('attendances');
                  $num_atTotal6 = $queryType_id6->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal6 .  "</strong></td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 7);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id7 = $this->db->get('attendances');
                  $num_atTotal7 = $queryType_id7->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal7 .  "</strong></td>";
            ?>

            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 8);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id8 = $this->db->get('attendances');
                  $num_atTotal8 = $queryType_id8->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal8 .  "</strong></td>";
            ?>
            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 9);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id9 = $this->db->get('attendances');
                  $num_atTotal9 = $queryType_id9->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal9 .  "</strong></td>";
            ?>
            <?php
                  $this->db->select('*');
                  $this->db->join('workers', 'workers.id = attendances.worker_id','inner');
                  $this->db->join('teams', 'teams.id = workers.team_id','inner');
                  $this->db->where('type_attendance_id', 10);
                  // $this->db->where('team_id', $row->tid);
                  $this->db->where('day', $day);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id10 = $this->db->get('attendances');
                  $num_atTotal10 = $queryType_id10->num_rows();
                  echo "<td class='danger'><strong>" .$num_atTotal10 .  "</strong></td>";
            ?>


        <?php
                $total=array($num_atTotal1, $num_atTotal2, $num_atTotal3, $num_atTotal4, $num_atTotal5, $num_atTotal6, $num_atTotal7, $num_atTotal8, $num_atTotal9, $num_atTotal10 );
                $sumTotal = array_sum($total) ;
                echo "<td class='danger'><strong>" .$sumTotal.  "</strong></td>";
          ?>


          <?php
                $totalPlanning=array($num_atTotal1, $num_atTotal2,);
                $sumTotalPlanning = array_sum($totalPlanning) ;
                echo "<td class='danger'><strong>" .$sumTotalPlanning.  "</strong></td>";
          ?>


          <?php
                echo "<td class='danger'><strong>" .$num_atTotal1.  "</strong></td>";
          ?>

          <?php
                  // $sum=array($num_at2, $num_at3, $num_at4, $num_at5, $num_at6, $num_at7, $num_at8, $num_at9, $num_at10 );
                  // $TotalSum = array_sum($sum) ;
                  $valueTotal = $num_atTotal2;
                  $actualTotal= $num_atTotal1;
                  if($actualTotal > 0){
                        $calcTotal = ($valueTotal/$sumTotalPlanning)*100;
                        if ($calcTotal < 10) {
                          echo "<td class='danger'><p><strong>" .round($calcTotal). "%</strong></p></td>";
                        } else {
                          echo "<td class='danger'><p class='text-danger'><strong>" .round($calcTotal). "%</strong></p></td>";
                        }

                  } else {
                    echo "<td><strong>0%</strong></td>";
                  }
            ?>

         </tr>
         </thead>
      </table>
      </div>
      </div>
  </div>
</div>

</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>



