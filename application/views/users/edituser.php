<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar novo usuário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>users" ><i class="glyphicon glyphicon-list-alt"></i>   Listar usuários </a>
          </div>

          <h2 class="sub-header">Informações do usuário</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>users/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $users[0]->id; ?>">
              <div class="row">
              <div class="col-md-7">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $users[0]->name; ?>" required>
              </div>
<!--                 <div class="col-md-4">
                  <label for="employee_id">Funcionario Cadastrado:</label>
                  <select id="employee_id" name="employee_id" class="form-control">
                    <option value="0"> Selecione </option>
                    <option value="1"> Teste1 </option>
                    <option value="2"> Teste2 </option>
                    <option value="3"> Teste3 </option>
                  </select>
                </div> -->
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $users[0]->email; ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $users[0]->password; ?>" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1" <?php echo $users[0]->level==1?' selected':''; ?>> Administrador </option>
                    <option value="2" <?php echo $users[0]->level==2?' selected':''; ?>> RH </option>
                    <option value="3" <?php echo $users[0]->level==3?' selected':''; ?>> Coordenador/Analista </option>
                    <option value="4" <?php echo $users[0]->level==4?' selected':''; ?>> Supervisor </option>
                    <option value="5" <?php echo $users[0]->level==5?' selected':''; ?>> Operador </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"<?php echo $users[0]->active==1?' selected':''; ?>> Ativo </option>
                    <option value="0"<?php echo $users[0]->active==0?' selected':''; ?>> Inativo </option>
                  </select>
                </div>
              </div>
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>