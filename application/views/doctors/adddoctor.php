<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Medico</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>doctors" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Medicos </a>
          </div>

          <h2 class="sub-header">Informações da Operação</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>doctors/savedoctor" method="post">
              <div>
                <div class="col-md-8">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome do médico" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <label for="crm">CRM:</label>
                  <input type="text" class="form-control" id="crm" name="crm" placeholder="Informe o crm do médico" required>
                </div>
              </div>

              <br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
        </div>