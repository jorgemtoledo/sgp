<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Departamento</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>operations" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Departamento </a>
          </div>

          <h2 class="sub-header">Informações da Departamento</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>operations/saveoperation" method="post">
              <div>
                <div class="col-md-5">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe o Departamento" required>
                </div>
              </div>

              <div class="col-md-4">
                  <label for="company_id">Nome da Empresa:</label>
                  <select id="company_id" name="company_id" class="form-control" required>
                    <option value=" "> Selecione </option>
                    <?php foreach ($companies as $company) { ?>
                      <option value="<?php echo $company->id; ?>"> <?php echo $company->name; ?> </option>
                    <?php } ?>
                  </select>
                </div>

              <div class="row">
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
                <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
        </div>