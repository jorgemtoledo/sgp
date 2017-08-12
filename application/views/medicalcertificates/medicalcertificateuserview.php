<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Dados do Atestado</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>medical_certificates/listmedicalcertificates" ><i class="glyphicon glyphicon-list-alt"></i>   Listar </a>
          </div>

          <div>
                <input type="button" class="btn btn-primary"  value="Voltar" onClick="history.go(-1)"> 
          </div>

          <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Informações</h3>
          </div>

            <div class="box-body table-responsive">
            <table id="Companies" class="table table-bordered table-striped">
              <tbody>
                <tr>
                <td><strong>ID</strong></td>
                <td>
                <?php echo $result->mcid; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Nome</strong></td>
                <td>
                <?php echo $result->ename; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Medico</strong></td>
                <td>
                <?php echo $result->dname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Posto de Saúde</strong></td>
                <td>
                <?php echo $result->hsname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>CID</strong></td>
                <td>
                <?php echo $result->cdescription; ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Data Entrega</strong></td>
                <td>
                <?php   $mcdeliverydate = strtotime(($result->mcdeliverydate));
                        echo date('d/m/Y', $mcdeliverydate);
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Data Inicio Afastamento</strong></td>
                <td>
                <?php   $mcstartcertificate = strtotime(($result->mcstartcertificate));
                        echo date('d/m/Y', $mcstartcertificate);
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Data Fim Afastamento</strong></td>
                <td>
                <?php   $mcfinishcertificate = strtotime(($result->mcfinishcertificate));
                        $timeFinish = date('d/m/y', $mcfinishcertificate);
                        // echo $timeFinish;
                        if($timeFinish == '31/12/69'){
                            echo "<p class='text-danger'>Sem Data</p>";
                        } else {
                            echo $timeFinish;
                        }
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Quantidade Dias</strong></td>
                <td>
                <?php echo $result->mcnumberday; ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Abona a Falta?</strong></td>
                <td>
                <?php
                $mcaccredit = 1;
                                if ($mcaccredit == $result->mcaccredit) {
                                    echo "<span class='label label-success'>Sim</span>";
                                } else {
                                    echo "<span class='label label-danger'>Não</span>";
                                }
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Horário de Afastamento:</strong></td>
                <td>
                <?php echo $result->doname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Tipo de Atestado</strong></td>
                <td>
                <?php echo $result->tpname; ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Observações</strong></td>
                <td>
                <?php echo $result->mcdescription; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Usuário que cadastrou/alterou</strong></td>
                <td>
                <?php echo $result->uname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data Cadastro</strong></td>
                <td>
                <?php   $mccreated = strtotime(($result->mccreated));
                        echo date('d/m/Y', $mccreated);
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data Modificado</strong></td>
                <td>
                <?php   $mcmodified = strtotime(($result->mcmodified));
                        echo date('d/m/Y', $mcmodified);
                ?>
                &nbsp;
                </td>
                </tr>
              </tbody>
            </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->
          </div><!-- /.view -->
          </div>
        </div>
        </div>