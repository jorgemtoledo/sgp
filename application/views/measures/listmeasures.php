<div id="page-wrapper">
    <div class="row">
        <h1 class="page-header">Lista Medidas</h1>
        <div class="box-tools pull-right">
            <form action="" method="GET" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>
                                <input type="text" name="busca" value ="<?php echo  $busca?>"  />

                            </label>
                            <input type="submit" name="btn" class="btn btn-primary"  value="Buscar"/>
                            <a class="btn btn-success" href="<?php echo base_url() ?>measures/measures_add" >
                            <i class="glyphicon glyphicon-plus"></i>  Medidas</a>
                            <a class="btn btn-warning" href="<?php echo base_url() ?>measures/view_excel" >
                            <i class="glyphicon glyphicon-floppy-save"></i>  Excel</a><br />
                        </div>
                        <div class="form-group">

                        </div>

                    </div>
                </div>
            </form>
        </div>

        <a class="btn btn-primary" href="<?php echo base_url() ?>measures" >
                            <i class="glyphicon glyphicon-arrow-left"></i>  Painel</a><br />
        <div class="table-responsive">
            <table class="table table-striped" id="table_id">
                <thead>
                    <tr>
                        <th><h6><strong>ID</strong></h6></th>
                        <th><h6><strong>Funcionario</strong></h6></th>
                        <th><h6><strong>Data da Aplicação</strong></h6></th>
                        <th><h6><strong>Tipo de Medida</strong></h6></th>
                        <th><h6><strong>Motivo</strong></h6></th>
                        <th><h6><strong>Total Afastamento</strong></h6></th>
                        <th><h6><strong>Inicio Afastamento</strong></h6></th>
                        <th><h6><strong>Fim Afastamento</strong></h6></th>
                        <th><h6><strong>Retorno</strong></h6></th>
                        <th><h6><strong>Entrega no RH</strong></h6></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($measures as $measure) { ?>
                        <tr>
                            <td><h6><?php echo $measure['dmid']; ?></h6></td>
                            <td><h6><?php echo $measure['ename']; ?></h6></td>
                            <td>
                            <h6>
                            <?php
                                $datemeasure1 = $measure['dmapplicationdate'];
                                $datemeasure2 = 0000-00-00;
                                if($datemeasure1 == $datemeasure2 ){
                                    echo "Nenhuma data";
                                } else {
                                    $timestamp = strtotime(($measure['dmapplicationdate']));
                                    echo date('d/m/y', $timestamp);
                                }
                            ?>
                            </h6>
                            </td>
                            <td><h6><?php echo $measure['tmname']; ?></h6></td>
                            <td><h6><?php echo $measure['rmname']; ?></h6></td>
                            <td><h6><?php echo $measure['dmremoval']; ?></h6></td>
                            <td>
                            <h6>
                            <?php
                                $datemeasure1 = $measure['dmremovalstart'];
                                $datemeasure2 = 0000-00-00;
                                if($datemeasure1 == $datemeasure2 ){
                                    echo "Nenhuma data";
                                } else {
                                    $timestamp = strtotime(($measure['dmremovalstart']));
                                    echo date('d/m/y', $timestamp);
                                }
                            ?>
                            </h6>
                            </td>
                            <td>
                            <h6>
                            <?php
                                $datemeasure1 = $measure['dmremovalfinish'];
                                $datemeasure2 = 0000-00-00;
                                if($datemeasure1 == $datemeasure2 ){
                                    echo "Nenhuma data";
                                } else {
                                    $timestamp = strtotime(($measure['dmremovalfinish']));
                                    echo date('d/m/y', $timestamp);
                                }
                            ?>
                            </h6>
                            </td>
                            <td>
                            <h6>
                            <?php
                                $datemeasure1 = $measure['dmreturndate'];
                                $datemeasure2 = 0000-00-00;
                                if($datemeasure1 == $datemeasure2 ){
                                    echo "Nenhuma data";
                                } else {
                                    $timestamp = strtotime(($measure['dmreturndate']));
                                    echo date('d/m/y', $timestamp);
                                }
                            ?>
                            </h6>
                            </td>

                            <td>
                            <h6>
                            <?php
                                $datemeasure1 = $measure['dmdeliverydate'];
                                $datemeasure2 = 0000-00-00;
                                if($datemeasure1 == $datemeasure2 ){
                                    echo "Nenhuma data";
                                } else {
                                    $timestamp = strtotime(($measure['dmdeliverydate']));
                                    echo date('d/m/y', $timestamp);
                                }
                            ?>
                            </h6>
                            </td>

                            <td>
                            <a href="<?php echo base_url('measures/view_measure/'.$measure['dmid']);  ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="<?php echo base_url('measures/dmeasureworker/'.$measure['wid']);  ?>" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-search"></i></a>
                            <a href="<?php echo base_url('measures/edit/'.$measure['dmid']);  ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-pencil"></i></a>
                            <a href="<?php echo base_url('measures/delete_measure/'.$measure['dmid']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php echo $pag; ?>
        </div>

    </div>

</div>


