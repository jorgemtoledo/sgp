
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Usuários</h1>
		<div class="box-tools pull-right">
			<a class="btn btn-success" href="<?php echo base_url() ?>users/add" ><i class="glyphicon glyphicon-plus"></i>  Usuário</a>
		</div>

		<h2 class="sub-header">Lista Usuários</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Nivel</th>
						<th>Ativo?</th>
						<th>Criado</th>
						<th>Modificado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user) { ?>
						<tr>
							<td><?php echo $user->id; ?></td>
							<td><?php echo $user->name; ?></td>
							<td><?php echo $user->email; ?></td>
							<td>
							<?php
								switch ($user->level) {
									case '1':
										echo 'Administrador';
									break;
									case '2':
										echo 'RH';
									break;
									case '3':
										echo 'Coordenador/Analista';
									break;
									case '4':
										echo 'Supervisor';
									break;
									case '5':
										echo 'Planejamento';
									break;
									default:
									# code...
									break;
							}
							?>
							</td>
							<td>
							<?php
							$useractive = 1;
								if ($useractive == $user->active) {
									echo "<span class='label label-success'>Sim</span>";
								} else {
									echo "<span class='label label-danger'>Não</span>";
								}
							?>
							</td>
							<td>
							<?php   $timestamp = strtotime(($user->created));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($user->modified));
								echo date('d/m/y', $timestamp);
							?>
							</td>


							<td><a href="<?php echo base_url('users/edit/'.$user->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('users/delete/'.$user->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir o usuário!');"><i class="glyphicon glyphicon-trash"></i></a> -->
							<a href="<?php echo base_url('users/permission/'.$user->id); ?>" class="btn btn-success btn-group" ><i class="glyphicon glyphicon-ok"></i></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>


