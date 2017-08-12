<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informações dos Atestados</h1>
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
              <th>Nr Atestado</th>
              <th>Tipo Atestado</th>
              <th>Data Entrega</th>
              <th>Data Inicio</th>
              <th>Data Fim</th>
              <th>Qtde Dias</th>
              <th>Abona?</th>
              <th>Periodo</th>
              <th>CID</th>
              <th>Descriçao CID</th>
              <th>Observacao</th>
              <th>Medico</th>
              <th>CRM</th>
              <th>Posto</th>
              <th>Usuario</th>
              <th>Data Criado</th>
              <th>Data Alterado</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($medicalcertificates as $medicalcertificate) {?>
        <tr>
              <td><?php echo $medicalcertificate->eregistration ; ?></td>
              <td><?php echo $medicalcertificate->ename ; ?></td>
              <td><?php echo $medicalcertificate->tname ; ?></td>
              <td><?php echo $medicalcertificate->mcid ; ?></td>
              <td><?php echo $medicalcertificate->tpname ; ?></td>
              <td>
                      <?php   $timestamp = strtotime(($medicalcertificate->mcdelivery_date ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($medicalcertificate->mcstart_certificate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($medicalcertificate->mcfinish_certificate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td><?php echo $medicalcertificate->mcnumber_day ; ?></td>

              <td>
              <?php
              $accredit = 1;
                if ($accredit == $medicalcertificate->mcaccredit ) {
                  echo "<span class='label label-success'>Sim</span>";
                } else {
                  echo "<span class='label label-danger'>Não</span>";
                }
              ?>
              </h6>
              </td>


              <td><?php echo $medicalcertificate->doname ; ?></td>
              <td><?php echo $medicalcertificate->cname ; ?></td>
              <td><?php echo $medicalcertificate->cdescription ; ?></td>
              <td><?php echo $medicalcertificate->mcdescription ; ?></td>
              <td><?php echo $medicalcertificate->dname ; ?></td>
              <td><?php echo $medicalcertificate->dcrm ; ?></td>
              <td><?php echo $medicalcertificate->hsname ; ?></td>
              <td><?php echo $medicalcertificate->uname ; ?></td>

              <td>
                      <?php   $timestamp = strtotime(($medicalcertificate->mccreated ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($medicalcertificate->mcmodified ));
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

$arquivo = "listaAtestados.xls";
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename={$arquivo}" );
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->

</div>
