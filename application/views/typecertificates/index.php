
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Tipos de Atestados</h1>
		<div class="box-tools pull-right">
			<a class="btn btn-success" href="<?php echo base_url() ?>type_certificates/add" ><i class="glyphicon glyphicon-plus"></i>  Cadastrar</a>
		</div>

		<!-- <h2 class="sub-header">Lista</h2> -->
		<a class="btn btn-primary" href="<?php echo base_url() ?>certificates/index/" >
              <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a>
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
					<?php foreach ($typeCertificates as $typeCertificate) { ?>
						<tr>
							<td><?php echo $typeCertificate->id; ?></td>
							<td><?php echo $typeCertificate->name; ?></td>
							<td>
							<?php   $timestamp = strtotime(($typeCertificate->created));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<?php   $timestamp = strtotime(($typeCertificate->modified));
								echo date('d/m/y', $timestamp);
							?>
							</td>

							<td>
							<a href="<?php echo base_url('type_certificates/edit/'.$typeCertificate->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
							<!-- <a href="<?php echo base_url('type_certificates/delete/'.$typeCertificate->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

	</div>

</div>


