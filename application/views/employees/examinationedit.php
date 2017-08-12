<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Informações</h1>

          <div class="box box-primary">
          <div class="box-header">
            <!-- Botao voltar -->
            <a href="<?php echo base_url('employees/examinationschedule'); ?>"  class="btn btn-primary">
            <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
            <!-- Fim Botao voltar -->
          </div>

          <div class="row">
            <div class="col-sm-12">
                <h3>Editar</h3>
                <form class="form-group" action="<?php echo base_url() ?>employees/saveEditexamination" method="post">
                <input type="hidden" class="form-control" name="id" value="<?php echo $result->eid; ?>">
                    <div class="row">
                    <div class="col-sm-7">
                    <div class="form-group">
                        <label for="employee_id">Nome:</label>
                        <input type="text" class="form-control" id="employee_id"  value="<?php echo $result->empname; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="form-group">
                        <label for="job_id">Cargo:</label>
                        <input type="text" class="form-control" id=""  name="" value="<?php echo $result->jname; ?>" disabled>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="registration">Matricula:</label>
                        <input type="text" class="form-control" id="" value="<?php echo $result->empregistration; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="" value="<?php echo $result->empcpf; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Data Contratação:</label>
                        <input type="text" class="form-control" id="" value="<?php   $ehiredate = strtotime(($result->emphiredate));echo date('d/m/y', $ehiredate);?>" disabled>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="examination_type">Tipo Exame:</label>
                        <?php
                                $job = $result->jid;
                                if ($job == 1 || $job == 9 || $job == 13) {?>
                                    <input type="text" class="form-control" name="" id="" value="Exame Clínico e Audiometria" disabled>

                                <?php } else {?>
                                    <input type="text" class="form-control"  name="" id="" value="Exame Clínico" disabled>

                        <?php } ?>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="examination_last">Ultimo Exame:</label>
                        <input type="text" class="form-control" name="" id="" value="<?php   $emphiredate = strtotime(($result->emphiredate));echo date('d/m/y', $ehiredate);?>" disabled>

                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <?php
                        $timestamp = strtotime(($result->emphiredate));
                        $previsionDate = date('Y-m-d', $timestamp);
                        // echo $previsionDate;
                        $dias = 365;
                        $datafinal = date('d/m/Y', strtotime("+{$dias} days",strtotime($previsionDate)));
                        // echo $datafinal;
                        ?>
                        <label for="examination_next">Previsão Proximo Exame</label>
                        <input type="text" class="form-control" id=""  name="" value="<?php echo $datafinal; ?>" disabled>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-3">
                    <div class="form-group has-success">
                      <label class="control-label" for="examination_scheduled" for="inputSuccess">Data para Agendar:</label>
                          <div class='input-group date' id='data'>
                              <!-- <input type='date' class="form-control" id="data" name="examination_scheduled" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required /> -->
                              <input type='text' class="form-control text-center" id="examination_scheduled" name="examination_scheduled" placeholder="DD/MM/AAAA" maxlength="10"  minlength="10"  OnKeyPress="formatar('##/##/####', this)" required />
                              <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                          </div>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="description">Observações</label>
                          <div>
                              <textarea class="form-control" id="description" name="description"  rows="4"><?php echo $result->edescription; ?></textarea>
                          </div>
                      </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </div>

                </form>

            </div>

          </div>

          </div><!-- /.view -->

          </div>
        </div>
<!-- Validate date -->
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