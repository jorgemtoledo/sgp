<div id="page-wrapper">
  <div class="row">

          <h1 class="page-header">Dados do funcionário</h1>

          <div class="box-tools pull-right">
                <a class="btn btn-success" href="<?php echo base_url() ?>employees" ><i class="glyphicon glyphicon-list-alt"></i>   Listar Funcionários </a>
          </div>

          <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Informações</h3>
          </div>

            <div class="box-body table-responsive">
            <table id="Companies" class="table table-bordered table-striped">
              <tbody>
                <tr>
                <td><strong>Nome</strong></td>
                <td>
                <?php echo $result->ename; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Empresa</strong></td>
                <td>
                <?php echo $result->cname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Cargo</strong></td>
                <td>
                <?php echo $result->jname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Situação</strong></td>
                <td>
                <?php echo $result->sname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Matricula/Registro</strong></td>
                <td>
                <?php echo $result->eregistration; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>CPF</strong></td>
                <td>
                <?php echo $result->ecpf; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data Contratação</strong></td>
                <td>
                <?php   $ehiredate = strtotime(($result->ehiredate));
                        echo date('d/m/Y', $ehiredate);
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Carga Horária</strong></td>
                <td>
                <?php echo $result->eworkload; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data de Aniversário</strong></td>
                <td>
                <?php   $ebirthdate = strtotime(($result->ebirthdate));
                        echo date('d/m/Y', $ebirthdate);
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Telefone 1</strong></td>
                <td>
                <?php echo $result->ephone1; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Telefone 2</strong></td>
                <td>
                <?php echo $result->ephone2; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Telefone 3</strong></td>
                <td>
                <?php echo $result->ephone3; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data de Demissão</strong></td>
                <td>
                <?php   $eresignationdate = strtotime(($result->eresignationdate));
                        echo date('d/m/Y', $eresignationdate);
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Descrição</strong></td>
                <td>
                <?php echo $result->edescription; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Usuário que cadastrou/alterou</strong></td>
                <td>
                <?php echo $result->uname; ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data Cadastro</strong></td>
                <td>
                <?php   $ecreated = strtotime(($result->ecreated));
                        echo date('d/m/Y', $ecreated);
                ?>
                &nbsp;
                </td>
                </tr>
                <tr>
                <td><strong>Data Modificado</strong></td>
                <td>
                <?php   $emodified = strtotime(($result->emodified));
                        echo date('d/m/Y', $emodified);
                ?>
                &nbsp;
                </td>
                </tr>
              </tbody>
            </table><!-- /.table table-striped table-bordered -->
            </div><!-- /.table-responsive -->
          </div><!-- /.view -->
          </div>
        </div>
        </div>