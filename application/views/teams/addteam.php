<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Equipe</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>teams" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Equipes </a>
          </div>

          <h2 class="sub-header">Informações Equipe</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>teams/saveteam" method="post">

              <div class="row"  >
              <div class="col-md-6">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe a equipe" required>
                </div>
                <div class="col-md-3">
                    <label>Departamento</label>
                    <select id="operation_id" name="operation_id" class="form-control">
                      <option value=""> Selecione </option>
                      <?php foreach ($operations as $operation) { ?>
                      <option value="<?php echo $operation->id; ?>"> <?php echo $operation->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                <div class="col-md-3">
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
                <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
        </div>