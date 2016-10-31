<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Situação</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>situations" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Situações </a>
          </div>

          <h2 class="sub-header">Informações da Situação</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>situations/savesituation" method="post">
              <div>
                <div class="col-md-8">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe a situação" required>
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