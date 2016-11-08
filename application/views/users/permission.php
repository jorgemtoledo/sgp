<div id="page-wrapper">
  <div class="row">

          <!-- <h1 class="page-header">Cadastrar Permissões usuário <?php echo " - Id do usuario: " . $users[0]->id; ?></h1> -->
          <h1 class="page-header">Cadastrar permissões usuário: <em> <?php echo $users[0]->name; ?> </em></h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>users" ><i class="glyphicon glyphicon-list-alt"></i>   Listar usuários </a>
          </div>

          <h2 class="sub-header">Permissões do usuário</h2>

          <div class="table-responsive">
            <form class="form-group" action="<?php echo base_url() ?>users/savepermission" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo $users[0]->id; ?>">

                <!-- <div class="row"  >
                <div class="col-md-5">
                  <label>Equipes</label>
                  <?php foreach ($teams as $team) { ?>
                  <div class="checkbox">
                      <label>
                          <input type="checkbox" name="team_id[]" id="team_id[]" value="<?php echo $team->tid; ?>" <?php echo $team->tid==$team_user->teams_id?'checked="checked"':''; ?>><?php echo $team->tname; ?>
                      </label>
                  </div>
                  <?php } ?>
              </div>
              </div> -->

              <div class="row"  >
                <div class="col-md-10">
                  <label>Equipes</label>
                  <?php foreach ($teams as $team) { ?>
                  <div class="checkbox">
                      <label>
                          <h3> <input 
                                type="checkbox" 
                                name="team_id[]" 
                                id="team_id[]" 
                                value="<?php echo $team->tid; ?>" 
                                <?php
                                      $array = $teams_users;
                                      $array = array();
                                      foreach ($teams_users as $obj) {
                                          $array[] = $obj->team_id;
                                          echo $team->tid==$obj->team_id?'checked="checked"':''; 
                                      }
                                ?>>
                                <?php echo $team->tname; ?> <small> - <em><?php echo $team->oname; ?></em>  - <em><?php echo $team->cname; ?></em></small></h3>
                      </label>
                  </div>
                  <?php } ?>
              </div>
              </div><br /><br />
              <div style="text-align: right">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <!-- <button type="reset" class="btn btn-danger">Cancelar</button> -->
              </div>
            </form>
          </div>
        </div>
        </div>