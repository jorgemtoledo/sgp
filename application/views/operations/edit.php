<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Alterar Departamento</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>operations" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Departamento </a>
          </div>

          <h2 class="sub-header">Informações do Departamento</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>operations/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $operations[0]->id; ?>">
              <div>
                <div class="col-md-8">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Informe a operação" value="<?php echo $operations[0]->name; ?>" required>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $operations[0]->active==1?' selected':''; ?>> Ativo </option>
                    <option value="0"<?php echo $operations[0]->active==0?' selected':''; ?>> Inativo </option>
                  </select>
                </div>
              </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a class="btn btn-danger" href="<?php echo base_url() ?>operations" > Cancelar </a>
              </div>
            </form>
          </div>
        </div>
        </div>