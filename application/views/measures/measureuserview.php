<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Dados da Medida Disciplinar</h1>

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
                <?php echo $result->dmid; ?>
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
                <td><strong>Matricula/Registro</strong></td>
                <td>
                <?php echo $result->eregistration; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data da Aplicação</strong></td>
                <td>
                <?php
                    $datemeasure1 = $result->dmapplicationdate;
                    $datemeasure2 = 0000-00-00;
                    if($datemeasure1 == $datemeasure2 ){
                        echo "Nenhuma data";
                    } else {
                        $mcstartcertificate = strtotime(($result->dmapplicationdate));
                        echo date('d/m/Y', $mcstartcertificate);
                    }
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data da Ocorrência</strong></td>
                <td>
                <?php echo $result->dmoccurrencedate; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Tipo de Medida</strong></td>
                <td>
                <?php echo $result->tmname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Motivo</strong></td>
                <td>
                <?php echo $result->rmname; ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Inicio Afastamento</strong></td>
                <td>
                <?php
                    $datemeasure1 = $result->dmremovalstart;
                    $datemeasure2 = 0000-00-00;
                    if($datemeasure1 == $datemeasure2 ){
                        echo "Nenhuma data";
                    } else {
                        $mcstartcertificate = strtotime(($result->dmremovalstart));
                        echo date('d/m/Y', $mcstartcertificate);
                    }
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Fim Afastamento</strong></td>
                <td>
                <?php
                    $datemeasure1 = $result->dmremovalfinish;
                    $datemeasure2 = 0000-00-00;
                    if($datemeasure1 == $datemeasure2 ){
                        echo "Nenhuma data";
                    } else {
                        $mcstartcertificate = strtotime(($result->dmremovalfinish));
                        echo date('d/m/Y', $mcstartcertificate);
                    }
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Total Afastamento</strong></td>
                <td>
                <?php echo $result->dmremoval; ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Retorno</strong></td>
                <td>
                <?php
                    $datemeasure1 = $result->dmreturndate;
                    $datemeasure2 = 0000-00-00;
                    if($datemeasure1 == $datemeasure2 ){
                        echo "Nenhuma data";
                    } else {
                        $mcstartcertificate = strtotime(($result->dmreturndate));
                        echo date('d/m/Y', $mcstartcertificate);
                    }
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>DT Entr. no RH</strong></td>
                <td>
                <?php
                    $datemeasure1 = $result->dmdeliverydate;
                    $datemeasure2 = 0000-00-00;
                    if($datemeasure1 == $datemeasure2 ){
                        echo "Nenhuma data";
                    } else {
                        $mcstartcertificate = strtotime(($result->dmdeliverydate));
                        echo date('d/m/Y', $mcstartcertificate);
                    }
                ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Observações</strong></td>
                <td>
                <?php echo $result->dmdescription; ?>
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
                <?php   $mccreated = strtotime(($result->dmcreated));
                        echo date('d/m/Y', $mccreated);
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data Modificado</strong></td>
                <td>
                <?php   $mcmodified = strtotime(($result->dmmodified));
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