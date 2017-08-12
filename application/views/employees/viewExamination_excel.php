<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informações Exames Periódicos</h1>
            <!-- Botao voltar -->
            </div></ul>
            </div>
        </div>
    </div>
</div>
</div>


  <div class="panel panel-default">


        <table class="table table-striped table-bordered table-hover table-condensed" id="table_id">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Matricula/Registro</th>
              <th>CPF</th>
              <th>Cargo</th>
              <th>Equipe</th>
              <th>Situação</th>
              <th>Data Contratação</th>
              <th>Tipo Exame</th>
              <th>Ultimo Exame</th>
              <th>Previsão Proximo Exame</th>
              <th>Data Agendada</th>
              <th>Realizado?</th>
              <th>Descrição</th>
              <th>Usuário que cadastrou/alterou</th>
              <th>Data Cadastro</th>
              <th>Data Modificado</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($employees as $employee) {?>
        <tr>
              <td><?php echo $employee->empname ; ?></td>
              <td><?php echo $employee->empregistration ; ?></td>
              <td><?php echo $employee->empcpf ; ?></td>
              <td><?php echo $employee->jname ; ?></td>
              <td><?php echo $employee->tname ; ?></td>
              <td><?php echo $employee->sname ; ?></td>
              <td>
                      <?php   $timestamp = strtotime(($employee->emphiredate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>
              <td><?php echo $employee->etype ; ?></td>
              <td>
                      <?php   $timestamp = strtotime(($employee->elast ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($employee->enext ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($employee->escheduled ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td  class="text-center"><h6>
              <?php
                  $accomplished = 1;
                      if ($accomplished == $employee->eaccomplished) {
                          echo "Sim";
                      } else {
                          echo "Não";
                      }
              ?>
              </h6></td>

              <td><?php echo $employee->edescription ; ?></td>

              <td><?php echo $employee->uname ; ?></td>

              <td>
                      <?php   $timestamp = strtotime(($employee->ecreated ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($employee->emodified ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>
            </tr>

            <?php } ?>

          </tbody>

        </table>



  </div>


<!-- Script HTML to EXCEL -->
<?php
$arquivo = "listaExamesPeriodicos.xls";
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename={$arquivo}" );
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->

</div>
