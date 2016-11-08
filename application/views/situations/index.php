
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Sitação do Funcionario na Empresa</h1>
		<div class="box-tools pull-right">
			<a class="btn btn-success" href="<?php echo base_url() ?>situations/add" ><i class="glyphicon glyphicon-plus"></i>  Situação</a>
		</div>

		<h2 class="sub-header">Lista Situações</h2>
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
					<?php foreach ($situations as $situation) { ?>
						<tr>
							<td><?php echo $situation->id; ?></td>
							<td><?php echo $situation->name; ?></td>
							<td>
							<?php   $timestamp = strtotime(($situation->created));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($situation->modified));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td><a href="<?php echo base_url('situations/edit/'.$situation->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('situations/delete/'.$situation->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>


