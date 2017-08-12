        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Legenda</h1>
                    <div class="box-tools pull-right">
                        <a class="btn btn-success" href="<?php echo base_url() ?>attendances/addSubtitle" ><i class="glyphicon glyphicon-plus"></i>  Legenda</a>
                    </div>
                    <?php
                                $id_user = $this->session->userdata('id');
                                // echo $id_user;
                    ?>
                </div>
                <h2 class="sub-header">Listar</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th>Descrição</th>
                                <th>Criado</th>
                                <th>Modificado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($subtitles as $subtitle) { ?>
                                <tr>
                                    <td><?php echo $subtitle->id; ?></td>
                                    <td><?php echo $subtitle->name; ?></td>
                                    <td><?php echo $subtitle->sgl; ?></td>
                                    <td><?php echo $subtitle->description; ?></td>
                                    <td>
                                    <?php   $timestamp = strtotime(($subtitle->created));
                                        echo date('d/m/y', $timestamp);
                                    ?>
                                    </td>
                                    <td>
                                    <?php   $timestamp = strtotime(($subtitle->modified));
                                        echo date('d/m/y', $timestamp);
                                    ?>
                                    </td>

                                    <td><a href="<?php echo base_url('attendances/editTypeAttendances/'.$subtitle->id); ?>" class="btn btn-primary btn-group"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <!-- <a href="<?php echo base_url('attendances/deleteTypeAttendances/'.$subtitle->id); ?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir!');"><i class="glyphicon glyphicon-trash"></i></a></td> -->
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->







