<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Empresas</h1>
		<div class="box-tools pull-right">
			<a class="btn btn-success" href="<?php echo base_url() ?>companies/add" ><i class="glyphicon glyphicon-plus"></i>  Empresa</a>
		</div>

		<h2 class="sub-header">Lista Empresas</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Criado</th>
						<th>Modificado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($companies as $company) { ?>
						<tr>
							<td><?php echo $company->id; ?></td>
							<td><?php echo $company->name; ?></td>
							<td>
							<?php   $timestamp = strtotime(($company->created));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($company->modified));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td><a href="<?php echo base_url('companies/edit/'.$company->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('companies/delete/'.$company->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>


