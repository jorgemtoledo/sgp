<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Alterar dados do Usuário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-warning" href="<?php echo base_url() ?>" >
              <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
          </div>

          <h2 class="sub-header">Informações do usuário</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>users/save_myEdit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $users[0]->id; ?>">
              <div class="row">
              <div class="col-md-7">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $users[0]->name; ?>" required>
              </div>
              </div>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="password">Senha <small><em>(Favor digitar a senha atual ou Nova senha!)</em></small>:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                </div>

              </div>
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>