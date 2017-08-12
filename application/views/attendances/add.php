<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="col-lg-10">
            <h1 class="page-header">Cadastro Falta / Presença do Funcionário</h1>
            <div class="panel panel-primary">
            <div class="panel-heading">
            <i class="fa fa-list-alt"></i>  Cadastrar <?php //echo $worker_id; ?>
            </div>

            <div class="table-responsive">
            <div class="col-lg-12">
            <form class="form-group" action="<?php echo base_url() ?>attendances/saveattendances" method="post">
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

              <div class="row">
                  <div class="col-md-3">
                    <label>Tipo (Ex: Falta, Presença)</label>
                    <select id="type_attendance_id" name="type_attendance_id" class="form-control" required>
                      <?php foreach ($typeAttendances as $typeAttendance) { ?>
                      <option value="<?php echo $typeAttendance->id; ?>"> <?php echo $typeAttendance->name . " - " . $typeAttendance->sgl ; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                  <label for="alert">Alerta:</label>
                  <select id="alert" name="alert" class="form-control" required>
                    <option value="0"> Não </option>
                    <option value="1"> Sim </option>
                  </select>
                </div>
              </div>
              <div class="row"  >
               <div class="col-md-12">
               <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" id="description" name="description"  rows="3"></textarea>
              </div>
              </div>
              </div>
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
            </div>
            </div>
            </div>

            </div>
        </div>
    </div>
</div>
