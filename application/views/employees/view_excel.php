<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informações dos Funcionarios</h1>
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
              <th>Nome do Funcionario</th>
              <th>Matricula/Registro</th>
              <th>CPF</th>
              <th>Cargo</th>
              <th>Carga Horária</th>
              <th>Situação</th>
              <th>Empresa</th>
              <th>Data Contratação</th>
              <th>Data de Aniversário</th>
              <th>Telefone 1</th>
              <th>Telefone 2</th>
              <th>Telefone 3</th>
              <th>Descrição</th>
              <th>Data de Demissão</th>
              <th>Usuário que cadastrou/alterou</th>
              <th>Data Cadastro</th>
              <th>Data Modificado</th>

            </tr>
          </thead>

          <tbody>
            <?php foreach ($employees as $employee) {?>
        <tr>
              <td><?php echo $employee->ename ; ?></td>
              <td><?php echo $employee->eregistration ; ?></td>
              <td><?php echo $employee->ecpf ; ?></td>
              <td><?php echo $employee->jname ; ?></td>
              <td><?php echo $employee->eworkload ; ?></td>
              <td><?php echo $employee->sname ; ?></td>
              <td><?php echo $employee->cname ; ?></td>
              <td>
                      <?php   $timestamp = strtotime(($employee->ehiredate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td>
                      <?php   $timestamp = strtotime(($employee->ebirthdate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

              <td><?php echo $employee->ephone1 ; ?></td>

              <td><?php echo $employee->ephone2 ; ?></td>

              <td><?php echo $employee->ephone3 ; ?></td>

              <td><?php echo $employee->edescription ; ?></td>

              <td>
                      <?php   $timestamp = strtotime(($employee->eresignationdate ));
                          echo date('d/m/y', $timestamp);
                       ?>
              </td>

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
      </div>
  </div>
</div>

<!-- Script HTML to EXCEL -->
<?php

$arquivo = "listaFuncionarios.xls";
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename={$arquivo}" );
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->

</div>
