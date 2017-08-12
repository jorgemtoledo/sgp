<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Dados do Feedback</h1>

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
                <?php echo $result->fid; ?>
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
                <td><strong>Gestor</strong></td>
                <td>
                <?php echo $result->fmanager; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data do Feedback</strong></td>
                <td>
                <?php
                    $datemeasure1 = $result->fcreated;
                    $datemeasure2 = 0000-00-00;
                    if($datemeasure1 == $datemeasure2 ){
                        echo "Nenhuma data";
                    } else {
                        $mcstartcertificate = strtotime(($result->fcreated));
                        echo date('d/m/Y', $mcstartcertificate);
                    }
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Motivo do Feedback</strong></td>
                <td>
                <?php echo $result->tpname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Ponto(s) Positivo(s)</strong></td>
                <td>
                <?php echo $result->fstrengths; ?>
                &nbsp;
                </td>
                </tr>

                </tr>
                <tr>
                <td><strong>Ponto(s) Melhoria(s)</strong></td>
                <td>
                <?php echo $result->fimprovements; ?>
                &nbsp;
                </td>
                </tr>

                <tr>
                <td><strong>Feedback para o Gestor:</strong></td>
                <td>
                <?php echo $result->ffeedmanager; ?>
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
                <td><strong>Data Modificado</strong></td>
                <td>
                <?php   $mcmodified = strtotime(($result->fmodified));
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