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
                            <a class="btn btn-warning" href="<?php echo base_url() ?>employees/view_excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a>
                            <a class="btn btn-success" href="<?php echo base_url() ?>employees/add" >
							<i class="glyphicon glyphicon-plus"></i>  Funcionario</a><br />
                        </div>
                    </div>
                </div>
            </form>
		</div>

		<h2 class="sub-header">Lista Funcionarios</h2>

		<div class="form-group">
                        	<a class="btn btn-info right" href="<?php echo base_url() ?>employees/upload" >
							<i class="glyphicon glyphicon-save"></i>  Imporrtar</a><br />
                        </div>
		<div class="table-responsive">
			<table class="table table-striped" id="table_id">
				<thead>
					<tr>
						<th><h6><strong>ID</strong></h6></th>
						<th><h6><strong>Nome</strong></h6></th>
						<th><h6><strong>Cargo</strong></h6></th>
						<th><h6><strong>Carga Horária</strong></h6></th>
						<th><h6><strong>Situação</strong></h6></th>
						<th><h6><strong>Empresa</strong></h6></th>
						<th><h6><strong>Criado</strong></h6></th>
						<th><h6><strong>Modificado</strong></h6></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($employees as $employee) { ?>
						<tr>
							<td><h6><?php echo $employee['eid']; ?></h6></td>
							<td><h6><?php echo $employee['ename']; ?></h6></td>
							<td><h6><?php echo $employee['jname']; ?></h6></td>
							<td class="text-center"><h6><?php echo $employee['eworkload']; ?></h6></td>
							<td><h6><?php echo $employee['sname']; ?></h6></td>
							<td><h6><?php echo $employee['cname']; ?></h6></td>
							<td><h6>
							<?php   $timestamp = strtotime(($employee['ecreated']));
								echo date('d/m/y', $timestamp);
							?>
                                                                                           </h6>
							</td>

							<td><h6>
							<?php   $timestamp = strtotime(($employee['emodified']));
								echo date('d/m/y', $timestamp);
							?>
                                                                                           </h6>
							</td>

							<td><h6><strong>
							<a href="<?php echo base_url('employees/view/'.$employee['eid']); ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="<?php echo base_url('employees/edit/'.$employee['eid']); ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('employees/delete/'.$employee['eid']); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						            <a href="<?php echo base_url('employees/dismiss/'.$employee['eid']); ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-warning-sign"></i></a>
                                                                                          </strong></h6></tr>
					<?php } ?>
				</tbody>
			</table>
			<?php echo $pag; ?>
		</div>

	</div>

</div>


