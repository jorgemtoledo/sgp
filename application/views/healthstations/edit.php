<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Posto de Saúde</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>health_stations" ><i class="glyphicon glyphicon-list-alt"></i>   Listar</a>
          </div>

          <h2 class="sub-header">Informações</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>health_stations/save_editHealthStation" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $health_stations[0]->id; ?>">
              <div>
                <div class="col-md-8">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $health_stations[0]->name; ?>"  required>
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