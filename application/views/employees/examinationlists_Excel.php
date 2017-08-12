<div id="page-wrapper">
	<div class="row">
		<h3 class="page-header">Cadastro do 1° Exame Periódico</h3>

		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
				<thead>
					<tr>
						<th class="text-center"><h6><strong>ID</strong></h6></th>
						<th class="text-center"><h6><strong>Nome</strong></h6></th>
						<th class="text-center"><h6><strong>Cargo</strong></h6></th>
                                                                        <th class="text-center"><h6><strong>Equipe</strong></h6></th>
                                                                              <th class="text-center"><h6><strong>Tipo Exame</strong></h6></th>
						<th class="text-center"><h6><strong>Contratado</strong></h6></th>
                                                                              <th class="text-center"><h6><strong>Previsão Exame</strong></h6></th>
						<th class="text-center"><h6><strong>Dias</strong></h6></th>

					</tr>
				</thead>
				<tbody>
                                                                <?php $data = date('Y-m-d'); ?>
					<?php foreach ($employees as $employee) { ?>
						<tr>

                                                                              <?php
                                                                                        $timestamp = strtotime(($employee->ehiredate));
                                                                                        $datainicial = date('Y-m-d', $timestamp);
                                                                                        $time_inicial = strtotime($datainicial);
                                                                                        $time_final = strtotime($data);
                                                                                        // Calcula a diferença de segundos entre as duas datas:
                                                                                        $diferenca = $time_final - $time_inicial; // 19522800 segundos
                                                                                        // Calcula a diferença de dias
                                                                                        $countdays = (int)floor( $diferenca / (60 * 60 * 24));
                                                                                        // echo $countdays;
                                                                              ?>
                                                                              <?php if ($countdays > 360) { ?>
						<td class="danger"><h6><?php echo $employee->eid; ?></h6></td>
                                                                              <td class="danger"><h6><?php echo $employee->ename; ?></h6></td>
                                                                              <td class="danger"><h6><?php echo $employee->jname; ?></h6></td>
                                                                              <td class="danger"><h6><?php echo $employee->tname; ?></h6></td>


                                                                              <td class="danger">
                                                                                <h6>
                                                                                    <?php
                                                                                            $job = $employee->ejob;
                                                                                            if ($job == 1 || $job == 9 || $job == 13) {
                                                                                                echo "Exame Clínico e Audiometria";
                                                                                            } else {
                                                                                                echo "Exame Clínico";
                                                                                            }
                                                                                    ?>
                                                                              </h6>
                                                                              </td>

                                                                              <td class="text-center danger"><h6>
                                                                                <?php   $timestamp = strtotime(($employee->ehiredate));
                                                                                    echo date('d/m/y', $timestamp);
                                                                                ?>
                                                                                </h6></td>

                                                                                <td class="text-center danger"><h6>
                                                                                <?php
                                                                                $timestamp = strtotime(($employee->ehiredate));
                                                                                $previsionDate = date('Y-m-d', $timestamp);
                                                                                // echo $previsionDate;
                                                                                $dias = 365;
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

                                                                                <?php } else  {?>
                                                                                <td><h6><?php echo $employee->eid; ?></h6></td>
                                                                                <td><h6><?php echo $employee->ename; ?></h6></td>
                                                                                <td><h6><?php echo $employee->jname; ?></h6></td>
                                                                                <td><h6><?php echo $employee->tname; ?></h6></td>
                                                                                <td>
                                                                                <h6>
                                                                                    <?php
                                                                                            $job = $employee->ejob;
                                                                                            if ($job == 1 || $job == 9 || $job == 13) {
                                                                                                echo "Exame Clínico e Audiometria";
                                                                                            } else {
                                                                                                echo "Exame Clínico";
                                                                                            }
                                                                                    ?>
                                                                              </h6>
                                                                              </td>
                                                                                <td class="text-center"><h6>
                                                                                <?php   $timestamp = strtotime(($employee->ehiredate));
                                                                                    echo date('d/m/y', $timestamp);
                                                                                ?>
                                                                                </h6></td>

                                                                                <td class="text-center"><h6>
                                                                                <?php
                                                                                $timestamp = strtotime(($employee->ehiredate));
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


                                                                                <?php } ?>

                                                                                </tr>

					<?php } ?>
				</tbody>
			</table>

		</div>

	</div>

</div>

<!-- Script HTML to EXCEL -->
<?php
$arquivo = "lista1ExamesMedicos.xls";
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename={$arquivo}" );
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->


