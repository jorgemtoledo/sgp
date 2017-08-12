<div class="container">

<div id="page-wrapper">
    <div class="row">
        <h3 class="page-header">Lista do 1° Periodo de Experiência</h3>

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
                        <th class="text-center"><h6><strong>Funcionário</strong></h6></th>
                        <th class="text-center"><h6><strong>Equipe</strong></h6></th>
                        <th class="text-center"><h6><strong>Supervisor</strong></h6></th>
                        <th class="text-center"><h6><strong>Coordenador</strong></h6></th>
                        <th class="text-center"><h6><strong>Contratado</strong></h6></th>
                        <th class="text-center"><h6><strong>Fim 1° Periodo</strong></h6></th>
                        <th class="text-center"><h6><strong>RH</strong></h6></th>
                        <th class="text-center"><h6><strong>Parecer RH</strong></h6></th>
                        <th class="text-center"><h6><strong>Motivo RH</strong></h6></th>
                        <th class="text-center"><h6><strong></strong></h6></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $data = date('Y-m-d'); ?>
                    <?php foreach ($listFinishOnes as $listFinishOne) { ?>
                        <tr>

                              <?php
                                        $timestamp = strtotime(($listFinishOne->ehiredate));
                                        $datainicial = date('Y-m-d', $timestamp);
                                        $time_inicial = strtotime($datainicial);
                                        $time_final = strtotime($data);
                                        // Calcula a diferença de segundos entre as duas datas:
                                        $diferenca = $time_final - $time_inicial; // 19522800 segundos
                                        // Calcula a diferença de dias
                                        $countdays = (int)floor( $diferenca / (60 * 60 * 24));
                                        // echo $countdays;
                              ?>

                                <td class="text-center"><h6><?php echo $listFinishOne->empname; ?></h6></td>
                                <td class="text-center"><h6><?php echo $listFinishOne->tname; ?></h6></td>
                                <td class="text-center"><h6><?php echo $listFinishOne->usupvname; ?></h6></td>
                                <td class="text-center"><h6><?php echo $listFinishOne->ucoordname; ?></h6></td>
                                <td class="text-center"><h6>
                                <?php   $timestamp = strtotime(($listFinishOne->ehiredate));
                                    echo date('d/m/y', $timestamp);
                                ?>
                                </h6></td>

                                <td class="text-center"><h6>
                                <?php
                                $timestamp = strtotime(($listFinishOne->ehiredate));
                                $previsionDate = date('Y-m-d', $timestamp);
                                // echo $previsionDate;
                                $dias = 365;
                                $datafinal = date('d/m/y', strtotime("+{$dias} days",strtotime($previsionDate)));
                                echo $datafinal;
                                ?>
                                </h6></td>

                                <td class="text-center"><h6><?php echo $listFinishOne->urhname; ?></h6></td>
                                <td class="text-center"><h6>
                                        <?php
                                            if($listFinishOne->erh_approved1 == "1"){
                                                echo "Aprovado";
                                            } else {
                                                echo "Reprovado";
                                            }
                                        ?>
                                </h6></td>
                                <td class="text-center"><h6><?php echo $listFinishOne->ereason_experience_rh1; ?></h6></td>
                                <td class="text-center"><h6>
                                <?php $rhapproved = $listFinishOne->erh_approved1;
                                    if ($rhapproved == 1) { ?>
                                    <a href="<?php echo base_url('experiences/viewExperienceOne/'.$listFinishOne->eid); ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <?php } else{ ?>
                                    <a href="<?php echo base_url('experiences/viewExperienceOne/'.$listFinishOne->eid); ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                <?php } ?>

                                </h6></td>

                                </tr>

                    <?php } ?>
                </tbody>
            </table>




        </div>

    </div>

</div>


</div>


<script src="<?php echo base_url('assets/sb-admin-v2/js/jquery.min.js') ?>"></script>

<script>
        $(document).ready( function () {
            $('#table_id').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }
        });
        });
    </script>