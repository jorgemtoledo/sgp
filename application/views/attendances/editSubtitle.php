<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Cadastrar Legenda para o Sistema</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>attendances/" ><i class="glyphicon glyphicon-list-alt"></i>   Painel</a>
          </div>
          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>attendances/saveEditTypeAttendances" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $type_attendances[0]->id; ?>">
              <div class="row"  >
                <div class="col-md-6">
                  <label for="name">Nome:</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $type_attendances[0]->name; ?>"  required>
                </div>
                <div class="col-md-3">
                  <label for="sgl">Sigla:</label>
                  <input type="text" class="form-control" id="sgl" name="sgl" maxlength="5" value="<?php echo $type_attendances[0]->sgl; ?>"   required>
                </div>
              </div><br />
               <div class="row"  >
               <div class="col-md-9">
               <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" id="description" name="description"  rows="3"><?php echo $type_attendances[0]->description; ?></textarea>
              </div>
              </div>
              </div><br />
              <div style="text-align: left">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
        </div>