<div id="page-wrapper">
    <div class="row">
        <h1 class="page-header">Lista funcionário por Equipe / Setor</h1>
          <?php $user_id = $this->session->userdata('id'); ?>


        <div class="box-tools pull-right">
            <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" placeholder="Nome ou Equipe"  value ="<?php echo  $busca?>" class="form-control" />
                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>workers/add" >
                            <i class="glyphicon glyphicon-plus"></i>  Cadastrar</a>
                            <a class="btn btn-warning" href="<?php echo base_url() ?>workers/exp_excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a><br />
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Equipe / Setors</th>
                        <th>Cadastrado por</th>
                        <th>Ativo?</th>
                        <th>Criado</th>
                        <th>Modificado</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($workers as $worker) { ?>
                        <tr>
                            <td><?php echo $worker['wid']; ?></td>
                            <td><?php echo $worker['ename']; ?></td>
                            <td><?php echo $worker['tname']; ?></td>
                            <td><?php echo $worker['uname']; ?></td>
                            <td>
                            <?php
                            $operationactive = 1;
                                if ($operationactive == $worker['wactive']) {
                                    echo "<span class='label label-success'>Sim</span>";
                                } else {
                                    echo "<span class='label label-danger'>Não</span>";
                                }
                            ?>
                            </td>
                            <td>
                            <?php   $timestamp = strtotime(($worker['wcreated']));
                                echo date('d/m/y', $timestamp);
                            ?>
                            </td>

                            <td>
                            <?php   $timestamp = strtotime(($worker['wmodified']));
                                echo date('d/m/y', $timestamp);
                            ?>
                            </td>

                            <td>
                                <a href="<?php echo base_url('workers/edit/'.$worker["wid"]); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                                <!-- <a href="<?php echo base_url('workers/delete/'.$worker->wid); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php echo $pag; ?>
        </div>
    </div>
</div>




