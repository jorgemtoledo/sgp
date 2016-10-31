<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar funcionário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>employees" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Funcionários </a>
          </div>

          <h2 class="sub-header">Informações</h2>
          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>employees/save_edit" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $result->eid; ?>">
              <div class="row">
              <div class="col-md-7">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $result->ename; ?>">
              </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $result->ecpf; ?>" required>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-3">
                  <label for="company_id">Nome da Empresa:</label>
                  <select id="company_id" name="company_id" class="form-control" required>
                    <option value="<?php echo $result->cid; ?>"><?php echo $result->cname; ?></option>
                    <?php foreach ($companies as $company) { ?>
                      <option value="<?php echo $company->id; ?>"> <?php echo $company->name; ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="job_id">Cargo na Empresa:</label>
                  <select id="job_id" name="job_id" class="form-control" required>
                    <option value="<?php echo $result->jid; ?>"> <?php echo $result->jname; ?> </option>
                    <?php foreach ($jobs as $job) { ?>
                      <option value="<?php echo $job->id; ?>"> <?php echo $job->name; ?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="situation_id">Situação na Empresa:</label>
                  <select id="situation_id" name="situation_id" class="form-control" required>
                    <option value="<?php echo $result->sid; ?>"> <?php echo $result->sname; ?> </option>
                    <?php foreach ($situations as $situation) { ?>
                      <option value="<?php echo $situation->id; ?>"> <?php echo $situation->name; ?> </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="registration">Registro:</label>
                    <input type="text" class="form-control" id="registration" name="registration" value="<?php echo $result->eregistration; ?>">
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class="form-group">
                  <label for="hire_date">Data de admissão:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="hire_date" name="hire_date" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" 
                                  value="<?php  $timestamp = strtotime(($result->ehiredate));
                                                    echo date('d/m/Y', $timestamp);
                                          ?>"
                          />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="workload">Carga Horária:</label>
                    <input type="text" class="form-control" id="workload" name="workload" value="<?php echo $result->eworkload; ?>">
                  </div>
                </div>
                <div class='col-sm-3'>
                  <div class="form-group">
                  <label for="birth_date">Data de aniverário:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="birth_date" name="birth_date"  maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)"
                                  value="<?php  $timestamp = strtotime(($result->ebirthdate));
                                                            echo date('d/m/Y', $timestamp);
                                                  ?>"
                          />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class='col-sm-3'>
                  <div class="form-group">
                  <label for="phone1">Telefone 1:</label>
                      <div class='input-group date' id='phone1'>
                          <input type='text' class="form-control text-center" id="phone1" name="phone1" value="<?php echo $result->ephone1; ?>" onkeypress="mask(this, mphone);" onblur="mask(this, mphones);"  />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-phone"></span>
                          </span>
                      </div>
                  </div>
                </div>
                <div class='col-sm-4'>
                  <div class="form-group">
                  <label for="phone2">Telefone 2:</label>
                      <div class='input-group date' id='phone2'>
                          <input type='text' class="form-control text-center" id="phone2" name="phone2" value="<?php echo $result->ephone2; ?>"  onkeypress="mask(this, mphone);" onblur="mask(this, mphones);"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-phone"></span>
                          </span>
                      </div>
                  </div>
                </div>
                <div class='col-sm-4'>
                  <div class="form-group">
                  <label for="phone3">Telefone 3:</label>
                      <div class='input-group' id='phone3'>
                          <input type='text' class="form-control text-center" id="phone3" name="phone3" value="<?php echo $result->ephone3; ?>"  onkeypress="mask(this, mphone);" onblur="mask(this, mphones);" />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-phone"></span>
                          </span>
                      </div>
                  </div>
                </div>
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
                            <input type='text' class="form-control text-center" id="resignation_date" name="resignation_date" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" 
                                    value="<?php  $timestamp = strtotime(($result->eresignationdate));
                                                      echo date('d/m/Y', $timestamp);
                                            ?>"
                            />
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

