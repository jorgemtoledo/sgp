<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Lista Atestados</h1>
		<!-- Test Memory -->
		<?php
		    echo "Uso de memoria no inicio:".memory_get_usage()." bytes\n";
		    echo "<br>";
		    /* Ex: Uso de memoria no inicio: 361400 bytes */
		    // Vamos fazer um loop para consumir memoria
		    for($i=0; $i<50000; $i++) {
		         $array[]=md5($i);
		    }
		    echo "Uso de memoria depois do loop:".memory_get_usage()." bytes\n";
		    echo "<br>";
		    // Agora vamos reduzir alguns arrays com unset
		    for($i=0; $i<10000; $i++){
		         unset ($array[$i]);
		    }
		    echo "Uso de memoria no final:".memory_get_usage()." bytes\n";
		    echo "<br>";
		    echo "O Pico de memoria:".memory_get_peak_usage()." bytes\n";
		    echo "<br>";
		?>
		<div class="box-tools pull-right">
			<form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>"  />

                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>medical_certificates" >
							<i class="glyphicon glyphicon-plus"></i>  Atestado</a>
							<a class="btn btn-warning" href="<?php echo base_url() ?>medical_certificates/view_excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a><br />
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
						<th><h6><strong>ID</strong></h6></th>
						<th><h6><strong>Funcionario</strong></h6></th>
						<th><h6><strong>Entrada</strong></h6></th>
						<th><h6><strong>Inicio</strong></h6></th>
						<th><h6><strong>Fim</strong></h6></th>
						<th><h6><strong>Dias</strong></h6></th>
						<th><h6><strong>Atestado</strong></h6></th>
						<th><h6><strong>Abona?</strong></h6></th>
						<th><h6><strong>CID</strong></h6></th>
						<th></th>
						<th></th>

					</tr>
				</thead>
				<tbody>
					<?php foreach ($medicalcertificates as $medicalcertificate) { ?>
						<tr>
							<td><h6><?php echo $medicalcertificate['mcid']; ?></h6></td>
							<td><h6><?php echo $medicalcertificate['ename']; ?></h6></td>
							<td>
							<h6>
							<?php   $timestamp = strtotime(($medicalcertificate['mcdeliverydate']));
								echo date('d/m/y', $timestamp);
							?>
							</h6>
							</td>
							<td>
							<h6>
							<?php   $timestamp = strtotime(($medicalcertificate['mcstartcertificate']));
								echo date('d/m/y', $timestamp);
							?>
							</h6>
							</td>
							<td>
							<h6>
							<?php
								$timestamp = strtotime(($medicalcertificate['mcfinishcertificate']));
								$timeFinish = date('d/m/y', $timestamp);
								// echo $timeFinish;
								if($timeFinish == '31/12/69'){
									echo "<p class='text-danger'>Sem Data</p>";
								} else {
									echo $timeFinish;
								}
							?>
							</h6>
							</td>
							<td class="text-center"><h6><?php echo $medicalcertificate['mcnumberday']; ?></h6></td>
							<td><h6><?php echo $medicalcertificate['tpname']; ?></h6></td>
							<td class="text-center">
							<h6>
							<?php
							$accredit = 1;
								if ($accredit == $medicalcertificate['mcaccredit']) {
									echo "<span class='label label-success'>Sim</span>";
								} else {
									echo "<span class='label label-danger'>Não</span>";
								}
							?>
							</h6>
							</td>

							<td>
							<a href="<?php echo base_url('medical_certificates/view/'.$medicalcertificate['mcid']);  ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
							<a href="<?php echo base_url('medical_certificates/review/'.$medicalcertificate['wid']);  ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-search"></i></a>
							<a href="<?php echo base_url('medical_certificates/edit/'.$medicalcertificate['mcid']);  ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
							<a href="<?php echo base_url('medical_certificates/delete/'.$medicalcertificate['mcid']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
							</td>
							<td>
							<?php if($medicalcertificate['mcfeedback']==0){ ?>
								<a href="<?php echo base_url('medical_certificates/feedback/'.$medicalcertificate['mcid']); ?>" class="btn btn-warning btn-xs" onclick="return confirm('Verificou os dados no sistema PONTO?');"><i class="glyphicon glyphicon-time"></i></a>
							<?php }else{  ?>
							<a href="#" class="btn btn-success btn-xs" onclick="return confirm('Esta função já foi executado!');"><i class="glyphicon glyphicon-time"></i></a>
							<?php } ?>

							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<?php echo $pag; ?>
		</div>

	</div>

</div>


