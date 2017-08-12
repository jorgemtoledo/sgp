<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Informações </h1>

          <div class="box box-primary">
          <div class="box-header">
            <!-- Botao voltar -->
            <a class="btn btn-primary" onClick="history.go(-1)" >
            <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
            <!-- Fim Botao voltar -->
          </div>

          <div class="row">
            <div class="col-sm-12">
                <h3>Dados</h3>
                <form class="form-group" action="<?php echo base_url() ?>employees/saveexaminations" method="post">
                    <div class="row">
                    <div class="col-sm-7">
                    <div class="form-group">
                        <label for="employee_id">Nome:</label>
                        <input type="text" class="form-control" id="employee_id"  value="<?php echo $result->empname; ?>" disabled>
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
                        <input type="text" class="form-control" id="registration" value="<?php echo $result->empregistration; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" class="form-control" id="cpf" value="<?php echo $result->empcpf; ?>" disabled>
                    </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="form-group">
                        <label for="name">Data Contratação:</label>
                        <input type="text" class="form-control" id="name" value="<?php   $ehiredate = strtotime(($result->emphiredate));echo date('d/m/y', $ehiredate);?>" disabled>
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
                        <label for="examination_last">Ultimo Exame</label>
                        <input type="text" class="form-control" name="examination_last" id="examination_last" value="<?php   $elast = strtotime(($result->elast));echo date('d/m/y', $elast);?>" disabled>
                        <input type="hidden" class="form-control" name="examination_last" value="<?php   $elast = strtotime(($result->elast));echo date('d/m/Y', $elast);?>">
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
                        <input type="text" class="form-control" id="examination_next"  name="examination_next" value="<?php echo $datafinal; ?>" disabled>
                        <input type="hidden" class="form-control" name="examination_next" value="<?php echo $datafinal; ?>">
                    </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-4">
                    <div class="form-group has-success">
                      <label class="control-label" for="examination_scheduled" for="inputSuccess">Data Agendada:</label>
                        <input type="text" class="form-control" name="examination_scheduled" id="examination_scheduled" value="<?php   $escheduled = strtotime(($result->escheduled));echo date('d/m/y', $escheduled);?>" disabled>
                      </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="description">Observações</label>
                          <div>
                              <textarea class="form-control" id="description" name="description"  rows="4" disabled><?php echo $result->edescription; ?></textarea>
                          </div>
                      </div>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-3">
                            <a href="<?php echo base_url('employees/examinationedit/'.$result->eid); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                        </div>
                    </div>
                </form>





            </div>

          </div>

          </div><!-- /.view -->

          </div>
        </div>
