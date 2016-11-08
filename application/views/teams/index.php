
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Equipes</h1>
		<div class="box-tools pull-right">
			<a class="btn btn-success" href="<?php echo base_url() ?>teams/add" ><i class="glyphicon glyphicon-plus"></i>  Equipe</a>
		</div>

		<h2 class="sub-header">Lista Equipes</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Departamento</th>
						<th>Ativo?</th>
						<th>Criado</th>
						<th>Modificado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($teams as $team) { ?>
						<tr>
							<td><?php echo $team->tid; ?></td>
							<td><?php echo $team->tname; ?></td>
							<td><?php echo $team->oname; ?></td>
							<td>
							<?php
							$teamactive = 1;
								if ($teamactive == $team->tactive) {
									echo "<span class='label label-success'>Sim</span>";
								} else {
									echo "<span class='label label-danger'>Não</span>";
								}
							?>
							</td>
							<td>
							<?php   $timestamp = strtotime(($team->tcreated));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($team->tmodified));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td><a href="<?php echo base_url('teams/edit/'.$team->tid); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('teams/delete/'.$team->tid); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>


