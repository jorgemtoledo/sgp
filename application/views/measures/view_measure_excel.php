<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informações dos Medidas</h1>
            <!-- Botao voltar -->
            </div></ul>
            </div>
        </div>
    </div>
</div>
</div>


<div class="col-lg-12">
  <div class="panel panel-default">
      <div class="col-lg-12">
      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th>Matricula</th>
              <th>Nome do Funcionario</th>
              <th>Equipe/Setor</th>
              <th>Nr Medida</th>
              <th>Data da Aplicação</th>
              <th>Data da Ocorrência</th>
              <th>Tipo de Medida</th>
              <th>Motivo</th>
              <th>Inicio Afastamento</th>
              <th>Fim Afastamento</th>
              <th>Total Afastamento</th>
              <th>Retorno</th>
              <th>DT Entr. no RH</th>
              <th>Observacao</th>
              <th>Usuário que cadastrou/alterou</th>
              <th>Data Cadastro</th>
              <th>Data Modificado</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($exp_excel as $measure) {?>
        <tr>
              <td><?php echo $measure->eregistration ; ?></td>
              <td><?php echo $measure->ename ; ?></td>
              <td><?php echo $measure->tname ; ?></td>
              <td><?php echo $measure->dmid ; ?></td>
              <td>
                      <?php   $timestamp = strtotime(($measure->dmapplicationdate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>
              <td><?php echo $measure->dmoccurrencedate ; ?></td>
              <td><?php echo $measure->tmname ; ?></td>
              <td><?php echo $measure->rmname ; ?></td>
              <td>
                      <?php
                          $startRemoval = $measure->dmremovalstart;
                          if(empty($startRemoval))
                          {
                            echo "Sem data";
                          } else{
                            $vazio = "0000-00-00 00:00:00";
                            // echo $measure->dmremovalstart;
                            if ($measure->dmremovalstart == $vazio) {
                              echo "Sem data";
                            } else {
                              $timestamp = strtotime(($measure->dmremovalstart ));
                              echo date('d/m/y', $timestamp);
                            }
                          }
                       ?>
              </td>

              <td>
                      <?php
                          $finishRemoval = $measure->dmremovalfinish;
                          if(empty($finishRemoval))
                          {
                            echo "Sem data";
                          } else{
                            $vazio = "0000-00-00 00:00:00";
                            if ($measure->dmremovalfinish == $vazio) {
                              echo "Sem data";
                            } else {
                              $timestamp = strtotime(($measure->dmremovalfinish ));
                              echo date('d/m/y', $timestamp);
                            }
                          }
                       ?>
              </td>

              <td><?php echo $measure->dmremoval ; ?></td>

               <td>
                      <?php
                          $returnDate = $measure->dmreturndate;
                          if(empty($returnDate))
                          {
                            echo "Sem data";
                          } else{
                            $vazio = "0000-00-00 00:00:00";
                            if ($measure->dmreturndate == $vazio) {
                              echo "Sem data";
                            } else {
                              $timestamp = strtotime(($measure->dmreturndate ));
                              echo date('d/m/y', $timestamp);
                            }
                          }
                       ?>
              </td>

              <td>
                      <?php
                          $dateRH = $measure->dmdeliverydate;
                          if(empty($dateRH))
                          {
                            echo "Sem data";
                          } else{
                            $vazio = "0000-00-00 00:00:00";
                            if ($measure->dmdeliverydate == $vazio) {
                              echo "Sem data";
                            } else {
                              $timestamp = strtotime(($measure->dmdeliverydate ));
                              echo date('d/m/y', $timestamp);
                            }
                          }
                       ?>
              </td>

              <td><?php echo $measure->dmdescription ; ?></td>


              <td><?php echo $measure->uname ; ?></td>

              <td>
                      <?php   $timestamp = strtotime(($measure->dmcreated ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>
              <td>
                      <?php   $timestamp = strtotime(($measure->dmmodified ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>
            </tr>

            <?php } ?>

          </tbody>

        </table>

      </div>
      </div>
  </div>
</div>

<!-- Script HTML to EXCEL -->
<?php

$arquivo = "relatorioMedidas.xls";
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename={$arquivo}" );
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->

</div>
