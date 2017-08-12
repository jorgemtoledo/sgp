<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Demitir funcionário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>employees" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Funcionários </a>
          </div>

          <h2 class="sub-header">Informações</h2>
          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>employees/save_dismiss" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $result->eid; ?>">
              <div class="row">
              <div class="col-md-7">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $result->ename; ?>" disabled>
              </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="" name="" value="<?php echo $result->ecpf; ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-4">
                  <label for="situation_id">Situação na Empresa:</label>
                  <select id="situation_id" name="situation_id" class="form-control" required>
                    <option value=""> Selecione </option>
                    <?php foreach ($situations as $situation) { ?>
                      <option value="<?php echo $situation->id; ?>"> <?php echo $situation->name; ?> </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">

              </div>
              <div class="row">
                <div class='col-sm-11'>
                  <div class="form-group">
                  <label>Informações Adicionais</label>
                      <div>
                          <textarea class="form-control" id="description" name="description" rows="5"><?php echo $result->edescription; ?></textarea>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class='col-sm-3'>
                    <div class="form-group">
                    <label for="hire_date">Data de Demissão</label><br /><i>(Data de demissão da Carteira)</i>
                        <div class='input-group date' id='data'>
                            <input type='text' class="form-control text-center" id="resignation_date" name="resignation_date"  placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)"
                                    value=""  required />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                  </div>
                </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>

        <script type="text/javascript">
            // máscara de cep rg, cpf etc
            function formatar(mascara, documento){
                var i = documento.value.length;
                var saida = mascara.substring(0,1);
                var texto = mascara.substring(i)
                if (texto.substring(0,1) != saida){
                    documento.value += texto.substring(0,1);
                }
            }
        </script>
        <script>
            // máscara de telefones
            function mask(o, f) {
                setTimeout(function () {
                  var v = mphone(o.value);
                  if (v != o.value) {
                      o.value = v;
                  }
                }, 1);
                }

                function mphone(v) {
                var r = v.replace(/\D/g,"");
                r = r.replace(/^0/,"");
                if (r.length > 10) {
                  // 11+ digits. Format as 5+4 Pode Adicionar mais numeros.
                  r = r.replace(/^(\d\d)(\d{4})(\d{4}).*/,"($1) $2-$3");
                }
                else if (r.length > 5) {
                  // 6..10 digits. Format as 4+4
                  r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/,"($1) $2-$3");
                }
                else if (r.length > 2) {
                  // 3..5 digits. Add (0XX..)
                  r = r.replace(/^(\d\d)(\d{0,5})/,"($1) $2");
                }
                else {
                  // 0..2 digits. Just add (0XX
                  r = r.replace(/^(\d*)/, "($1");
                }
                return r;
              }
        </script>

