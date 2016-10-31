<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Lista Atestados</h1>
		<div class="box-tools pull-right">
			<form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>" class="form-control" />

                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>medical_certificates" >
							<i class="glyphicon glyphicon-plus"></i>  Atestado</a><br />
                        </div>
                        <div class="form-group">

                        </div>

                    </div>
                </div>
            </form>
		</div>

		<a class="btn btn-primary" href="<?php echo base_url() ?>certificates/index/" >
							<i class="glyphicon glyphicon-arrow-left"></i>  Painel</a><br />
		<div class="table-responsive">
			<table class="table table-striped" id="table_id">
				<thead>
					<tr>
						<th>ID</th>
						<th>Funcionario</th>
						<th>Data de Entrada</th>
						<th>Inicio do Afastamento</th>
						<th>Fim do Afastamento</th>
						<th>Qtd Dias</th>
						<th>Abona Falta?</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($medicalcertificates as $medicalcertificate) { ?>
						<tr>
							<td><?php echo $medicalcertificate['mcid']; ?></td>
							<td><?php echo $medicalcertificate['ename']; ?></td>
							<td>
							<?php   $timestamp = strtotime(($medicalcertificate['mcdeliverydate']));
								echo date('d/m/y', $timestamp);
							?>
							</td>
							<td>
							<?php   $timestamp = strtotime(($medicalcertificate['mcstartcertificate']));
								echo date('d/m/y', $timestamp);
							?>
							</td>
							<td>
							<?php   $timestamp = strtotime(($medicalcertificate['mcfinishcertificate']));
								echo date('d/m/y', $timestamp);
							?>
							</td>
							<td class="text-center"><?php echo $medicalcertificate['mcnumberday']; ?></td>
							<td class="text-center">
							<?php
							$accredit = 1;
								if ($accredit == $medicalcertificate['mcaccredit']) {
									echo "<span class='label label-success'>Sim</span>";
								} else {
									echo "<span class='label label-danger'>Não</span>";
								}
							?>
							</td>
							<td>

							<td>
							<a href="<?php echo base_url('medical_certificates/view/'.$medicalcertificate['mcid']);  ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="<?php echo base_url('medical_certificates/review/'.$medicalcertificate['wid']);  ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-search"></i></a>
							<a href="<?php echo base_url('medical_certificates/edit/'.$medicalcertificate['mcid']);  ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('medical_certificates/delete/'.$medicalcertificate['mcid']); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a> -->
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<?php echo $pag; ?>
		</div>

	</div>

</div>


