<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Agendar Exames Periódicos</h1>

          <div class="box box-primary">
          <div class="box-header">
            <!-- Botao voltar -->
            <a href="<?php echo base_url('employees/examinationlists'); ?>"  class="btn btn-primary">
            <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
            <!-- Fim Botao voltar -->
          </div>

            <!-- Descobrir o tipo de navegaodr -->
            <?php
            // $lista = array('MSIE', 'Firefox');
            // $navegador_usado = $_SERVER['HTTP_USER_AGENT'];
            // foreach ($lista as $value) {
                // if(strrpos($navegador_usado, $value)){
                    // $navegador = $value;
                    // echo $navegador;
                // }
            // }
            ?>
            <!-- Fim descobrir o tipo de navegaodr -->

          <div class="row">
            <div class="col-sm-12">
                <h3>Agendar</h3>
                <form class="form-group" action="<?php echo base_url() ?>employees/saveexaminations" method="post">
                    <div class="row">
                    <div class="col-sm-7">
                    <div class="form-group">
                        <label for="employee_id">Nome:</label>
                        <input type="text" class="form-control" id="employee_id"  value="<?php echo $result->ename; ?>" disabled>
                        <input type="hidden" class="form-control" name="employee_id" value="<?php echo $result->eid; ?>">
                    </div>
                    </div>
                    <div class="col-sm-5">
                    <div class="form-group">
                        <label for="job_id">Cargo:</label>
                        <input type="text" class="form-control" id="job_id"  name="job_id" value="<?php echo $result->jname; ?>" disabled>
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="registration">Matricula:</label>
                        <input type="text" class="form-control" id="registration" value="<?php echo $result->eregistration; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" value="<?php echo $result->ecpf; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Data Contratação:</label>
                        <input type="text" class="form-control" id="name" value="<?php   $ehiredate = strtotime(($result->ehiredate));echo date('d/m/y', $ehiredate);?>" disabled>
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
                                    <input type="text" class="form-control" name="examination_type" id="examination_type" value="Exame Clínico e Audiometria" disabled>
                                    <input type="hidden" class="form-control" name="examination_type" value="Exame Clínico e Audiometria">
                                <?php } else {?>
                                    <input type="text" class="form-control"  name="examination_type" id="examination_type" value="Exame Clínico" disabled>
                                    <input type="hidden" class="form-control" name="examination_type" value="Exame Clínico">
                        <?php } ?>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="examination_last">Data Exame Admissional:</label>
                        <input type="text" class="form-control" name="examination_last" id="examination_last" value="<?php   $ehiredate = strtotime(($result->ehiredate));echo date('d/m/y', $ehiredate);?>" disabled>
                        <input type="hidden" class="form-control" name="examination_last" value="<?php   $ehiredate = strtotime(($result->ehiredate));echo date('d/m/Y', $ehiredate);?>">
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <?php
                        $timestamp = strtotime(($result->ehiredate));
                        $previsionDate = date('Y-m-d', $timestamp);
                        // echo $previsionDate;
                        $dias = 365;
                        $datafinal = date('d/m/Y', strtotime("+{$dias} days",strtotime($previsionDate)));
                        // echo $datafinal;
                        ?>
                        <label for="examination_next">Previsão 1° Exame Periódico</label>
                        <input type="text" class="form-control" id="examination_next"  name="examination_next" value="<?php echo $datafinal; ?>" disabled>
                        <input type="hidden" class="form-control" name="examination_next" value="<?php echo $datafinal; ?>">
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
                              <textarea class="form-control" id="description" name="description"  rows="4"></textarea>
                          </div>
                      </div>
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
