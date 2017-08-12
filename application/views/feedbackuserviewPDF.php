<?php
$this->load->view('include/header');
?>

<div id="page-wrapper">
  <div class="row">


        <!-- <div class="text-center">
          <img src="<?php echo base_url(); ?>assets/img/logoPdf.png" alt="..." class="margin">
        </div> -->

        <p>  <h2 class="text-center">Feedback</h2></p>

                <div class="form-group">
                  <div class="col-md-7">
                    <p><strong>Gestor: </strong><?php echo $result->fmanager; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <strong>   Data: </strong><?php $mcstartcertificate = strtotime(($result->fcreated));
                        echo date('d/m/Y', $mcstartcertificate); ?></p>
                  </div>

                  <div class="col-md-7  ">
                    <p><strong>Funcionário: </strong><?php echo $result->ename; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                   <!--  <strong>Motivo: </strong><?php echo $result->tpname; ?> --> </p>
                  </div>
                </div>


            <label><strong>Ponto(s) Positivo(s):</strong></label>
                <div class="row">
                  <div class="col-md-10">
                    <textarea class="form-control" id="strengths" name="strengths"  rows="5"><?php echo $result->fstrengths; ?></textarea>
                  </div>
                </div>

                <div>
                <label><strong>Ponto(s) Melhoria(s):</strong></label>
                <div class="row">
                  <div class="col-md-10">
                    <textarea class="form-control" id="improvements" name="improvements"  rows="19"><?php echo $result->fimprovements; ?></textarea>
                  </div>
                </div>
                </div>


                <div>
                <label><strong></strong></label>
                <div class="row">
                  <div class="col-md-10">
                    <textarea class="form-control" id="feed_manager" name="feed_manager"  rows="5"><strong>Feedback para o Gestor: </strong><?php echo $result->ffeedmanager; ?></textarea>
                  </div>
                </div>
                </div><br><br>

                <div class="form-group">
                  <div class="col-md-6 text-center ">
                    <address>
                    <div>
                      <strong>______________________________________</strong>
                    </div>
                      <div>
                          <strong>COLABORADOR   </strong>
                      </div>
                      <strong><?php echo $result->ename; ?></strong>

                    </address>
                  </div>
                  <div class="col-md-5 text-center">
                    <address>
                      <strong>______________________________________</strong>
                      <div>
                          <strong>GESTOR   </strong>
                      </div>
                      <STRONG><?php echo $result->fmanager; ?></STRONG>

                    </address>
                  </div>
                </div>


        <?php
        $this->load->view('include/footer');
        ?>