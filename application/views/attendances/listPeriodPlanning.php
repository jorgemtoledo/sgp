        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Controle de Presença</h1>
                    <!-- Botao voltar -->
                    <a class="btn btn-primary" onClick="history.go(-1)" >
                    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
                    <!-- Fim Botao voltar -->
                    <?php
                                $id_user = $this->session->userdata('id');
                                //echo $id_user;
                    ?>

                    <?php
                        $this->db->select(
                        'W.id as wid,
                        W.team_id as wteam,
                        W.user_id as wuser,
                        U.id as uid,
                        U.name as uname,
                        T.id as tid,
                        T.name as tname');
                        $this->db->join('users as U', 'U.id = W.user_id','inner');
                        $this->db->join('teams as T', 'T.id = W.team_id','inner');
                        $this->db->where('W.user_id',$id_user);
                        $this->db->order_by("T.name","ASC");
                        $query = $this->db->get('teams_users as W');
                         //echo $num3 = $query->num_rows() . " quantidade";
                        //  foreach ($query->result() as $row)
                        // {
                        //     echo $row->tname;
                        //     $wid = $row->wid;
                        //     // echo "<td>" . $row->wid ."</td>";
                        // }
                    ?>
                <h2 class="sub-header">Listar</h2>
                </div>
                <div class="table-responsive">
                <!-- Subtitle & Control period  -->
                <div class="col-lg-10">
                  <div class="panel panel-primary">
                  <div class="panel-heading">
                      <i class="fa fa-list-alt"></i> Período do Controle
                  </div><br />
                    <div class="col-lg-12">
                    <div class="table-responsive">
                    <form class="form-group" action="<?php echo base_url() ?>attendances/listAttendancePlanning" method="post">
                        <div class="row">
                          <div class="col-md-2">
                              <label>Dia</label>
                              <select id="day" name="day" class="form-control selectpicker" data-live-search="true" required>
                                <option value=""> Selecione </option>
                                <?php for ($i = 1; $i <= 31; $i++) {
                                    echo   "<option value='$i'>" . $i .  "</option>";
                                } ?>
                              </select>
                          </div>
                          <div class="col-md-2">
                              <label>Mês</label>
                              <select id="month" name="month" class="form-control selectpicker" data-live-search="true" required>
                                <option value=""> Selecione </option>
                                <option value="1"> 01 </option>
                                <option value="2"> 02 </option>
                                <option value="3"> 03 </option>
                                <option value="4"> 04 </option>
                                <option value="5"> 05 </option>
                                <option value="6"> 06 </option>
                                <option value="7"> 07 </option>
                                <option value="8"> 08 </option>
                                <option value="9"> 09 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                              </select>
                          </div>
                          <div class="col-md-2">
                              <label>Ano</label>
                              <select id="year" name="year" class="form-control selectpicker" data-live-search="true" required>
                                <option value=""> Selecione </option>
                                <option value="2017"> 2017 </option>
                                <option value="2018"> 2018 </option>
                                <option value="2019"> 2019 </option>
                                <option value="2020"> 2020 </option>
                                <option value="2021"> 2021 </option>
                                <option value="2022"> 2022 </option>
                                <option value="2023"> 2023 </option>
                                <option value="2024"> 2024 </option>
                                <option value="2025"> 2025 </option>
                                <option value="2026"> 2026 </option>
                                <option value="2027"> 2027 </option>
                              </select>
                          </div><br />
                          <div class="col-md-1">
                            <button type="submit" class="btn btn-primary">Selecionar</button>
                          </div>

                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Finish Subtitle -->
                </div>

                <br />

                <?php
                        $name = $this->session->userdata('name');
                        // echo $name;
                        $id_user = $this->session->userdata('id');
                        //echo $id_user;
                        $this->db->where('id',$id_user);
                        $this->db->from('users');
                          $query = $this->db->get();
                          if($query->num_rows > 0 ) {
                            foreach ($query->result() as $row) {
                              // echo $row->level;
                            }
                          }
                          $level = $row->level;
                            if($level == 1 || $level == 2 ||$level == 3 || $level == 5) {

                ?>
                <div class="table-responsive">
                <!-- Subtitle & Control period  -->
                <div class="col-lg-10">
                  <div class="panel panel-warning">
                  <div class="panel-heading">
                      <i class="fa fa-download"></i> Exportar EXCEL
                  </div><br />
                    <div class="col-lg-12">
                    <div class="table-responsive">
                    <form class="form-group" action="<?php echo base_url() ?>attendances/listAttendancesExcel" method="post">
                        <div class="row">
                          <div class="col-md-2">
                              <label>Mês</label>
                              <select id="month" name="month" class="form-control selectpicker" data-live-search="true" required>
                                <option value=""> Selecione </option>
                                <option value="1"> 01 </option>
                                <option value="2"> 02 </option>
                                <option value="3"> 03 </option>
                                <option value="4"> 04 </option>
                                <option value="5"> 05 </option>
                                <option value="6"> 06 </option>
                                <option value="7"> 07 </option>
                                <option value="8"> 08 </option>
                                <option value="9"> 09 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                              </select>
                          </div>
                          <div class="col-md-2">
                              <label>Ano</label>
                              <select id="year" name="year" class="form-control selectpicker" data-live-search="true" required>
                                <option value=""> Selecione </option>
                                <option value="2017"> 2017 </option>
                                <option value="2018"> 2018 </option>
                                <option value="2019"> 2019 </option>
                                <option value="2020"> 2020 </option>
                                <option value="2021"> 2021 </option>
                                <option value="2022"> 2022 </option>
                                <option value="2023"> 2023 </option>
                                <option value="2024"> 2024 </option>
                                <option value="2025"> 2025 </option>
                                <option value="2026"> 2026 </option>
                                <option value="2027"> 2027 </option>
                              </select>
                          </div><br />
                          <div class="col-md-1">
                            <button type="submit" class="btn btn-warning">BAIXAR</button>
                          </div>

                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- Finish Subtitle -->
                </div>

                <?php } ?>
            </div>
        </div>
        <!-- /#page-wrapper -->







