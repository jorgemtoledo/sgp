<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Dados</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>doctors" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Medicos </a>
          </div>

          <h2 class="sub-header">Informações do Médico</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>doctors/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $doctors[0]->id; ?>">
              <div>
                <div class="col-md-8">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $doctors[0]->name; ?>"  required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <label for="crm">CRM:</label>
                  <input type="text" class="form-control" id="crm" name="crm" value="<?php echo $doctors[0]->crm; ?>" required>
                </div>
              </div>

              <br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>