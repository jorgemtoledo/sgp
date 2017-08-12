

<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Feedback</h1>

                <div class="form-group">
                  <div class="col-md-7">
                    <p><strong>Gestor: </strong><?php echo $result->fmanager; ?></p>
                  </div>
                  <div class="col-md-5">
                    <p><strong>Data: </strong><?php $mcstartcertificate = strtotime(($result->fcreated));
                        echo date('d/m/Y', $mcstartcertificate); ?></p>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-7  ">
                    <p><strong>Funcionário: </strong><?php echo $result->ename; ?> </p>
                  </div>
                  <div class="col-md-5">
                    <p><strong>Motivo: </strong><?php echo $result->tpname; ?> </p>
                  </div>
                </div>


            <label>Ponto(s) Positivo(s):</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="strengths" name="strengths"  rows="8"><?php echo $result->fstrengths; ?></textarea><br />
                  </div>
                </div>

            <label>Ponto(s) Melhoria(s):</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="improvements" name="improvements"  rows="8"><?php echo $result->fimprovements; ?></textarea><br />
                  </div>
                </div>

                <label>Feedback para o Gestor:</label>
                <div class="row">
                  <div class="col-md-11">
                    <textarea class="form-control" id="feed_manager" name="feed_manager"  rows="8"><?php echo $result->ffeedmanager; ?></textarea><br />
                  </div>
                </div><br /><br /><br />

                <div class="form-group">
                  <div class="col-md-6 text-center ">
                    <address>
                      <strong>______________________________________</strong><br>
                      <strong>COLABORADOR   </strong><br>
                      <strong><?php echo $result->ename; ?></strong><br>

                    </address>
                  </div>
                  <div class="col-md-5 text-center">
                    <address>
                      <strong>______________________________________</strong><br>
                      <strong>GESTOR   </strong><br>
                      <STRONG><?php echo $result->fmanager; ?></STRONG><br>

                    </address>
                  </div>
                </div>