<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Situação</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>situations" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Situações </a>
          </div>

          <h2 class="sub-header">Informações da Situação</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>situations/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $situations[0]->id; ?>">
              <div>
                <div class="col-md-8">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe a situação" value="<?php echo $situations[0]->name; ?>" required>
                </div>
              </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a class="btn btn-danger" href="<?php echo base_url() ?>situations" > Cancelar </a>
              </div>
            </form>
          </div>
        </div>
        </div>