
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Departamentos</h1>
		<div class="box-tools pull-right">
			<a class="btn btn-success" href="<?php echo base_url() ?>operations/add" ><i class="glyphicon glyphicon-plus"></i>  Departamento</a>
		</div>

		<!-- Mudou o nome operacoes para deparatamentos -->

		<h2 class="sub-header">Lista Departamentos</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Empresa</th>
						<th>Ativo?</th>
						<th>Criado</th>
						<th>Modificado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($operations as $operation) { ?>
						<tr>
							<td><?php echo $operation->oid; ?></td>
							<td><?php echo $operation->oname; ?></td>
							<td><?php echo $operation->cname; ?></td>
							<td>
							<?php
							$operationactive = 1;
								if ($operationactive == $operation->oactive) {
									echo "<span class='label label-success'>Sim</span>";
								} else {
									echo "<span class='label label-danger'>Não</span>";
								}
							?>
							</td>
							<td>
							<?php   $timestamp = strtotime(($operation->ocreated));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($operation->omodified));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td><a href="<?php echo base_url('operations/edit/'.$operation->oid); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('operations/delete/'.$operation->oid); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>


