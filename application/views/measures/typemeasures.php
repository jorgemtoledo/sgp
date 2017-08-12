<div id="page-wrapper">
    <div class="row">
        <h1 class="page-header">Tipos de Medidas Disciplinares</h1>
        <div class="box-tools pull-right">
            <a class="btn btn-success" href="<?php echo base_url() ?>measures/typeMeasures_add" ><i class="glyphicon glyphicon-plus"></i>  Cadastrar</a>
        </div>

        <h2 class="sub-header">Lista</h2>
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
                    <?php foreach ($typeMeasures as $typeMeasure) { ?>
                        <tr>
                            <td><?php echo $typeMeasure->id; ?></td>
                            <td><?php echo $typeMeasure->name; ?></td>
                            <td>
                            <?php   $timestamp = strtotime(($typeMeasure->created));
                                echo date('d/m/y', $timestamp);
                            ?>
                            </td>

                            <td>
                            <?php   $timestamp = strtotime(($typeMeasure->modified));
                                echo date('d/m/y', $timestamp);
                            ?>
                            </td>

                            <td><a href="<?php echo base_url('measures/typeMeasure_edit/'.$typeMeasure->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                            <!-- <a href="<?php echo base_url('measures/typeMeasures_delete/'.$typeMeasure->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


