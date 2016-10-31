<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Código Internacional de Doenças - CID 10</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>cids" ><i class="glyphicon glyphicon-list-alt"></i>   Listar</a>
          </div>

          <h2 class="sub-header">Informações</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>cids/saveCid" method="post">
              <div>
                <div class="col-md-8">
                  <label for="name">Código:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Código CID 10" required>
                </div>
                <div class="col-md-8">
                  <label for="description">Descrição:</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Descrição do CID" required>
                </div>
              </div>
              <br /><br /><br /><br /><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
              </div>
            </form>
          </div>
        </div>
        </div>