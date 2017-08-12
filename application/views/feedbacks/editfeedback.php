<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Editar Feedback </h1>

          <div class="box-tools pull-right">
                  <!-- Botao voltar -->
                  <a class="btn btn-primary" onClick="history.go(-1)" >
                  <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
                  <!-- Fim Botao voltar -->
          </div>

          <h2 class="sub-header">Informações</h2>

          <div class="table-responsive">

       <div class="panel panel-default">
          <div class="panel-heading">
               <h3 class="panel-title"><i class="glyphicon glyphicon-list-alt"></i> Formulário </h3>
          </div>

          <div class="panel-body">

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>feedbacks/saveEditFeedback" method="post">
              <input type="hidden" id="id" name="id" value="<?php echo $result->fid; ?>">

                <div class="form-group">

                  <div class="col-md-8">
                    <label>Gestor:</label>
                    <input type="text" id="manager" name="manager" class="form-control" value="<?php echo $result->fmanager; ?>" ddrequired>
                  </div>

                    <div class='col-sm-3'>
                      <div class="form-group">
                      <label for="date">Data de Cadastro:</label>
                          <div class='input-group date' id='data'>
                              <input type='text' class="form-control text-center" id="" name=""  value="<?php echo date("d/m/Y") ; ?>" disabled />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>

                </div>

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
                      <label>Motivo:</label>
                      <select id="type_feedback_id" name="type_feedback_id" class="form-control selectpicker" data-live-search="true" required>
                        <option value="<?php echo $result->tpid; ?> "> <?php echo $result->tpname; ?> </option>
                        <?php foreach ($type_feedbacks as $type_feedback) { ?>
                        <option value="<?php echo $type_feedback->id; ?>"> <?php echo $type_feedback->name; ?> </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                </div>

                <label>Ponto(s) Positivo(s):</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="strengths" name="strengths"  rows="4"><?php echo $result->fstrengths; ?></textarea><br />
                  </div>
                </div>

                <label>Ponto(s) Melhoria(s):</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="improvements" name="improvements"  rows="4"><?php echo $result->fimprovements; ?></textarea><br />
                  </div>
                </div>

                <label>Feedback para o Gestor:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="feed_manager" name="feed_manager"  rows="4"><?php echo $result->ffeedmanager; ?></textarea><br />
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