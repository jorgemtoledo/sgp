<div id="page-wrapper">
  <div class="row">
          <div class="box box-primary">
          <div class="span12">
        <div class="widget-box">
            <div class="widget-content">
                <div class="row-fluid">
                    <div class="span12">
                        <ul class="site-stats">
                                 <strong>
                                    <?php
                                            $monthTeam = $dados['month'];
                                            // echo $monthTeam . "<br>";
                                            $yearTeam = $dados['yearmedicalcertificates'];
                                            // echo $yearTeam . "<br>";
                                    ?>

                    <div class="col-md-12">
                    <h1 class="page-header">Atestados</h1>
                       <div class="col-lg-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <i class="fa fa-list-alt"></i>  Lista
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="list-group">

                                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nome</th>
                                            <th class="text-center">Equipe</th>
                                            <th class="text-center">Nr</th>
                                            <th class="text-center">Tipo Atestado</th>
                                            <th class="text-center">Abona?</th>
                                            <th class="text-center">Entrega</th>
                                            <th class="text-center">Inicio</th>
                                            <th class="text-center">Fim</th>
                                            <th class="text-center">Qtd Dias</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($results as $result) { ?>
                                        <tr class="text-center">
                                            <td><?php echo $result->ename;?></td>
                                            <td><?php echo $result->tname;?></td>
                                            <td><?php echo $result->mcid;?></td>
                                            <td><?php echo $result->tpname;?></td>
                                            <td>
                                                <?php
                                                    $mcaccredit = 1;
                                                    if ($mcaccredit == $result->mcaccredit) {
                                                    echo "<span class='label label-success'>Sim</span>";
                                                    } else {
                                                    echo "<span class='label label-danger'>Não</span>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $mccreated = strtotime(($result->mcdeliverydate));
                                                    echo date('d/m/Y', $mccreated);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $mccreated = strtotime(($result->mcstartcertificate));
                                                    echo date('d/m/Y', $mccreated);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $mccreated = strtotime(($result->mcfinishcertificate));
                                                    echo date('d/m/Y', $mccreated);
                                                ?>
                                            </td>

                                            <td><?php echo $result->mcnumberday; ?></td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <thead>
                                        <tr class="danger">
                                            <th class="text-center" colspan="8"><h4><strong>Total de dias de afastamento</strong></h4></th>
                                            <th class="text-center">
                                            <h4><strong>
                                            <?php
                                                    $sum = 0;
                                                    foreach($results as $value)
                                                    {
                                                        $number = $value->mcnumberday;
                                                       $sum+= $number;
                                                    }
                                                    echo $sum;
                                            ?>
                                            </h4></strong>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                          </div>

                        </ul>

                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
          </div><!-- /.view -->
          </div>
        </div>
        </div>