<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastro Falta / Presença do Funcionário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>attendances/" ><i class="glyphicon glyphicon-list-alt"></i>   Painel</a>
          </div>
          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>attendances/saveattendances" method="post">

              <div class="row"  >
                <div class="col-md-6">
                    <label>Funcionario</label>
                    <select id="worker_id" name="worker_id" class="form-control selectpicker" data-live-search="true" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($workers as $worker) { ?>
                      <option value="<?php echo $worker->wid; ?>"> <?php echo $worker->ename; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Tipo (Ex: Falta, Presença)</label>
                    <select id="type_attendance_id" name="type_attendance_id" class="form-control" required>
                      <option value=""> Selecione </option>
                      <?php foreach ($typeAttendances as $typeAttendance) { ?>
                      <option value="<?php echo $typeAttendance->id; ?>"> <?php echo $typeAttendance->name . " - " . $typeAttendance->sgl ; ?> </option>
                      <?php } ?>
                    </select>
                  </div>
              </div><br />
              <div class="row"  >
                <div class="col-md-2">
                    <label>Dia</label>
                    <select id="day" name="day" class="form-control" required>
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
                    <option value="13"> 13 </option>
                    <option value="14"> 14 </option>
                    <option value="15"> 15 </option>
                    <option value="16"> 16 </option>
                    <option value="17"> 17 </option>
                    <option value="18"> 18 </option>
                    <option value="19"> 19 </option>
                    <option value="20"> 20 </option>
                    <option value="21"> 21 </option>
                    <option value="22"> 22 </option>
                    <option value="23"> 23 </option>
                    <option value="24"> 24 </option>
                    <option value="25"> 25 </option>
                    <option value="26"> 26 </option>
                    <option value="27"> 27 </option>
                    <option value="28"> 28 </option>
                    <option value="29"> 29 </option>
                    <option value="30"> 30 </option>
                    <option value="31"> 31 </option>
                  </select>
                  </div>
                  <div class="col-md-2">
                    <label>Mês</label>
                    <select id="month" name="month" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                  </select>
                  </div>
                <div class="col-md-2">
                  <label for="active">Ano:</label>
                  <select id="year" name="year" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="2016"> 2016 </option>
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
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="alert">Alerta:</label>
                  <select id="alert" name="alert" class="form-control" required>
                    <option value=""> Selecione </option>
                    <option value="1"> Sim </option>
                    <option value="0"> Não </option>
                  </select>
                </div>
              </div><br />
               <div class="row"  >
               <div class="col-md-9">
               <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" id="description" name="description"  rows="3"></textarea>
              </div>
              </div>
              </div><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>