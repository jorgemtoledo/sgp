<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Funcionario Equipe / Setor</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>workers/listworkers" ><i class="glyphicon glyphicon-list-alt"></i>   Listar</a>
          </div>
          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>workers/saveworker" method="post">

              <div class="row"  >
                <div class="col-md-5">
                    <label>Funcionario</label>
                    <select id="employee_id" name="employee_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($employees as $employee) { ?>
                      <option value="<?php echo $employee->id; ?>"> <?php echo $employee->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Equipe / Setor</label>
                    <select id="team_id" name="team_id" class="form-control" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($teams as $team) { ?>
                      <option value="<?php echo $team->id; ?>"> <?php echo $team->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                <div class="col-md-2">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> Ativo </option>
                    <option value="0"> Inativo </option>
                  </select>
                </div>
              </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>