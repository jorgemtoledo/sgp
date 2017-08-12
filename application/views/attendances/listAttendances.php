<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informações do Funcionario</h1>
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

<?php
            $this->db->select(
              '
              TS.id as wid,
              TS.team_id as wteam,
              TS.user_id as wuser,
              U.id as uid,
              U.name as uname,
              T.id as tid, W.employee_id as we,
              E.id as eid, E.name as ename,
              E.birth_date,
              (DAY(E.birth_date)) AS dia,
              T.name as tname
               ');
             $this->db->join('users as U', 'U.id = TS.user_id','inner');
             $this->db->join('teams as T', 'T.id = TS.team_id','inner');
             $this->db->join('workers as W', 'W.team_id = T.id','inner');
             $this->db->join('employees as E', 'E.id = W.employee_id','inner');
             $this->db->where('TS.user_id',$id_user);
             $this->db->where('MONTH(E.birth_date)',$month);
             $this->db->order_by('dia', 'ASC');
            $query_Niver = $this->db->get('teams_users as TS');
             //echo $num = $query->num_rows() . " quantidade";
             foreach ($query_Niver->result() as $nivers)
            {
                // echo "<td>" . $row->wid ."</td>";
           // echo $nivers->dia .  " - " . $nivers->ename . "<br>";
                // echo "<td>" . $row->wid ."</td>";
              }
        ?>



        <?php
                        if($query->num_rows > 0 ) {
                          foreach ($query->result() as $row) {
                            // echo $row->level;
                          }
                        }
                        $level = $row->level;
                          if($level == 4) {
        ?>

<!-- Subtitle & Control period  -->
<div class="col-lg-12">
  <div class="panel panel-warning">
  <div class="panel-heading">
      <i class="fa fa-gift"></i>  Aniversariantes do Mês - <?php echo $date = date('d/m/Y'); ?>
  </div>
    <div class="col-lg-12">
    <div class="table-responsive">
      <div>
        <label>Lista</label>
      </div>
    <table class="table table-bordered">
       <tbody>
       <tr align="center">
          <td class="active"><strong> DIA </strong></td> <td><strong>NOME DO FUNCIONARIO / AGENTE </strong></td>
       </tr>

       <?php  foreach ($query_Niver->result() as $nivers) {
                   $day = date('d');
        // $day = 12;
                   if($day != $nivers->dia){
        ?>
           <tr align="center">
           <td class="active"> <?php echo $nivers->dia; ?></td> <td> <?php echo $nivers->ename; ?>  - <span> Equipe: <?php echo $nivers->tname;?></span></td>
           </tr>
           <?php } else { ?>
           <tr align="center">
           <td class="danger"> <i class="fa fa-gift fa-fw"></i><em><?php echo $nivers->dia; ?></em></td> <td class="danger"><strong><em><?php echo $nivers->ename; ?><em></strong> - <span><em> Equipe: <?php echo $nivers->tname;?></em></span></td>
           </tr>
           <?php } }?>
       </tbody>
    </table>
    </div>
    </div>
  </div>
</div>
<!-- Finish Subtitle -->
<?php } ?>

<!-- <?php $day = date('d');
                    if($day !=$team->dia){
                      echo $team->dia;?> - <?php echo $team->ename;
                    } else { ?>
                      <i class="fa fa-gift fa-fw"></i> <strong><em><?php echo $team->dia;?> - <?php echo $team->ename;?></em></strong>
                    <?php }?> -->


<!-- Subtitle & Control period  -->
<div class="col-lg-12">
  <div class="panel panel-primary">
  <div class="panel-heading">
      <i class="fa fa-list-alt"></i> Legenda do Controle
  </div>
    <div class="col-lg-12">
    <div class="table-responsive">
      <div>
        <label>Legenda para Controle</label>
      </div>
    <table class="table table-bordered" width="12%" border="1" cellspacing="20" cellpadding="12">
       <tbody>
       <tr align="center">
          <td class="active"> P</td> <td> PRESENTE</td> <td class="active"> F</td> <td> FALTA </td> <td class="active"> BH </td> <td> BANCO DE HORAS </td> <td class="active"> FE </td> <td> FÉRIAS</td> <td class="active"> IN </td> <td> INSS </td>
       </tr>
       <tr align="center">
          <td class="active"> AT</td> <td> ATESTADO</td> <td class="active"> SU</td> <td> SUSPENSÃO </td> <td class="active"> FO</td> <td> FOLGA</td> <td class="active"> DM</td> <td> DEMITIDO</td> <td class="active"> PP</td> <td> PRESENTE PARCIAL </td>
       </tr>
       <!-- <tr align="center"> -->
          <!-- <td class="active"> DM</td> <td> DEMITIDO</td> <td class="active"> PP</td> <td> PRESENTE PARCIAL </td> <td class="active"> </td> <td> </td> <td class="active">  </td> <td> </td> <td class="active">  </td> <td>  </td> -->
       <!-- </tr> -->
       </tbody>
    </table>
    </div>
    </div>
  </div>
</div>
<!-- Finish Subtitle -->

<div class="col-lg-12">
  <div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-check"></i> Controle de Presença - <strong><?php echo $month; ?> / <?php echo $year; ?></strong>
    </div><br />
      <div class="col-lg-12">
      <div class="table-responsive">

        <?php
                          if($query->num_rows > 0 ) {
                            foreach ($query->result() as $row) {
                              // echo $row->level;
                            }
                          }
                          $level = $row->level;
                            if($level == 1 || $level == 2 ||$level == 3) {
        ?>
        <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
         <thead>
         <tr align="center">
            <td><strong>Nome do Agente </strong></td> <?php for ($x = 1; $x <= 31; $x++){ echo "<td><strong>" . $x . "</td></strong>"; }?>
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
            $this->db->where('w.team_id', $team_id);
            $this->db->where('w.active', 1);
            $this->db->order_by("e.name","ASC");
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
              <a href="<?php  echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/'"
                  role="button" aria-pressed="true" target="popup"
                  onclick="window.open('<?php echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/',
                  'popup','width=1000,height=530'); return false;" data-toggle="tooltip" title="<?php echo $rows->atdescription; ?>">
                <p class="text-success"><?php echo $rows->tpsgl; ?></p>
              </a>
              <?php } else { ?>

              <a href="<?php  echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/'"
                  role="button" aria-pressed="true" target="popup"
                  onclick="window.open('<?php echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/',
                  'popup','width=1000,height=530'); return false;" data-toggle="tooltip" title="<?php echo $rows->atdescription; ?>">
                <p class="text-danger"><strong><?php echo $rows->tpsgl; ?></strong></p>
              </a>
            <?php
               } } } else { ?>

              <a href="<?php  echo base_url() ?>attendances/add/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/'"
                  role="button" aria-pressed="true" target="popup"
                  onclick="window.open('<?php echo base_url() ?>attendances/add/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/',
                  'popup','width=1000,height=530'); return false;" data-toggle="tooltip" title="LIBERADO PARA CADASTRO">
                <p class="text-default"><span class="glyphicon glyphicon-minus-sign"></span></p>
              </a>
            </td>
            <?php  }}?>
         </tr>
         <?php } ?>
         </tbody>
      </table>




      <?php } else { ?>
      <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
         <thead>
         <tr align="center">
            <td><strong>Nome do Agente </strong></td> <?php for ($x = 1; $x <= 31; $x++){ echo "<td><strong>" . $x . "</td></strong>"; }?>
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
            $this->db->where('w.team_id', $team_id);
            $this->db->where('w.active', 1);
            $this->db->order_by("e.name","ASC");
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
              <?php
              /**
               * Valida limite minimo para editar o controle de faltas
               */
                    $day;
                    $editToday1 = date("d");
                    $editToday2 = date("d");
                    $editToday1 -= 2;
                    $editToday2 += 1;
                    // echo $editToday2;
                    if ($day >= $editToday1 && $day <= $editToday2) {
                ?>

            <?php if($rows->atalert == 0){ ?>
              <a href="<?php  echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/'"
                  role="button" aria-pressed="true" target="popup"
                  onclick="window.open('<?php echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/',
                  'popup','width=1000,height=530'); return false;" data-toggle="tooltip" title="<?php echo $rows->atdescription; ?>">
                <p class="text-success"><?php echo $rows->tpsgl; ?></p>
              </a>
              <?php } else { ?>

              <a href="<?php  echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/'"
                  role="button" aria-pressed="true" target="popup"
                  onclick="window.open('<?php echo base_url() ?>attendances/viewAttendance/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/<?php echo $idattendances; ?>/',
                  'popup','width=1000,height=530'); return false;" data-toggle="tooltip" title="<?php echo $rows->atdescription; ?>">
                <p class="text-danger"><strong><?php echo $rows->tpsgl; ?></strong></p>
              </a>
            <?php } ?>
            <?php } else { ?>
                <?php if($rows->atalert == 0){ ?>
                    <p class="text-success"><?php echo $rows->tpsgl; ?></p>
                  <?php } else { ?>
                    <p class="text-danger"><strong><?php echo $rows->tpsgl; ?></strong></p>
                <?php } ?>

            <?php }}} else { ?>
               <?php
                    $day;
                    $today = date("d");
                    // $today = 01;
                    $limitToday = $today;
                    $limitToday -= 2;

                    if($day == $today || $day < $today and $day >= $limitToday){ ?>
              <a href="<?php  echo base_url() ?>attendances/add/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/'"
                  role="button" aria-pressed="true" target="popup"
                  onclick="window.open('<?php echo base_url() ?>attendances/add/index/<?php echo $day; ?>/<?php echo $month_attendance; ?>/<?php echo $row->wid; ?>/',
                  'popup','width=1000,height=530'); return false;" data-toggle="tooltip" title="LIBERADO PARA CADASTRO">
                <p class="text-default"><span class="glyphicon glyphicon-minus-sign"></span></p>
              </a>


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

<div class="col-lg-12">
  <div class="panel panel-info">
    <div class="panel-heading">
        <i class="fa fa-signal"></i> Dados da Equipe no Controle - <strong><?php echo $month; ?> / <?php echo $year; ?></strong>
    </div><br />
      <div class="col-lg-12">
      <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
         <thead>

         <tr align="center">
            <td><strong>Dados </strong></td>
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
            $this->db->where('w.team_id', $team_id);
            $this->db->where('w.active', 1);
            $this->db->order_by("e.name","ASC");
            $query = $this->db->get('workers w');
             //echo $num3 = $query->num_rows() . " quantidade";
             foreach ($query->result() as $row)
            {
                // echo "<td>" . $row->ename ."</td>";
                $wid = $row->wid;
                // echo "<td>" . $row->wid ."</td>";
        ?>
         <tr align="center">
            <td><h6><?php echo $row->ename; ?></h6> </td>
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
            <!-- <td> 10 </td> -->
            <?php } ?>
         </tr>

         </tbody>
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



