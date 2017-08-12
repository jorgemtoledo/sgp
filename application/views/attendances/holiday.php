<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Controle Afastamento / Férias </h1>

          <div class="box-tools pull-right">
              <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br />
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

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>attendances/saveHoliday" method="post">
              <input type="hidden" class="form-control text-center" name="alert" id="alert" value="1">
                <div class="form-group">
                  <div class="col-md-11">
                    <label>Funcionário:</label>
                    <input type="text" id="buscaComplete_employees" class="form-control" placeholder="Nome do funcionario!" required>
                    <input type="hidden" class="form-control text-center" name="worker_id" id="worker_id">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-5">
                     <label>Tipo </label>
                    <select id="type_attendance_id" name="type_attendance_id" class="form-control selectpicker" data-live-search="true" required>
                        <option value=""> Selecione </option>
                        <?php foreach ($typeAttendances as $typeAttendance) { ?>
                      <option value="<?php echo $typeAttendance->id; ?>"> <?php echo $typeAttendance->name . " - " . $typeAttendance->sgl ; ?> </option>
                      <?php } ?>
                      </select>
                  </div>
                    <div class='col-sm-3'>
                      <label for="date">Data de Inicio:</label>
                          <div class='input-group date' id='data'>
                               <input type='date' class="form-control text-center" id="data" name="dateStart" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                  </div>

                  <div class='col-sm-3'>
                      <label for="date">Data de Fim:</label>
                          <div class='input-group date' id='data'>
                              <input type='date' class="form-control text-center" id="data" name="dateFinish" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                  </div>
                </div>

                <label>Descrição:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description" name="description"  rows="4"></textarea><br />
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
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
     $(function () {
        $("#buscaComplete").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('medical_certificates/get_dados'); ?>',
            select:function(event, ui){
                $("#name").val(ui.item.description);
                $("#cid_id").val(ui.item.id);
                }
            });
        });
    </script>

    <script>
     $(function () {
        $("#buscaComplete_employees").autocomplete({
            minLength:0,
            delay:0,
            source:'<?php echo site_url('medical_certificates/get_dados_emmployees'); ?>',
            select:function(event, ui){
                $("#name_employee").val(ui.item.name);
                $("#employee_id").val(ui.item.id);
                $("#employee_id2").val(ui.item.id2);
                $("#employee_inss").val(ui.item.idinss);
                $("#employee_maternity").val(ui.item.idmaternity);
                $("#worker_id").val(ui.item.worker_id);

                var valor_id = document.getElementById('worker_id');
                // alert(valor_id.value);
                }
            });
        });


    </script>



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