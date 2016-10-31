
<div id="page-wrapper">
	<div class="row">
		<h1 class="page-header">Código Internacional de Doenças - CID 10 </h1>
		<div class="box-tools pull-right">

      <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>" class="form-control" />

                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>cids/add" ><i class="glyphicon glyphicon-plus"></i>  Cadastrar</a><br />
                        </div>
                        <div class="form-group">

                        </div>

                    </div>
                </div>
            </form>
		</div>

		<a class="btn btn-primary" href="<?php echo base_url() ?>certificates/index/" >
              <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a>
		<div class="table-responsive">
<!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ? 'Codeigniter Version <strong>' . CI_VERSION . '</strong>' : '' ?> </p> -->

    <table class="table table-striped" id="table_id" width="100%">
          <thead>
            <tr>
              <th>CID</th>
              <th>Criado</th>
              <th>Modificado</th>
              <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($cids as $cid){?>
            <tr>
              <td><?php echo $cid['name']; ?></td>
              <td>
                  <?php   $timestamp = strtotime(($cid['created']));
                    echo date('d/m/y', $timestamp);
                  ?>
              </td>
              <td>
                  <?php   $timestamp = strtotime(($cid['modified']));
                    echo date('d/m/y', $timestamp);
                  ?>
              </td>
              <td>
                <a href="<?php echo base_url('cids/edit/'.$cid['id']); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                <a href="<?php echo base_url('cids/delete/'.$cid['id']); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
              </td>
            </tr>
           <?php } ?>
          </tbody>
        </table>
        <?php echo $pag; ?>

		</div>

	</div>

</div>

