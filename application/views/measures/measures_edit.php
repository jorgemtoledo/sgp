<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Medidas Disciplinares </h1>

          <div class="box-tools pull-right">
                <a class="btn btn-primary" href="<?php echo base_url() ?>measures" >
              <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a>
              <a class="btn btn-success" href="<?php echo base_url() ?>measures/listmeasures" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Medidas </a><br />
          </div>

          <h2 class="sub-header">Informações</h2>
          <!-- Versao do CI -->
          <!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'Codeigniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> </p> -->

          <div class="table-responsive">

       <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário </h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>measures/saveEditMeasure" method="post">
              <input type="hidden" id="id" name="id" value="<?php echo $result->dmid; ?>">

                <div class="form-group">

                  <div class="col-md-8">
                    <label>Funcionário:</label>
                    <select id="worker_id" name="worker_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value="<?php echo $result->wid; ?> "> <?php echo $result->ename; ?> </option>
                      <?php foreach ($workers as $worker) { ?>
                      <option value="<?php echo $worker->wid; ?>"> <?php echo $worker->ename; ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                    <div class='col-sm-3'>
                      <div class="form-group">
                      <label for="date">Data da Entrega no RH:</label>
                          <div class='input-group date' id='data'>
                              <input type='text' class="form-control text-center" id="data" name="delivery_date" value="<?php   $dmdeliverydate = strtotime(($result->dmdeliverydate)); echo date('d/m/Y', $dmdeliverydate);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                    </div>


                </div>
                <!-- Inicio / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->
                <div class="form-group">
                  <div class="col-md-3">
                    <label>Tipo Medida Disciplinar:</label>
                    <select id="type_measure_id" name="type_measure_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value="<?php echo $result->tmid; ?> "> <?php echo $result->tmname; ?> </option>
                      <?php foreach ($typeMeasures as $typeMeasure) { ?>
                      <option value="<?php echo $typeMeasure->id; ?>"> <?php echo $typeMeasure->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Motivo:</label>
                    <select id="reason_measure_id" name="reason_measure_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value="<?php echo $result->rmid; ?> "> <?php echo $result->rmname; ?> </option>
                      <?php foreach ($reasons as $reason) { ?>
                      <option value="<?php echo $reason->id; ?>"> <?php echo $reason->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-3">
                    <label for="date">Data Aplicação:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="application_date" name="application_date" value="<?php   $dmapplicationdate = strtotime(($result->dmapplicationdate)); echo date('d/m/Y', $dmapplicationdate);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>

                  <div class='col-sm-2'>
                      <div class="form-group">
                      <label for="date">Data(s) Ocorrência:</label>
                          <div class="row">
                            <div class="col-md-12">
                              <textarea class="form-control" id="occurrence_date" name="occurrence_date"  rows="2"><?php echo $result->dmoccurrencedate; ?></textarea>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
                <!-- Fim / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->

                <!-- Inicio / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->
                <div class="form-group">

                  <div class="col-md-3">
                    <label for="date">Inicio Afastamento:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="removal_start" name="removal_start" value="<?php   $dmremovalstart = strtotime(($result->dmremovalstart)); echo date('d/m/Y', $dmremovalstart);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>

                  <div class="col-md-3">
                    <label for="date">Fim Afastamento:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="removal_finish" name="removal_finish" value="<?php   $dmremovalfinish = strtotime(($result->dmremovalfinish)); echo date('d/m/Y', $dmremovalfinish);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>

                  <div class="col-md-3">
                    <label for="date">Retorno Afastamento:</label>
                      <div class='input-group date' id='data'>
                          <input type='text' class="form-control text-center" id="return_date" name="return_date" value="<?php   $dmreturndate = strtotime(($result->dmreturndate)); echo date('d/m/Y', $dmreturndate);
                ?>" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>

                  <div class='col-sm-2'>
                      <div class="form-group">
                      <label for="date">Total Afastamento:</label>
                          <div class="row">
                            <div class="col-md-12">
                              <textarea class="form-control" id="removal" name="removal"  rows="2"><?php echo $result->dmremoval; ?></textarea>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>

                <label>Observações:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description" name="description"  rows="4"><?php echo $result->dmdescription; ?></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Editar</button>
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


<script src="<?php echo base_url('assets/bootstrap-3.1.1/js/jquery-2.1.4.min.js') ?>"></script>




<script>
function calculaData() {

  var ddd111 = $("#datainicio").val().split("/");
    var ddd222 = $("#datafim").val().split("/");

  var datea = new Date(ddd111[2] + "/" + ddd111[1] + "/" + ddd111[0]);;
  var dateb = new Date(ddd222[2] + "/" + ddd222[1] + "/" + ddd222[0]);;

  if(datea.getTime() > dateb.getTime()) {
    alert('A data inicio tem que ser menor que data final!');
    return false;
    } else {
      var diferenca = Math.abs(datea - dateb); //diferença em milésimos e positivo

      // alert(ddd111);
        var daysApart = Math.abs(Math.round((datea-dateb)/86400000));
        var soma = daysApart + 1;
    }

  document.getElementById('number-day').lastChild.data = soma;
  soma3 = document.getElementById( 'number-day' ).innerHTML
  // alert(soma3);
  // teste
  document.getElementById("number_day").value = soma3;
// alert(document.getElementById("number_day").value);
}
</script>