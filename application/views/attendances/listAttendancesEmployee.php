<div id="page-wrapper">
<div class="span12">
<div class="widget-box">
    <div class="widget-content">
        <div class="row-fluid">
            <div class="span12">
                <ul class="site-stats">
                <div class="col-md-12"><h1 class="page-header">Informacoes do Funcionario</h1>
            </div></ul>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-lg-12">
  <div class="panel panel-default">

      <table class="table table-bordered table-hover table-striped" width="12%" border="1" cellspacing="20" cellpadding="12">
      <thead>
            <tr>
              <th>Funcionario</th>
              <th>Equipe</th>
              <th>Dia</th>
              <th>Mês</th>
              <th>Ano</th>
              <th>Status</th>
              <th>Descriçao</th>
              <th>Quem cadastrou</th>
              <th>Data Criado</th>
              <th>Data Alterado</th>
            </tr>
          </thead>
          <tbody>
          <?php
            foreach ($listAttendancesEmployee as $value) { ?>
          <tr>
              <td><?php echo $value->ename ; ?></td>
              <td><?php echo $value->tname ; ?></td>
              <td><?php echo $value->aday ; ?></td>
              <td><?php echo $value->amonth ; ?></td>
              <td><?php echo $value->ayear ; ?></td>
              <td><?php echo $value->taname ; ?></td>
              <td><?php echo $value->adescription ; ?></td>
              <td><?php echo $value->uname ; ?></td>
              <td><?php
                 $timestamp = strtotime(($value->acreated ));
                          echo date('d/m/y', $timestamp);
              ?></td>
              <td><?php
                 $modified = strtotime(($value->amodified ));
                          echo date('d/m/y', $modified);
              ?></td>
          </tr>
          <?php } ?>
          </tbody>
      </table>

    </div>
</div>


<!-- Script HTML to EXCEL -->
<?php
header('Content-Encoding: UTF-8');
header("Content-type: application/octet-stream; charset=UTF-8");
header("Content-Disposition: attachment; filename=relatorioPresencaFuncionario.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!--/ Script HTML to EXCEL -->

</div>

<!-- <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script> -->



