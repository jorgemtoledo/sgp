<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Motivo Medidas</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>feedbacks/typefeedback" ><i class="glyphicon glyphicon-list-alt"></i>   Listar </a>
          </div>

          <h2 class="sub-header">Informações</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>feedbacks/saveEditTypefeed" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $type_feedbacks[0]->id; ?>">
              <div>
                <div class="col-md-8">
                  <label for="name">Motivo:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $type_feedbacks[0]->name; ?>" required>
                </div>
              </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Editar</button>
              </div>
            </form>
          </div>
        </div>
        </div>