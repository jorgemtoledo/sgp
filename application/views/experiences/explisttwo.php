<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">Cadastro do 1° Periodo de Experiência</h3>

                            <div class="box-header">
                                <!-- Botao voltar -->
                                <a href="<?php echo base_url('experiences/experiencesOne'); ?>"  class="btn btn-primary">
                                <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
                                <!-- Fim Botao voltar -->
                                <!-- Botao voltar -->
                                <!-- <a class="btn btn-warning" href="<?php echo base_url() ?>employees/examinationlists_Excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a> -->
                                <!-- Fim Botao voltar -->
                              </div><br>


        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
                <thead>
                    <tr>
                        <th class="text-center"><h6><strong>Nome</strong></h6></th>
                        <th class="text-center"><h6><strong>Cargo</strong></h6></th>
                        <th class="text-center"><h6><strong>Equipe</strong></h6></th>
                        <th class="text-center"><h6><strong>Contratado</strong></h6></th>
                        <th class="text-center"><h6><strong>Fim 1° Periodo</strong></h6></th>
                        <th class="text-center"><h6><strong>Dias</strong></h6></th>
                        <th class="text-center"><h6><strong>Avaliar</strong></h6></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $data = date('Y-m-d'); ?>
                    <?php foreach ($listexperiences as $listexperience) { ?>
                        <tr>

                              <?php
                                        $timestamp = strtotime(($listexperience->ehiredate));
                                        $datainicial = date('Y-m-d', $timestamp);
                                        $time_inicial = strtotime($datainicial);
                                        $time_final = strtotime($data);
                                        // Calcula a diferença de segundos entre as duas datas:
                                        $diferenca = $time_final - $time_inicial; // 19522800 segundos
                                        // Calcula a diferença de dias
                                        $countdays = (int)floor( $diferenca / (60 * 60 * 24));
                                        // echo $countdays;
                              ?>
                              <?php if ($countdays > 39) { ?>
                              <td class="danger"><h6><?php echo $listexperience->ename; ?></h6></td>
                              <td class="danger"><h6><?php echo $listexperience->jname; ?></h6></td>
                              <td class="danger"><h6><?php echo $listexperience->tname; ?></h6></td>


                              <td class="text-center danger"><h6>
                                <?php   $timestamp = strtotime(($listexperience->ehiredate));
                                    echo date('d/m/y', $timestamp);
                                ?>
                                </h6></td>

                                <td class="text-center danger"><h6>
                                <?php
                                $timestamp = strtotime(($listexperience->ehiredate));
                                $previsionDate = date('Y-m-d', $timestamp);
                                // echo $previsionDate;
                                $dias = 45;
                                $datafinal = date('d/m/y', strtotime("+{$dias} days",strtotime($previsionDate)));
                                echo $datafinal;
                                ?>
                                </h6></td>

                                <td class="danger"><h6>
                                <?php
                                        // echo $data;
                                        $datainicial = date('Y-m-d', $timestamp);
                                        $time_inicial = strtotime($datainicial);
                                        $time_final = strtotime($data);
                                        // Calcula a diferença de segundos entre as duas datas:
                                        $diferenca = $time_final - $time_inicial; // 19522800 segundos
                                        // Calcula a diferença de dias
                                        $dias = (int)floor( $diferenca / (60 * 60 * 24));
                                        echo $dias;
                                ?>
                                </h6></td>
                                <td class="danger text-center"><h6>
                                <?php $trainne = $listexperience->jid;
                                    if ($trainne == 35) {
                                } else{ ?>
                                    <a href="<?php echo base_url('experiences/experienceadd/'.$listexperience->eid); ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                <?php } ?>
                                </h6></td>
                                <?php } else  {?>
                                <td><h6><?php echo $listexperience->ename; ?></h6></td>
                                <td><h6><?php echo $listexperience->jname; ?></h6></td>
                                <td><h6><?php echo $listexperience->tname; ?></h6></td>
                                <td class="text-center"><h6>
                                <?php   $timestamp = strtotime(($listexperience->ehiredate));
                                    echo date('d/m/y', $timestamp);
                                ?>
                                </h6></td>

                                <td class="text-center"><h6>
                                <?php
                                $timestamp = strtotime(($listexperience->ehiredate));
                                $previsionDate = date('Y-m-d', $timestamp);
                                // echo $previsionDate;
                                $dias = 365;
                                $datafinal = date('d/m/y', strtotime("+{$dias} days",strtotime($previsionDate)));
                                echo $datafinal;
                                ?>
                                </h6></td>

                                <td><h6>
                                <?php
                                        // echo $data;
                                        $datainicial = date('Y-m-d', $timestamp);
                                        $time_inicial = strtotime($datainicial);
                                        $time_final = strtotime($data);
                                        // Calcula a diferença de segundos entre as duas datas:
                                        $diferenca = $time_final - $time_inicial; // 19522800 segundos
                                        // Calcula a diferença de dias
                                        $dias = (int)floor( $diferenca / (60 * 60 * 24));
                                        echo $dias;
                                ?>
                                </h6></td>
                                <td class="text-center"><h6>
                                <?php $trainne = $listexperience->jid;
                                    if ($trainne == 35) {
                                } else{ ?>
                                    <a href="<?php echo base_url('experiences/experienceadd/'.$listexperience->eid); ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                                <?php } ?>

                                </h6></td>

                                <?php } ?>

                                </tr>

                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>

</div>


