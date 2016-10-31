<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar novo usuário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>users" ><i class="glyphicon glyphicon-list-alt"></i>   Listar usuários </a>
          </div>

          <h2 class="sub-header">Informações do usuário</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>users/saveuser" method="post">
              <div class="row">
              <div class="col-md-7">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Usuário" required>
              </div>
                <!-- <div class="col-md-4">
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
                    <input type="email" class="form-control" id="email" name="email" placeholder="Informe o email para acesso." required>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha de acesso" required>
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="level">Nivel de acesso:</label>
                  <select id="level" name="level" class="form-control" required>
                    <option value=" "> Selecione </option>
                    <option value="1"> Administrador </option>
                    <option value="2"> RH </option>
                    <option value="3"> Coordenador/Analista </option>
                    <option value="4"> Supervisor </option>
                    <option value="5"> Operador </option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <label for="active">Status:</label>
                  <select id="active" name="active" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> Ativo </option>
                    <option value="0"> Inativo </option>
                  </select>
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

        <!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#employee_id').multiselect();
    });
</script>