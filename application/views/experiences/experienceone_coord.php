<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">1° Periodo de Experiência</h3>

                            <div class="box-header">
                                <!-- Botao voltar -->
                                <a href="<?php echo base_url('experiences/editExpOneCood'); ?>"  class="btn btn-primary">
                                <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
                              </div><br>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Periodo de Experiência
                                            </div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#home" data-toggle="tab">1° Periodo de Experiência</a>
                                                    </li>
                                                    <!-- <li class="disabled"><a href="" data-toggle="tab">2° Periodo de Experiência</a>
                                                    </li> -->
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="home">
                                                        <h4>Informações do Funcionário</h4>

                                                        <?php $id_user = $this->session->userdata('id'); ?>

                                                        <form class="form-group" action="<?php echo base_url() ?>experiences/saveEditExpCoordOne" method="post">
                                                            <input type="hidden" id="user_id" name="user_id" value="<?php  echo $id_user; ?>">
                                                            <input type="hidden" id="id" name="id" value="<?php  echo $empExperiences->eid; ?>">
                                                            <input type="hidden" id="worker_id" name="worker_id" value="<?php  echo $empExperiences->wid; ?>">
                                                            <div class="row">
                                                            <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label for="employee_id">Nome:</label>
                                                                <input type="text" class="form-control" id="employee_id"  value="<?php echo $empExperiences->empname; ?>" disabled>
                                                                <!-- <input type="hidden" class="form-control" name="employee_id" value="<?php echo $empExperiences->eid; ?>"> -->
                                                            </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="job_id">Cargo:</label>
                                                                <input type="text" class="form-control" id="job_id"  name="job_id" value="<?php echo $empExperiences->jname; ?>" disabled>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <div class="row">
                                                            <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="registration">Matricula:</label>
                                                                <input type="text" class="form-control" id="registration" value="<?php echo $empExperiences->empregistration; ?>" disabled>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name">Data Contratação:</label>
                                                                <input type="text" class="form-control" id="" name="" value="<?php   $ehiredate = strtotime(($empExperiences->ehiredate));echo date('d/m/y', $ehiredate);?>" disabled>
                                                                <input type="hidden"  id="hire_date" name="hire_date" value="<?php   $ehiredate = strtotime(($empExperiences->ehiredate));echo date('Y-m-d', $ehiredate);?>">
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="name"> Fim do Período de Experiência:</label>
                                                                <input type="text" id="" name=""  class="form-control" id="name"
                                                                        value="<?php
                                                                                            $timestamp = strtotime(($empExperiences->ehiredate));
                                                                                            $finishExperience = date('Y-m-d', $timestamp);
                                                                                            $dias = 90;
                                                                                            $viewFinalDate = date('d/m/Y', strtotime("+{$dias} days",strtotime($finishExperience)));
                                                                                            $finalDate = date('Y-m-d', strtotime("+{$dias} days",strtotime($finishExperience)));
                                                                                            echo $viewFinalDate;
                                                                                        ?>"
                                                                        disabled>
                                                                    <input type="hidden" id="final_experience" name="final_experience" value="<?php  echo $finalDate;?>">
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <h3 class="page-header text-center">Informações do 1° Periodo</h3>

                                                            <div class="row">
                                                            <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="team">Equipe:</label>
                                                                <input type="text" class="form-control" id="team_id1"  name="team_id1" value="<?php echo $empExperiences->tname; ?>" disabled>
                                                                <input type="hidden"  id="team_id1"  name="team_id1" value="<?php echo $empExperiences->tid; ?>">
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-7">
                                                            <div class="form-group">
                                                                <label for="name">Supervisor:</label>
                                                                <input type="text" class="form-control" id="supervisor_id1"  name="supervisor_id1" value="<?php echo $empExperiences->usupvname; ?>" disabled>
                                                                <input type="hidden" id="supervisor_id1"  name="supervisor_id1"   value="<?php  echo $di = $this->session->userdata('id'); ?>" >
                                                            </div>
                                                            </div>

                                                            </div>

                                                            <div class="row">
                                                            <div class="col-sm-3">
                                                            <div class="form-group has-success">
                                                                <label for="name" class="control-label" f  for="inputSuccess">Inicio do Período 1:</label>
                                                                <input type="text" class="form-control"  value="<?php   $ehiredate = strtotime(($empExperiences->ehiredate));echo date('d/m/y', $ehiredate);?>" disabled>
                                                                <!-- <input type="hidden" id="hire_date"  name="hire_date"   value="<?php  echo $empExperiences->ehiredate ?>" > -->
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                            <div class="form-group has-error">
                                                                <label for="name" class="control-label" for="inputError"> Fim do Período 1:</label>
                                                                <input type="text" class="form-control" id="name"
                                                                        value="<?php
                                                                                            $timestamp = strtotime(($empExperiences->ehiredate));
                                                                                            $finishExperience = date('Y-m-d', $timestamp);
                                                                                            $dias = 45;
                                                                                            $viewFinalDateExp = date('d/m/y', strtotime("+{$dias} days",strtotime($finishExperience)));
                                                                                            $finalDateExp = date('Y-m-d', strtotime("+{$dias} days",strtotime($finishExperience)));
                                                                                            echo $viewFinalDateExp;
                                                                                        ?>"
                                                                        disabled>
                                                                <input type="hidden" id="final_experience1"  name="final_experience1"   value="<?php  echo $finalDateExp; ?>" >
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <h3 class="page-header text-primary">Avaliação de Desempenho Operacional</h3>
                                                            <p><strong>Histórico de Vendas do Período</strong></p>
                                                            <div class="row">
                                                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label">1° Mês:</label>
                                                                <input type="number" class="form-control" id="sale1"  name="sale1" value="<?php echo $empExperiences->esale1; ?>" min="0" disabled>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label"> 2° Mês</label>
                                                                <input type="number" class="form-control" id="sale2"  value="<?php echo $empExperiences->esale2; ?>" name="sale2"  min="0" disabled>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_sales1" name="description_sales1"  rows="5" disabled><?php echo $empExperiences->edescriptionsales1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>

                                                            <h3 class="page-header text-warning">Avaliação Comportamental</h3>
                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_behavioral1" name="description_behavioral1"  rows="10" disabled><?php echo $empExperiences->edescriptionbehavioral1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>


                                                            <h3 class="page-header ">Frequência e Atestados Médicos</h3>
                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Frequencia</label>
                                                                  <div>
                                                                  <?php foreach ($attendances as $attendance) { ?>
                                                                    <p>1 - PRESENTE: <strong><?php  echo $attendance ->count1; ?></strong></p>
                                                                    <p>2 - FALTA: <strong><?php  echo $attendance ->count2; ?></strong></p>
                                                                    <p>3 - BANCO DE HORAS: <strong><?php  echo $attendance ->count3; ?></strong></p>
                                                                    <p>4 - FÉRIAS: <strong><?php  echo $attendance ->count4; ?></strong></p>
                                                                    <p>5 - INSS: <strong><?php  echo $attendance ->count5; ?></strong></p>
                                                                    <p>6 - ATESTADO: <strong><?php  echo $attendance ->count6; ?></strong></p>
                                                                    <p>7 - SUSPENSÃO: <strong><?php  echo $attendance ->count7; ?></strong></p>
                                                                    <p>8 - FOLGA: <strong><?php  echo $attendance ->count8; ?></strong></p>
                                                                    <p>9 - DEMITIDO: <strong><?php  echo $attendance ->count9; ?></strong></p>
                                                                    <p>10 - PRESENTE PARCIAL: <strong><?php  echo $attendance ->count10; ?></strong></p>
                                                                    <?php } ?>
                                                                  </div>

                                                                <label for="description">Atestados Médicos</label>
                                                                <div>
                                                                <?php foreach ($medical_certificates as $medical_certificate) { ?>
                                                                    <strong>Tipo Atestado: </strong>  <?php echo $medical_certificate->tcname  ?>
                                                                    <strong> - Inicio:</strong>
                                                                    <?php
                                                                        $timestamp = strtotime($medical_certificate->mcstart);
                                                                        echo date('d/m/y', $timestamp);
                                                                    ?>
                                                                    <strong> - Fim: </strong>
                                                                    <?php
                                                                        $timestamp = strtotime($medical_certificate->mcfinish);
                                                                        echo date('d/m/y', $timestamp);
                                                                    ?>
                                                                    <strong> - Qtd Dias: </strong> <?php echo $medical_certificate->mcnumber_day  ?>
                                                                    <strong> - Abona Falta? </strong>
                                                                    <?php
                                                                        $accredit = 1;
                                                                            if ($accredit == $medical_certificate->mcaccredit ) {
                                                                                echo "<span class='label label-success'>Sim</span>";
                                                                            } else {
                                                                                echo "<span class='label label-danger'>Não</span>";
                                                                            }
                                                                    ?>
                                                                    <br>
                                                                    <?php } ?>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_attendance1" name="description_attendance1"  rows="10" disabled> <?php echo $empExperiences->edescriptionattendance1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>


                                                            <h3 class="page-header text-primary">Avaliação Qualidade</h3>
                                                            <p><strong>Notas</strong></p>
                                                            <div class="row">
                                                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label">1° M:</label>
                                                                <input type="text" class="form-control" id="value_quality1"  name="value_quality1" value="<?php echo $empExperiences->evaluequality1; ?>"  disabled>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label"> 2° M</label>
                                                                <input type="text" class="form-control" id="value_quality2"  name="value_quality2" value="<?php echo $empExperiences->evaluequality2; ?>" disabled>
                                                            </div>
                                                            </div>

                                                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label"> 3° M</label>
                                                                <input type="text" class="form-control" id="value_quality3"  name="value_quality3" value="<?php echo $empExperiences->evaluequality3; ?>"  disabled>
                                                            </div>
                                                            </div>


                                                            <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label for="name" class="control-label"> Média do Período</label>
                                                                <input type="text" class="form-control" id="average_quality1" name="average_quality1" value="<?php echo $empExperiences->eaveragequality1; ?>" disabled>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_quality1" name="description_quality1"  rows="10" disabled><?php echo $empExperiences->edescriptionquality1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>

                                                            <h3 class="page-header  text-warning">Feedbacks e Medidas Disciplinares</h3>
                                                            <div class="row">
                                                            <div class="col-sm-8">
                                                            <div class="form-group">
                                                              <label for="description">Feedbacks</label>
                                                                  <div>
                                                                    <?php foreach ($listEditFeedbacks as $listEditFeedback) {
                                                                        echo "<p class='text-danger'><strong>Quem aplicou o feedback:</strong> " .  $listEditFeedback->fmanager . "<strong> Motivo: </strong>" .  $listEditFeedback->tpname . "</p>";
                                                                    } ?>
                                                                  </div>
                                                              </div>
                                                            </div>


                                                            <div class="col-sm-8">
                                                            <div class="form-group">
                                                              <label for="description">Dados Medidas</label>
                                                                  <div>
                                                                    <?php foreach ($disciplinary_measures as $disciplinary_measure) {
                                                                        echo "<p class='text-danger'><strong>Tipo de Medida:</strong> " .  $disciplinary_measure->tmname . "<strong> Motivo: </strong>" .  $disciplinary_measure->rmname . "<p>";
                                                                    } ?>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_measure1" name="description_measure1"  rows="10" disabled><?php echo $empExperiences->edescriptionmeasure1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>

                                                            <h3 class="page-header  text-danger">Parecer Supervisor</h3>
                                                            <div class="row">
                                                            <div class="col-sm-8">
                                                            <div class="form-group">
                                                                        <label>PARECER</label>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="radio" name="sup_approved1" id="sup_approved1" value="1" <?= $empExperiences->esupapproved1 == "1" ? "checked=\"checked\"" : ""; ?> disabled>APROVADO
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="radio" name="sup_approved1" id="sup_approved1" value="0" <?= $empExperiences->esupapproved1 == "0" ? "checked=\"checked\"" : ""; ?> disabled>REPROVADO
                                                                            </label>
                                                                        </div>
                                                              </div>
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label for="coordinator_id1"> Coordenador:</label>
                                                                <select id="coordinator_id1" name="coordinator_id1" class="form-control" disabled>
                                                                    <option value="<?php echo $coord[0]->uid; ?>"> <?php echo $coord[0]->uname; ?> </option>
                                                                    <?php foreach ($listCoordenators as $listCoordenator) { ?>
                                                                      <option value="<?php echo $listCoordenator->uid; ?>"> <?php echo $listCoordenator->uname; ?> </option>
                                                                    <?php } ?>
                                                                  </select>
                                                            </div>
                                                            </div>

                                                            </div>
                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_sup1" name="description_sup1"  rows="10" disabled><?php echo $empExperiences->edescriptionsup1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>

                                                            <h3 class="page-header  text-info">Parecer Coordenador</h3>
                                                            <div class="row">
                                                            <div class="col-sm-8">
                                                            <div class="form-group">
                                                                        <label>PARECER</label>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="radio" name="coordinator_id1" id="coordinator_id1" value="1" <?= $empExperiences->ecoordapproved1 == "1" ? "checked=\"checked\"" : ""; ?>>APROVADO
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="radio" name="coordinator_id1" id="coordinator_id1" value="0" <?= $empExperiences->ecoordapproved1 == "0" ? "checked=\"checked\"" : ""; ?>>REPROVADO
                                                                            </label>
                                                                        </div>
                                                              </div>
                                                            </div>
                                                            </div>

                                                            <div class="row">
                                                            <div class="col-sm-12">
                                                            <div class="form-group">
                                                              <label for="description">Comentários</label>
                                                                  <div>
                                                                      <textarea class="form-control" id="description_coord1" name="description_coord1"  rows="10"><?php echo $empExperiences->edescriptioncoord1; ?></textarea>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                            </div>



                                                            <!-- <div class="row">
                                                            <div class="col-sm-8">
                                                            <div class="form-group">
                                                                        <label>Finalizar Avaliação</label>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="radio" name="finish_pediod1" id="finish_pediod1" value="1" <?= $empExperiences->efinishperiod1 == "1" ? "checked=\"checked\"" : ""; ?>>Sim
                                                                            </label>
                                                                        </div>
                                                                        <div class="radio">
                                                                            <label>
                                                                                <input type="radio" name="finish_pediod1" id="finish_pediod1" value="0" <?= $empExperiences->efinishperiod1 == "0" ? "checked=\"checked\"" : ""; ?>>Não
                                                                            </label>
                                                                        </div>
                                                              </div>
                                                            </div>
                                                            </div> -->

                                                            <div class="form-group">
                                                                <div class="col-sm-3">
                                                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                                                </div>
                                                            </div>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.panel-body -->
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                </div>

    </div>

</div>


