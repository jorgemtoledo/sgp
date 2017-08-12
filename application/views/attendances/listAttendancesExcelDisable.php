<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informacoes do Funcionario</h1>
            <!-- Botao voltar -->

            </div></ul>
            </div>
        </div>
    </div>
</div>
</div>


<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-check"></i> Controle de Presenca - <strong><?php echo $month; ?> / <?php echo $year; ?></strong>
    </div><br />
      <div class="col-lg-12">
      <div class="table-responsive">

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
                            if($level == 1 || $level == 2 ||$level == 3 ) {
        ?>
        <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
         <thead>
         <tr align="center">
            <td><strong>Nome do Agente </strong></td> <td><strong>Equipe </strong></td> <?php for ($x = 1; $x <= 31; $x++){ echo "<td><strong>" . $x . "</td></strong>"; }?>
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

          <td><strong> Total </strong></td>

          <td><strong> ABS </strong></td>
         </tr>
         </thead>
         <tbody>

        <?php
            $this->db->select(
              'w.id as wid, w.team_id as wteam, w.user_id as wuser, w.employee_id as wemployee, w.active as wactive,
               t.id as tid, t.name as tname,
               e.id as eid, e.name as ename
               ');
            $this->db->join('teams t', 't.id = w.team_id');
            $this->db->join('employees e', 'e.id = w.employee_id');
            $first_date = "{$year}-{$month}-01 00:00:00";
            $second_date = "{$year}-{$month}-31 23:59:00";

            $this->db->where('w.modified >=', $first_date);
            $this->db->where('w.modified <=', $second_date);

            $this->db->where('w.active', 0);
            $this->db->order_by("t.name","ASC");
            $query = $this->db->get('workers w');
             //echo $num = $query->num_rows() . " quantidade";
             foreach ($query->result() as $row)
            {
                // echo "<td>" . $row->wid ."</td>";
                $wid = $row->wid;
                // echo "<td>" . $row->wid ."</td>";
        ?>

         <tr align="center">
            <td><h6><?php echo $row->ename; ?></h6></td>
            <td><h6><?php echo $row->tname; ?></h6></td>
            <?php $month_attendance = $month;
                for ($day = 1; $day <= 31; $day++){
            ?>
            <td>
            <?php
                $this->db->select('at.id as atid, at.worker_id as atworker, at.user_id as atuser, at.type_attendance_id as attype,
                  at.day as atday, at.month as atmonth, at.year as atyear, at.alert as atalert, at.description as atdescription,
                  at.created as atcreated, at.modified as atmodified,
                  w.id as wid, w.team_id as wteam, w.employee_id as wemployee, w.active as wactive,
                  tp.id as tpid, tp.name as tpname, tp.sgl as tpsgl, tp.description as tpdescription

                ');
                $this->db->join('workers w', 'w.id = at.worker_id');
                $this->db->join('type_attendances tp', 'tp.id = at.type_attendance_id');
                $this->db->where('at.worker_id', $wid);
                $this->db->where('at.day', $day);
                $this->db->where('at.month', $month);
                $this->db->where('at.year', $year);
                $queryAt = $this->db->get('attendances at');
                $num = $queryAt->num_rows();
                if($num){
                foreach ($queryAt->result() as $rows){
                  //echo $rows->tpsgl;
                  //echo $rows->tpsgl;
                  $idattendances = $rows->atid;
                  //echo $idattendances;
            ?>
            <?php if($rows->atalert == 0){ ?>
                <p class="text-success"><?php echo $rows->tpsgl; ?></p>

              <?php } else { ?>


                <p class="text-danger"><strong><?php echo $rows->tpsgl; ?></strong></p>

            <?php
               } } } else { ?>


                <p class="text-default"><span class="glyphicon glyphicon-minus-sign"></span></p>

            </td>
            <?php  }}?>

            <!-- Start  Dados -->
            <?php for($i=1; $i<=$num; $i++){?>
            <!-- <td> 1 </td> -->
            <?php } ?>

            <?php
              $worker_id = $row->wid;
              $this->db->select('*');
              $query_type = $this->db->get('type_attendances');
              $num = $query_type->num_rows();
              $sum = 0;
               foreach ($query_type->result() as $row)
              {
                   // echo "<td><strong> " . $row->sgl ."</strong> </td>";
                   $id_type = $row->id;
                   // echo "<td>" .$id_type .  "</td>";
                   $test = $row->sgl;

                  $this->db->select('*');
                  $this->db->where('type_attendance_id', $id_type);
                  $this->db->where('worker_id', $worker_id);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType = $this->db->get('attendances');
                  $num_type_attendances = $queryType->num_rows();
                  // echo $num . " - ";
                  echo "<td>" .$num_type_attendances .  "</td>";
                  $sum+= $num_type_attendances;
                  //$wid = $row->wid;
                  // echo "<td>" . $row->wid ."</td>";
              }
              // echo $sum;
              echo "<td>" .$sum . "</td>";
            ?>
            <?php
                  $this->db->select('*');
                  $this->db->where('type_attendance_id', 1);
                  $this->db->where('worker_id', $worker_id);
                  $this->db->where('month', $month);
                  $this->db->where('year', $year);
                  $queryType_id = $this->db->get('attendances');
                  $num_type_attendances_id = $queryType_id->num_rows();

                  // echo "<td>" .$num_type_attendances_id .  "</td>";
                  // echo "<td>" .$sum . "</td>";
                  if($num_type_attendances_id != 0){
                  $values = $sum - $num_type_attendances_id;
                  // echo $values;
                  $div = $values/$sum * 100;
                  // echo number_format($div, 1, '.', '');

                  // echo $div . "%";
                  echo "<td>" . number_format($div, 0, '.', '') . "%</td>";
                } else {
                  echo "<td> 0%</td>";;
                }

            ?>
         </tr>
          <!-- Finish Dados -->


         <?php } ?>
         </tbody>
      </table>




      <?php } else { ?>
      <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
         <thead>
         <tr align="center">
            <td><strong>Nome do Agente </strong></td> <td><strong>Equipe </strong></td> <?php for ($x = 1; $x <= 31; $x++){ echo "<td><strong>" . $x . "</td></strong>"; }?>
         </tr>
         </thead>
         <tbody>

        <?php
            $this->db->select(
              'w.id as wid, w.team_id as wteam, w.user_id as wuser, w.employee_id as wemployee, w.active as wactive,
               t.id as tid, t.name as tname,
               e.id as eid, e.name as ename
               ');
            $this->db->join('teams t', 't.id = w.team_id');
            $this->db->join('employees e', 'e.id = w.employee_id');

            $this->db->where('w.active', 0);
            $this->db->order_by("t.name","ASC");
            $query = $this->db->get('workers w');
             //echo $num = $query->num_rows() . " quantidade";
             foreach ($query->result() as $row)
            {
                // echo "<td>" . $row->wid ."</td>";
                $wid = $row->wid;
                // echo "<td>" . $row->wid ."</td>";
        ?>

         <tr align="center">
            <td><h6><?php echo $row->ename; ?></h6></td>
            <td><h6><?php echo $row->tname; ?></h6></td>
            <?php $month_attendance = $month;
                for ($day = 1; $day <= 31; $day++){
            ?>
            <td>
            <?php
                $this->db->select('at.id as atid, at.worker_id as atworker, at.user_id as atuser, at.type_attendance_id as attype,
                  at.day as atday, at.month as atmonth, at.year as atyear, at.alert as atalert, at.description as atdescription,
                  at.created as atcreated, at.modified as atmodified,
                  w.id as wid, w.team_id as wteam, w.employee_id as wemployee, w.active as wactive,
                  tp.id as tpid, tp.name as tpname, tp.sgl as tpsgl, tp.description as tpdescription

                ');
                $this->db->join('workers w', 'w.id = at.worker_id');
                $this->db->join('type_attendances tp', 'tp.id = at.type_attendance_id');
                $this->db->where('at.worker_id', $wid);
                $this->db->where('at.day', $day);
                $this->db->where('at.month', $month);
                $this->db->where('at.year', $year);
                $queryAt = $this->db->get('attendances at');
                $num = $queryAt->num_rows();
                if($num){
                foreach ($queryAt->result() as $rows){
                  //echo $rows->tpsgl;
                  //echo $rows->tpsgl;
                  $idattendances = $rows->atid;
                  //echo $idattendances;
            ?>
            <?php if($rows->atalert == 0){ ?>

                <p class="text-success"><?php echo $rows->tpsgl; ?></p>

              <?php } else { ?>


                <p class="text-danger"><strong><?php echo $rows->tpsgl; ?></strong></p>

            <?php
               } } } else { ?>
               <?php
                    $day;
                    $today = date("d");
                    // $today = 01;
                    $limitToday = $today;
                    $limitToday -= 2;

                    if($day == $today || $day < $today and $day >= $limitToday){ ?>

                <p class="text-default"><span class="glyphicon glyphicon-minus-sign"></span></p>

              <?php } else { ?>
                <p class="text-muted" data-toggle="tooltip" title="DOMINGO / FERIADO"><span class="glyphicon glyphicon-stop"></span></p>
            </td>
            <?php  }}}?>
         </tr>
         <?php } ?>
         </tbody>
      </table>
        <?php } ?>
      </div>
      </div>
  </div>
</div>

<!-- Script HTML to EXCEL -->
<?php
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename=relatorioPresenca.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->

</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>



