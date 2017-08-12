<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Lista Férias / INSS </h1>

          <div class="box-tools pull-right">
              <a class="btn btn-primary" onClick="history.go(-1)" >
              <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a>
              <a class="btn btn-success"  href="<?php echo base_url('attendances/holiday'); ?>">
              <i class="glyphicon glyphicon-plus"></i>  Cadastrar</a><br />
          </div>

          <h2 class="sub-header">Informações</h2>

          <div class="table-responsive">
            <table class="table" id="table_id">
              <thead>
                <tr>
                  <th><h6><strong>Funcionario</strong></h6></th>
                  <th><h6><strong>Equipe/Setor</strong></h6></th>
                  <th><h6><strong>Data Inicio</strong></h6></th>
                  <th><h6><strong>Inicio Fim</strong></h6></th>
                  <th><h6><strong>Qtd Dias</strong></h6></th>
                  <th><h6><strong>Tipo Afastamento</strong></h6></th>
                  <th><h6><strong>Status</strong></h6></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($listAbsences as $absence) { ?>
                  <tr>
                    <td><h6><?php echo $absence->ename; ?></h6></td>
                    <td><h6><?php echo $absence->tname; ?></h6></td>
                    <td><h6>
                    <?php   $timestamp = strtotime($absence->abstart);
                        echo date('d/m/y', $timestamp);
                    ?>
                    </h6></td>
                    <td><h6>
                    <?php   $timestamp = strtotime($absence->abfinish);
                        echo date('d/m/y', $timestamp);
                    ?>
                    </h6></td>
                    <td><h6>
                    <?php
                      $date1 = new DateTime( $absence->abstart );
                      $date2 = new DateTime( $absence->abfinish);
                      $intervalo = $date1->diff( $date2 );
                      echo "{$intervalo->d} dias";
                    ?>
                    </h6></td>
                    <td class="text-center"><h6><?php echo $absence->typename; ?></h6></td>
                    <td><h6>
                    <?php
                    $dateStart = $absence->abstart;
                    $dateFinish = $absence->abfinish;
                    $today = date("Y-m-d");
                    // echo $dateStart . "<br>";
                    // echo $dateFinish . "<br>";
                    // echo $today;

                    if (strtotime($today) <= strtotime($dateStart)) {
                      echo "<p class='text-primary'><strong>Programado</strong></p>";
                    } elseif (strtotime($dateStart) < strtotime($today) && strtotime($dateFinish) >= strtotime($today)) {
                      echo "<p class='text-success'><strong>Em andamento</strong></p>";
                    } else {
                      echo "<p class='text-danger'><strong>Finalizado</strong></p>";
                    }
                    ?>

                    </h6></td>


                  </tr>
              <?php } ?>

              </tbody>
            </table>

        </div>
      </div>
    </div>
</div>

<script src="<?php echo base_url('assets/bootstrap-3.1.1/js/jquery-2.1.4.min.js') ?>"></script>




