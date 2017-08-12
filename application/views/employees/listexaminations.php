<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">LIsta Exame Periódicos</h1>
		<div class="box-tools pull-right">
			<form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-warning" href="<?php echo base_url() ?>employees/checkedView_excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a>

                        </div>
                    </div>
                </div>
            </form>
		</div>


		<div class="form-group">
                        	<!-- Botao voltar -->
                        <a href="<?php echo base_url('employees/examinations'); ?>"  class="btn btn-primary">
                        <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
                        <!-- Fim Botao voltar -->
                        </div>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
				<thead>
                                                        <tr>
                                                        <th class="text-center"><h6><strong>ID</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Nome</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Cargo</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Equipe</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Tipo Exame</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Ultimo Exame</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Proximo Exame</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Exame Agendado</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Realizado?</strong></h6></th>
                                                        <th class="text-center"><h6><strong>Ações</strong></h6></th>
                                                        </tr>
                                                    </thead>
				<tbody>
					<?php foreach ($employees as $employee) { ?>
						<tr>
							<td><h6><?php echo $employee['eid']; ?></h6></td>
							<td><h6><?php echo $employee['empname']; ?></h6></td>
							<td><h6><?php echo $employee['jname']; ?></h6></td>
                                                                                    <td><h6><?php echo $employee['tname']; ?></h6></td>
                                                                                           <td><h6><?php echo $employee['etype']; ?></h6></td>

							<td><h6>
                                                                                                <?php
                                                                                                    $datelast =  strtotime(($employee['elast']));
                                                                                                    echo date('d/m/y', $datelast);
                                                                                                ?>
                                                                                           </h6></td>
							<td><h6>
                                                                                                <?php
                                                                                                    $datenext =  strtotime(($employee['enext']));
                                                                                                    echo date('d/m/y', $datenext);
                                                                                                ?>
                                                                                           </h6></td>
							<td><h6>
                                                                                                <?php
                                                                                                    $datescheduled =  strtotime(($employee['escheduled']));
                                                                                                    echo date('d/m/y', $datescheduled);
                                                                                                ?>
                                                                                           </h6></td>
                                                                                           <td  class="text-center"><h6>
                                                                                            <?php
                                                                                                $accomplished = 1;
                                                                                                    if ($accomplished == $employee['eaccomplished']) {
                                                                                                        echo "<span class='label label-success'>Sim</span>";
                                                                                                    } else {
                                                                                                        echo "<span class='label label-danger'>Não</span>";
                                                                                                    }
                                                                                            ?>
                                                                                            </h6></td>


							<td><h6><strong>
                                                                                            <a href="<?php echo base_url('employees/examinationviewEnd/'.$employee['eid']); ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                                                          </strong></h6></tr>
					<?php } ?>
				</tbody>
			</table>
			<?php echo $pag; ?>
		</div>

	</div>

</div>


