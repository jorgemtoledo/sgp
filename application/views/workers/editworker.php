<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Funcionario Equipe / Setor</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>workers/listworkers" ><i class="glyphicon glyphicon-list-alt"></i>   Listar</a>
          </div>
          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>workers/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $workers->wid; ?>">
              <div class="row"  >
                <div class="col-md-3">
                    <label>Funcionario</label>
                    <select id="employee_id" name="employee_id" class="form-control" disabled>
                      <option value="<?php echo $workers->eid; ?>"><?php echo $workers->ename; ?></option>
                      <?php foreach ($employees as $employee) { ?>
                      <option value="<?php echo $employee->id; ?>"> <?php echo $employee->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Equipe / Setor</label>
                    <select id="team_id" name="team_id" class="form-control">
                      <option value="<?php echo $workers->tid; ?>"><?php echo $workers->tname; ?></option>
                      <?php foreach ($teams as $team) { ?>
                      <option value="<?php echo $team->id; ?>"> <?php echo $team->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
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
                            if($level == 1 || $level == 2 ) {
                    ?>
                    <div class="col-md-3">
                      <label for="active">Status:</label>
                      <select id="active" name="active" class="form-control" required>
                        <option value="1"<?php echo $workers->wactive==1?' selected':''; ?>> Ativo </option>
                        <option value="0"<?php echo $workers->wactive==0?' selected':''; ?>> Inativo </option>
                      </select>
                    </div>
                    <?php } else { ?>
                    <div class="col-md-3">
                      <label for="active">Status:</label>
                      <select id="" name="" class="form-control" disabled="disabled">
                        <option value="1"<?php echo $workers->wactive==1?' selected':''; ?>> Ativo </option>
                        <option value="0"<?php echo $workers->wactive==0?' selected':''; ?>> Inativo </option>
                        <input type="hidden" id="active" name="active" value="<?php echo $workers->wactive; ?>">
                      </select>
                    </div>
                    <?php } ?>

              </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>