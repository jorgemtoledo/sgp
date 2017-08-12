<div id="page-wrapper">
  <div class="row">
      <h1 class="page-header">Agendamento Exame Periódicos</h1>

      <div class="box box-primary">
      <div class="box-header">
        <!-- Botao voltar -->
            <a href="<?php echo base_url('employees/examinations'); ?>"  class="btn btn-primary">
            <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
            <!-- Fim Botao voltar -->
      </div>
      </div><!-- /.view -->
    </div>

    <div class="row">

    </div>

    <div class="row">
    <h3 >Lista periódicos agendados ano: <?php echo $year; ?></h3>
    <hr>

    <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
                <thead>
                    <tr>
                    <th class="text-center"><h6><strong>Nome</strong></h6></th>
                    <th class="text-center"><h6><strong>Cargo</strong></h6></th>
                    <th class="text-center"><h6><strong>Equipe</strong></h6></th>
                    <th class="text-center"><h6><strong>Tipo Exame</strong></h6></th>
                    <th class="text-center"><h6><strong>Ultimo Exame</strong></h6></th>
                    <th class="text-center"><h6><strong>Proximo Exame</strong></h6></th>
                    <th class="text-center"><h6><strong>Exame Agendado</strong></h6></th>
                    <th class="text-center"><h6><strong>Dias</strong></h6></th>
                    <th class="text-center"><h6><strong>Confirmar</strong></h6></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($employees as $employee) {?>
                    <tr class="text-center">

                    <?php
                        $current_date = date('Y-m-d');
                        $data = $employee->escheduled;
                        $time_inicial = strtotime($current_date);
                        $time_final = strtotime($data);
                        // Calcula a diferença de segundos entre as duas datas:
                        $diferenca = $time_final - $time_inicial; // 19522800 segundos
                        // Calcula a diferença de dias
                        $days = (int)floor( $diferenca / (60 * 60 * 24));
                        $dayAbs = abs($days);
                        if ($dayAbs == 0 || $days < 0) { ?>


                        <td class="danger"><h6><?php echo $employee->empname; ?></h6></td>
                        <td class="danger"><h6><?php echo $employee->jname; ?></h6></td>
                        <td class="danger"><h6><?php echo $employee->tname; ?></h6></td>
                        <td class="danger"><h6><?php echo $employee->etype; ?></h6></td>
                        <td class="danger"><h6>
                            <?php
                                $datelast =  strtotime(($employee->elast));
                                echo date('d/m/y', $datelast);
                            ?>
                        </h6></td>
                        <td class="danger"><h6>
                            <?php
                                $datenext =  strtotime(($employee->enext));
                                echo date('d/m/y', $datenext);
                            ?>
                        </h6></td>
                        <td class="danger"><h6>
                            <?php
                                $datescheduled=  strtotime(($employee->escheduled));
                                echo date('d/m/y', $datescheduled);
                            ?>
                        </h6></td>

                        <td class="danger"><h6>
                        <?php
                            $current_date = date('Y-m-d');
                            $data = $employee->escheduled;
                            $time_inicial = strtotime($current_date);
                            $time_final = strtotime($data);
                            // Calcula a diferença de segundos entre as duas datas:
                            $diferenca = $time_final - $time_inicial; // 19522800 segundos
                            // Calcula a diferença de dias
                            $days = (int)floor( $diferenca / (60 * 60 * 24));
                             echo abs($days);
                        ?>
                        </h6></td>

                        <td class="text-center danger"><h6>
                            <a href="<?php echo base_url('employees/examinationview/'.$employee->eid); ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="<?php echo base_url('employees/checked/'.$employee->eid); ?>" class="btn btn-success btn-xs" onclick="return confirm('O exame periódico foi realizado?');"><i class="glyphicon glyphicon-ok"></i></a>
                        </h6></td>



                    <?php }  elseif ($dayAbs >=1 && $dayAbs < 11) { ?>

                        <td class="warning"><h6><?php echo $employee->empname; ?></h6></td>
                        <td class="warning"><h6><?php echo $employee->jname; ?></h6></td>
                        <td class="warning"><h6><?php echo $employee->tname; ?></h6></td>
                        <td class="warning"><h6><?php echo $employee->etype; ?></h6></td>
                        <td class="warning"><h6>
                            <?php
                                $datelast =  strtotime(($employee->elast));
                                echo date('d/m/y', $datelast);
                            ?>
                        </h6></td>
                        <td class="warning"><h6>
                            <?php
                                $datenext =  strtotime(($employee->enext));
                                echo date('d/m/y', $datenext);
                            ?>
                        </h6></td>
                        <td class="warning"><h6>
                            <?php
                                $datescheduled=  strtotime(($employee->escheduled));
                                echo date('d/m/y', $datescheduled);
                            ?>
                        </h6></td>

                        <td class="warning"><h6>
                        <?php
                            $current_date = date('Y-m-d');
                            $data = $employee->escheduled;
                            $time_inicial = strtotime($current_date);
                            $time_final = strtotime($data);
                            // Calcula a diferença de segundos entre as duas datas:
                            $diferenca = $time_final - $time_inicial; // 19522800 segundos
                            // Calcula a diferença de dias
                            $days = (int)floor( $diferenca / (60 * 60 * 24));
                             echo abs($days);
                        ?>
                        </h6></td>

                        <td class="text-center warning"><h6>
                            <a href="<?php echo base_url('employees/examinationview/'.$employee->eid); ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="<?php echo base_url('employees/checked/'.$employee->eid); ?>" class="btn btn-success btn-xs" onclick="return confirm('O exame periódico foi realizado?');"><i class="glyphicon glyphicon-ok"></i></a>
                        </h6></td>

                       <?php   } else { ?>

                        <td ><h6><?php echo $employee->empname; ?></h6></td>
                        <td ><h6><?php echo $employee->jname; ?></h6></td>
                        <td ><h6><?php echo $employee->tname; ?></h6></td>
                        <td ><h6><?php echo $employee->etype; ?></h6></td>
                        <td ><h6>
                            <?php
                                $datelast =  strtotime(($employee->elast));
                                echo date('d/m/y', $datelast);
                            ?>
                        </h6></td>
                        <td ><h6>
                            <?php
                                $datenext =  strtotime(($employee->enext));
                                echo date('d/m/y', $datenext);
                            ?>
                        </h6></td>
                        <td ><h6>
                            <?php
                                $datescheduled=  strtotime(($employee->escheduled));
                                echo date('d/m/y', $datescheduled);
                            ?>
                        </h6></td>

                        <?php
                            $current_date = date('Y-m-d');
                            $data = $employee->escheduled;
                            $time_inicial = strtotime($current_date);
                            $time_final = strtotime($data);
                            // Calcula a diferença de segundos entre as duas datas:
                            $diferenca = $time_final - $time_inicial; // 19522800 segundos
                            // Calcula a diferença de dias
                            $days = (int)floor( $diferenca / (60 * 60 * 24));
                        ?>
                        <td ><h6>
                        <?php echo abs($days);  ?>
                        </h6></td>

                        <td class="text-center"><h6>
                            <a href="<?php echo base_url('employees/examinationview/'.$employee->eid); ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <!-- <a href="<?php echo base_url('employees/checked/'.$employee->eid); ?>" class="btn btn-success btn-xs" onclick="return confirm('O exame periódico foi realizado?');"><i class="glyphicon glyphicon-ok"></i></a> -->
                        </h6></td>


               <?php } } ?>
               </tr>
                </tbody>
            </table>

        </div>


    </div>


</div>