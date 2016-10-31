
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Médicos</h1>
		<div class="box-tools pull-right">
			<form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo base_url() ?>certificates/index/" >
             			<i class="glyphicon glyphicon-arrow-left"></i>  Painel</a>
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
							<a class="btn btn-success" href="<?php echo base_url() ?>doctors/add" ><i class="glyphicon glyphicon-plus"></i>  Medico</a>
                        </div>
                    </div>
                </div>
            </form>
		</div>

		<h2 class="sub-header">Lista</h2>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>CRM</th>
						<th>Criado</th>
						<th>Modificado</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($doctors as $doctor) { ?>
						<tr>
							<td><?php echo $doctor['id']; ?></td>
							<td><?php echo $doctor['name']; ?></td>
							<td><?php echo $doctor['crm']; ?></td>
							<td>
							<?php   $timestamp = strtotime(($doctor['created']));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($doctor['modified']));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<a href="<?php echo base_url('doctors/edit/'.$doctor['id']); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('doctors/delete/'.$doctor['id']); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php echo $pag; ?>
		</div>

	</div>

</div>


