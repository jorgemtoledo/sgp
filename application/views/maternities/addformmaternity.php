<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Formulário Afastamento Maternidade</h1>

          <h2 class="sub-header">Informações</h2>
          <div class="table-responsive">

       <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário </h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>maternities/saveAddFormMaternity" method="post">
              <input type="hidden" id="id" name="id" value="<?php echo $result->mcid; ?>">

                <div class="form-group">

                  <div class="col-md-8">
                    <label>Funcionário:</label>
                    <select id="client_id" name="" class="form-control selectpicker" data-live-search="true" disabled>
                      <option value="<?php echo $result->eid; ?> "> <?php echo $result->ename; ?> </option>
                    </select>
                  </div>

                    <div class='col-sm-3'>
                      <div class="form-group">
                      <label for="date">Data da Entrega:</label>
                          <div class='input-group date' id='data'>
                              <input type='text' class="form-control text-center" id="data" name="delivery_date" value="<?php   $mcdeliverydate = strtotime(($result->mcdeliverydate)); echo date('d/m/Y', $mcdeliverydate);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" disabled />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- Inicio / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->
                <div class="form-group">
                  <div class="col-md-4">
                    <label for="date">Inicio do Afastamento:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="datainicio" name="start_certificate" value="<?php   $mcstartcertificate = strtotime(($result->mcstartcertificate)); echo date('d/m/Y', $mcstartcertificate);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" disabled />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                    <div class='col-sm-3'>
                      <div class="form-group">
                      <label for="date">Fim do Afastamento:</label>
                          <div class='input-group date' id='data'>
                              <input type='text' class="form-control text-center" id="datafim" name="finish_certificate" value="<?php   $mcfinishcertificate = strtotime(($result->mcfinishcertificate)); echo date('d/m/Y', $mcfinishcertificate); ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" disabled />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                    <label for="number_radio">Quantidade de Dias:</label>
                    <h4 class="text-center text-danger" ><strong id="number-day"><?php echo $result->mcnumberday; ?></strong></h4>
                  </div>
                </div>
                <!-- Fim / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->

                <!-- Inicio / Dados do atestado -->
                <div class="form-group">
                  <div class="col-md-3">
                    <label for="date">LICENÇA ENCERRADA?</label>
                      <div class="radio">
                      <label>
                        <input type="radio" name="finish_maternity" id="optionsRadios1" value="1">
                        SIM
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="finish_maternity" id="optionsRadios1" value="0" checked>
                       NÃO
                      </label>
                    </div>
                  </div>
                </div>
                <!-- Fim / Dados do Atestado  -->
                <label>Observações:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description" name="description"  rows="4" required></textarea><br />
                  </div>
                </div><br>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Cadastrar </button>
                        <input type="button" class="btn btn-default"  value="Voltar" onClick="history.go(-1)"> 
                    </div>
                </div>
            </form>
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

        </div>
      </div>
    </div>
</div>




