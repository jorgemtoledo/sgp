<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Atestados</h1>

          <div class="box-tools pull-right">
                
                <a class="btn btn-primary" href="<?php echo base_url() ?>certificates/index/" >
              <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a>
              <a class="btn btn-success" href="<?php echo base_url() ?>medical_certificates/listmedicalcertificates" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Atestados </a><br />
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

              <form class="form-horizontal" role="form" action="<?php echo base_url() ?>medical_certificates/saveMedicalCertificate" method="post">
              <input type="hidden" id="sac" name="sac" value="0">

              <!-- Inicio / Medico  -->
                <!-- <div class="form-group">
                  <div class="col-md-9">
                    <label>Médico:</label>
                    <input type="text" id="doctor" autocomplete="off" name="doctor_id" class="form-control" placeholder="Digite o nome do médico">
                    <ul class="dropdown-menu txtdoctor" role="menu" aria-labelledby="dropdownMenu"  id="DropdownDoctor"></ul>
                  </div>
                  <div class="col-md-2" data-toggle="modal" data-target="#doctorModal">
                    <label>Cadastrar:</label>
                      <a class="btn btn-danger" >
                      <i class="glyphicon glyphicon-plus"></i>   MÉDICO </a>
                  </div>
                </div> -->
                <!-- Fim / Medico  -->

                <!-- Inicio / Medio  -->
                <div class="form-group">
                  <div class="col-md-9">
                    <label>Medico:</label>
                    <select id="doctor_id" name="doctor_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione o Medico </option>
                      <?php foreach ($doctors as $doctor) { ?>
                      <option value="<?php echo $doctor->id; ?>"> <?php echo $doctor->name . " - CRM: " . $doctor->crm ; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-2" data-toggle="modal" data-target="#doctorModal">
                    <label>Cadastrar:</label>
                      <a class="btn btn-danger" >
                      <i class="glyphicon glyphicon-plus"></i>   MÉDICO </a>
                  </div>
                  </div>

                <!-- Fim / Medio & Posto de Saude  -->

                <!-- Inicio / Posto de Saude  -->
                <!-- <div class="form-group">
                  <div class="col-md-9">
                    <label>Posto de Saúde:</label>
                    <input type="text" id="health" autocomplete="off" name="health_station_id" class="form-control" placeholder="Digite o nome do posto">
                    <ul class="dropdown-menu txthealth" role="menu" aria-labelledby="dropdownMenu"  id="DropdownHealth"></ul>
                  </div>
                  <div class="col-md-2" data-toggle="modal" data-target="#healthModal">
                    <label>Cadastrar:</label>
                      <a class="btn btn-warning">
                      <i class="glyphicon glyphicon-plus"></i>   Posto </a>
                  </div>
                </div> -->
                <!-- Fim / Posto de Saude  -->

                <!-- Inicio / Posto de Saude  -->
                <div class="form-group">
                  <div class="col-md-9">
                    <label>Posto de Saúde:</label>
                    <select id="health_station_id" name="health_station_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($healths as $health) { ?>
                      <option value="<?php echo $health->id; ?>"> <?php echo $health->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-2" data-toggle="modal" data-target="#healthModal">
                    <label>Cadastrar:</label><br />
                      <a class="btn btn-warning">
                      <i class="glyphicon glyphicon-plus"></i>   Posto </a>
                  </div>
                </div>
                <!-- Fim / Posto de Saude  -->

                <!-- Inicio / CID complete  -->
                 <!-- <div class="form-group">
                  <div class="col-md-9">
                    <label>CID:</label>
                    <input type="text" id="cid" autocomplete="on" name="cid_id" class="form-control" placeholder="Digite o CID/Doença aqui">
                    <ul class="dropdown-menu txtcid" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCid"></ul>
                  </div>
                  <div class="col-md-2" data-toggle="modal" data-target="#myModal">
                    <label>Cadastrar:</label>
                      <a class="btn btn-primary" >
                      <i class="glyphicon glyphicon-plus"></i>   CID </a>
                  </div>
                </div>  -->

                <!-- Inicio / CID  -->
                <div class="form-group">
                  <div class="col-md-9">
                    <label>CID:</label>
                    <input type="text" id="buscaComplete" class="form-control" placeholder="Digite somente o codigo do CID">
                    
                  </div>
                  <div class="col-md-2" data-toggle="modal" data-target="#myModal">
                    <label>Cadastrar:</label><br />
                      <a class="btn btn-primary" >
                      <i class="glyphicon glyphicon-plus"></i>   CID </a>
                  </div>
                  <div class="col-md-11">
                    <label>Informações do CID:</label>
                    <div class="row">
                      <div class="col-md-11">
                        <input type="text" class="form-control" id="name" disabled="disabled"><br />
                        <input type="hidden" name="cid_id" id="cid_id" value="">
                      </div>
                    </div><br>
                  </div>


                </div>
                <!-- Fim / CID  -->

                <div class="form-group">

                  <!-- <div class="col-md-8">
                    <label>Funcionário:</label>
                    <select id="client_id" name="worker_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($workers as $worker) { ?>
                      <option value="<?php echo $worker->wid; ?>"> <?php echo $worker->ename; ?> </option>
                      <?php } ?>
                    </select>
                  </div> -->

                  <div class="col-md-8">
                    <label>Funcionário:</label>
                    <input type="text" id="buscaComplete_employees" class="form-control" placeholder="Nome do funcioario!">
                    
                  </div>

                    <div class='col-sm-3'>
                      <div class="form-group">
                      <label for="date">Data da Entrega:</label>
                          <div class='input-group date' id='data'>
                              <input type='date' class="form-control" id="data" name="delivery_date" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-4">
                    <label class="text-danger">Quantidade de Atestados no Sistema:</label>
                    <div class="row">
                      <div class="col-md-5">
                        <input type="text" class="form-control text-center" id="employee_id" disabled="disabled"><br />
                        <input type="hidden" class="form-control text-center" name="worker_id"id="worker_id"><br />
                        <!-- <input type="hidden" name="employee_id" id="employee_id" value=""> -->
                      </div>
                    </div>
                  </div>

                </div>
                <!-- Inicio / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->
                <div class="form-group">
                  <div class="col-md-4">
                    <label for="date">Inicio do Afastamento:</label>
                      <div class='input-group date' id='data'>
                          <input type='date' class="form-control text-center" id="datainicio" name="start_certificate" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                  </div>
                    <div class='col-sm-3'>
                      <div class="form-group">
                      <label for="date">Fim do Afastamento:</label>
                          <div class='input-group date' id='data'>
                              <input type='date' class="form-control text-center" id="datafim" name="finish_certificate" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                    <label for="number_radio">Quantidade de Dias:</label>
                    <h4 class="text-center text-danger" ><strong id="number-day">0</strong></h4>
                    <input type="hidden" name="number_day" id="number_day" value="">
                    <!-- <input type="text" class="form-control" id="number_day" name="number_day" placeholder="Quantidade de Dias"> -->
                    <!-- <input type="text" class="form-control" id="number_day" name="number_day" placeholder="Quantidade de Dias"> -->
                  </div>
                  <div class="col-md-2">
                    <label>Calcular Dias:</label>
                    <!-- Calcula valor de Dias -->
                    <input type="button" class="btn btn-info" value="Calcular" onclick="calculaData()" />
                  </div>
                </div>
                <!-- Fim / Datas de Inicio de Afastamento de Fim do Afastamento e calculo de dias afastado -->

                <!-- Inicio / Dados do atestado -->
                <div class="form-group">
                  <div class="col-md-3">
                    <label for="date">Abona a Falta?</label>
                      <div class="radio">
                      <label>
                        <input type="radio" name="accredit" id="optionsRadios1" value="1" checked>
                        SIM
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="accredit" id="optionsRadios1" value="0">
                       NÃO
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label>Horário de Afastamento:</label>
                    <select id="day_off_id" name="day_off_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($dayOffs as $dayOff) { ?>
                      <option value="<?php echo $dayOff->id; ?>"> <?php echo $dayOff->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Tipo de Atestado:</label>
                    <select id="type_certificate_id" name="type_certificate_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($typeCertificates as $typeCertificate) { ?>
                      <option value="<?php echo $typeCertificate->id; ?>"> <?php echo $typeCertificate->name; ?> </option>
                      <?php } ?>
                    </select>
                  </div>

                </div>
                <!-- Fim / Dados do Atestado  -->


                <label>Observações:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="description" name="description"  rows="4"></textarea><br />
                  </div>
                </div><br>

                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="reset" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>

            <!-- Modal  CID -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Código Internacional de Doenças - CID 10</h4>
                  </div>
                  <div class="modal-body">

                  <form method="POST" onsubmit="return upCid();" id="cidForm">
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">Código:</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Código CID" required>
                        </div>

                        <div class="col-md-12 form-group">
                          <label for="description">Descrição CID:</label>
                          <input type="text" class="form-control" id="description" name="description" placeholder="Descrição CID" required>
                        </div>

                      </div>

                      <div class="modal-footer">
                    <button type="submit" id="submitcid" class="btn btn-primary" value="Reload Page" onClick="window.location.reload()">Cadastrar</button>
                  </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
            <!-- Fim modal  CID -->

            <!-- Modal  Medico -->
            <div class="modal fade" id="doctorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Medico</h4>
                  </div>
                  <div class="modal-body">

                  <form method="POST" onsubmit="return upDoctor();" id="doctorForm">
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">Dados Medico:</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome do médico" required><br />
                          <input type="text" class="form-control" id="crm" name="crm" placeholder="Informe o crm do médico" required>
                        </div>

                      </div>

                      <div class="modal-footer">
                    <button type="submit" id="submitdoctor" class="btn btn-primary" value="Reload Page" onClick="window.location.reload()">Cadastrar</button>
                  </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
            <!-- Fim modal  Medico -->

            <!-- Modal  Posto de Saúde -->
            <div class="modal fade" id="healthModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Postos de Saúde</h4>
                  </div>
                  <div class="modal-body">

                  <form method="POST" onsubmit="return upHealthStations();" id="healthForm">
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label for="name">Nome do Posto:</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Informe o nome do posto" required><br />
                        </div>

                      </div>

                      <div class="modal-footer">
                    <button type="submit" id="submithealth" class="btn btn-primary" value="Reload Page" onClick="window.location.reload()">Cadastrar</button>
                  </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>
            <!-- Fim modal  Posto de Saúde -->


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
                $("#name").val(ui.item.name);
                $("#employee_id").val(ui.item.id);
                $("#worker_id").val(ui.item.worker_id);

                //var valor_id = document.getElementById('employee_id');
                // var valor_id = document.getElementById('employee_id');
                // alert(valor_id.value);
                }
            });
        });


    </script>

<script type="text/javascript">
function upCid(){
dataString = $("#cidForm").serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>medical_certificates/saveCid2",
        data:dataString,
        success:function (data) {
            alert('Cadastro com Sucesso');
            document.getElementById('submitcid').disabled = true; // desabilitar
        }
    });
    event.preventDefault();
};
</script>

<script type="text/javascript">
function upDoctor(){
dataString = $("#doctorForm").serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>medical_certificates/savedoctor2",
        data:dataString,
        success:function (data) {
            alert('Cadastro com Sucesso');
            document.getElementById('submitdoctor').disabled = true; // desabilitar
        }
    });
    event.preventDefault();
};
</script>

<script type="text/javascript">
function upHealthStations(){
dataString = $("#healthForm").serialize();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url(); ?>medical_certificates/saveHealthStation2",
        data:dataString,
        success:function (data) {
            alert('Cadastro com Sucesso');
            document.getElementById('submithealth').disabled = true; // desabilitar
        }
    });
    event.preventDefault();
};
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