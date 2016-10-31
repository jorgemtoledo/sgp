<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Funcionarios da Empresa</h1>
		<div class="box-tools pull-right">
			<form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>employees/add" >
							<i class="glyphicon glyphicon-plus"></i>  Funcionario</a><br />
                        </div>
                    </div>
                </div>
            </form>
		</div>

		<h2 class="sub-header">Lista Funcionarios</h2>

		<div class="form-group">
                        	<a class="btn btn-warning right" href="<?php echo base_url() ?>employees/upload" >
							<i class="glyphicon glyphicon-save"></i>  Funcionario</a><br />
                        </div>
		<div class="table-responsive">
			<table class="table table-striped" id="table_id">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Cargo</th>
						<th>Carga Horária</th>
						<th>Situação</th>
						<th>Empresa</th>
						<th>Criado</th>
						<th>Modificado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($employees as $employee) { ?>
						<tr>
							<td><?php echo $employee['eid']; ?></td>
							<td><?php echo $employee['ename']; ?></td>
							<td><?php echo $employee['jname']; ?></td>
							<td class="text-center"><?php echo $employee['eworkload']; ?></td>
							<td><?php echo $employee['sname']; ?></td>
							<td><?php echo $employee['cname']; ?></td>
							<td>
							<?php   $timestamp = strtotime(($employee['ecreated']));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($employee['emodified']));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<a href="<?php echo base_url('employees/view/'.$employee['eid']); ?>" class="btn btn-default btn-group"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="<?php echo base_url('employees/edit/'.$employee['eid']); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('employees/delete/'.$employee['eid']); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<?php echo $pag; ?>
		</div>

	</div>

</div>


