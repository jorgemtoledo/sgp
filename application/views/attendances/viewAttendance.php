<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-10">
            <h1 class="page-header">Cadastro Falta / Presença do Funcionário</h1>
            <div class="panel panel-primary">
            <div class="panel-heading">
            <i class="fa fa-list-alt"></i>  DADOS <?php //echo $worker_id; ?>
            </div>

            <div class="table-responsive">
            <div class="col-lg-12">
            <form class="form-group" action="<?php echo base_url() ?>attendances/edit/index/<?php echo $day; ?>/<?php echo $month; ?>/<?php echo $worker_id; ?>/<?php echo $idattendances; ?>/" method="post">
            <!-- <?php echo $day; ?>/<?php echo $month; ?>/<?php echo $worker_id; ?>/<?php echo $idattendances; ?>/ -->
              <div class="row"  >
               <div class="col-md-8">
                    <label>Funcionário</label>
                    <?php
                        $this->db->select(
                          'w.id as wid, w.team_id as wteam, w.user_id as wuser, w.employee_id as wemployee, w.active as wemployee,
                           t.id as tid, t.name as tname,
                           e.id as eid, e.name as ename
                           ');
                        $this->db->join('teams t', 't.id = w.team_id');
                        $this->db->join('employees e', 'e.id = w.employee_id');
                        $this->db->where('w.id', $worker_id);
                        $query = $this->db->get('workers w');
                         //echo $num = $query->num_rows() . " quantidade";
                         foreach ($query->result() as $row)
                        {
                            //echo "<td>" . $row->ename ."</td>"; ?>
                    <input type="text" class="form-control" id="worker_id" name="worker_id" value="<?php  echo $row->ename; ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="worker_id" name="worker_id" value="<?php echo $row->wid; ?>">
                    <input type="hidden" class="form-control" id="idattendances" name="idattendances" value="<?php echo $idattendances; ?>">
                     <?php } ?>
                </div>
                <div class="col-md-1">
                    <label>Dia</label>
                    <!-- <select id="day" name="day" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> 01 </option>
                    </select> -->
                    <input type="text" class="form-control" id="  " name="" value="<?php  echo $day; ?>" disabled="disabled">
                    <input type="hidden" class="form-control" id="day" name="day" value="<?php echo $day; ?>">
                  </div>
                  <div class="col-md-1">
                    <label>Mês</label>
                    <!-- <select id="month" name="month" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1">Janeiro</option>
                  </select> -->

                  <input type="text" class="form-control" id="  " name="" value="<?php echo $month; ?>" disabled="disabled">
                  <input type="hidden" class="form-control" id="month" name="month" value="<?php echo $month; ?>">
                  </div>
                <!-- Year -->
                <div class="col-md-2">
                  <label for="active">Ano:</label>
                  <!-- <select id="" name="" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="2016"> 2016 </option>
                  </select> -->
                  <input type="text" class="form-control" id="  " name="" value="<?php $today = date("Y"); echo $today; ?>" disabled="disabled">
                  <input type="hidden" class="form-control" id="year" name="year" value="<?php $today = date("Y"); echo $today; ?>">
                </div>
                <!-- /Year -->
              </div><br />

              <?php
                        $this->db->select(
                          'at.id as atid, at.worker_id as atworker, at.user_id as atuser, at.type_attendance_id as attype,
                           at.day as atday, at.month as atmonth, at.year as atyear, at.alert as atalert, at.description as atdescription,
                           at.created as atcreated, at.modified as atmodified,
                           tp.id as tpid, tp.name as tpname, tp.sgl as tpsgl, tp.description as tpdescription
                           ');
                        $this->db->join('type_attendances tp', 'tp.id = at.type_attendance_id');
                        $this->db->where('at.id', $idattendances);
                        $query = $this->db->get('attendances at');
                         //echo $num = $query->num_rows() . " quantidade";
                         foreach ($query->result() as $row)
                        {
                             //echo $row->tpname ." - " . $row->tpsgl;
                     ?>

              <div class="row">
                  <div class="col-md-3">
                    <label>Tipo (Ex: Falta, Presença)</label>
                    <input type="text" class="form-control" id="type_attendance_id" name="type_attendance_id" value="<?php echo $row->tpname ." - " . $row->tpsgl; ?>" disabled="disabled">
                    <!-- <input type="hidden" class="form-control" id="year" name="year" value="<?php $today = date("Y"); echo $today; ?>"> -->
                  </div>
                  <div class="col-md-3">
                    <label>Alerta</label>
                    <?php if($row->atalert == 1){ ?>
                    <input type="text" class="form-control" id="type_attendance_id" name="type_attendance_id" value="SIM" disabled="disabled">
                    <!-- <input type="hidden" class="form-control" id="year" name="year" value="<?php $today = date("Y"); echo $today; ?>"> -->
                    <?php } else { ?>
                    <input type="text" class="form-control" id="type_attendance_id" name="type_attendance_id" value="NAO" disabled="disabled">
                    <!-- <input type="hidden" class="form-control" id="year" name="year" value="<?php $today = date("Y"); echo $today; ?>"> -->
                    <?php } ?>
                  </div>
              </div>
              <div class="row"  >
               <div class="col-md-12">
               <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" id="description" name="description"  rows="3" disabled="disabled"><?php echo $row->atdescription; ?></textarea>
              </div>
              <?php } ?>
              </div>
              </div>
              <div style="text-align: right">
                <button type="submit" class="btn btn-warning">Editar</button>
                <a href="<?php echo base_url('attendances/delete/'.$idattendances); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
              </div>
            </form>
            </div>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>
