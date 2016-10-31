<div id="page-wrapper">
	<h1 class="page-header">Controle Faltas da Equipe</h1>
    <!-- Botao voltar -->
    <a class="btn btn-primary" onClick="history.go(-1)" >
    <i class="glyphicon glyphicon-arrow-left"></i>  Voltar</a><br /><br />
    <!-- Fim Botao voltar -->
	 <div class="row">

     <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Controle por mês - <?php  $yearmedicalcertificates = date("Y");
                                                            echo $yearmedicalcertificates;
                                                     ?> - EQUIPE:
                                 <?php echo $teamOne->tname; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>01</th>
                                            <th>02</th>
                                            <th>03</th>
                                            <th>04</th>
                                            <th>05</th>
                                            <th>06</th>
                                            <th>07</th>
                                            <th>08</th>
                                            <th>09</th>
                                            <th>10</th>
                                            <th>11</th>
                                            <th>12</th>
                                            <th>13</th>
                                            <th>14</th>
                                            <th>15</th>
                                            <th>16</th>
                                            <th>17</th>
                                            <th>18</th>
                                            <th>19</th>
                                            <th>20</th>
                                            <th>21</th>
                                            <th>22</th>
                                            <th>23</th>
                                            <th>24</th>
                                            <th>25</th>
                                            <th>26</th>
                                            <th>27</th>
                                            <th>28</th>
                                            <th>29</th>
                                            <th>30</th>
                                            <th>31</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td>
                                            <?php
                                                        $this->db->where('workers.team_id',$teamOne->tid);
                                                        $this->db->where(01, 'MONTH(medical_certificates.created)' , FALSE);
                                                        $this->db->where($yearmedicalcertificates, 'YEAR(medical_certificates.created)' , FALSE);
                                                        $this->db->from('medical_certificates');
                                                        $this->db->join('workers', 'workers.id = medical_certificates.worker_id');
                                                        $countmedicaldate = $this->db->count_all_results();
                                                        echo $countmedicaldate;

                                            ?>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

                <div class="col-lg-11">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                                 Atestados da Equipe:
                            <?php echo $teamOne->tname; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NOME</th>
                                            <th class="text-center">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($teams as $team) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $team->wid;?></td>
                                            <td><a href="<?php echo base_url('tasks/tskmedcertworker/'.$team->wid); ?>"><?php echo $team->ename;?></a></td>
                                            <?php
                                                        $this->db->where('worker_id',$team->wid);
                                                        $this->db->from('medical_certificates');
                                                        $count = $this->db->count_all_results();

                                            ?>
                                            <?php if ($count <= 0) { ?>
                                            <td class="text-center"><span class="label label-pill label-success">
                                    		<?php
												echo $count;
                                            } if ($count > 0 && $count <= 5) { ?>
                                            <td class="text-center"><span class="label label-pill label-warning">
                                            <?php
                                                echo $count;
                                                } elseif ($count >= 6) {?>
                                            <td class="text-center"><span class="label label-pill label-danger">
                                            <?php
                                                echo $count;
                                            }
	                                        ?>
                                            </span></td>
                                        </tr>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

</div>