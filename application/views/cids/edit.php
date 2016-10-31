<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Código Internacional de Doenças - CID 10</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>cids" ><i class="glyphicon glyphicon-list-alt"></i>   Listar</a>
          </div>

          <h2 class="sub-header">Informações</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>cids/save_editCid" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $cids[0]->id; ?>">
              <div>
                <div class="col-md-8">
                  <label for="name">Código:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $cids[0]->name; ?>"  required>
                </div>
              </div>
              <div>
                <div class="col-md-8">
                  <label for="description">Descrição:</label>
                  <input type="text" class="form-control" id="description" name="description" value="<?php echo $cids[0]->description; ?>"  required>
                </div>
              </div><br /><br /><br /><br /><br />

              <br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>