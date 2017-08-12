

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                   <!--  <?php date_default_timezone_set("America/Campo_Grande");
                    // $time =  Date('Y-m-d h:i:s');
                    $time =  Date('d/m/Y H:i:s');
                    echo $time; ?> -->
                </div>
                
				<?php
                                //$name = $this->session->userdata('name');
                               // echo $name;
                  foreach ($level_user as $key =>$value) {
               			$level_user[$key]->level;
               	}?>

               	<?php
               		if($level_user[$key]->level == 1){
               	?>

               <!--  <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-building-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    	<?php foreach ($count_companies as $count_companie) {
						               			echo $count_companie;
						               	}?>
                                    </div>
                                    <div>Empresas</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>companies">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->

                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus-square fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        Atestados
                                    </div>
                                    <div>Médicos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>certificates">
                            <div class="panel-footer">
                                <span class="text-danger">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right text-danger"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gears fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    	<?php foreach ($count_operations as $count_operation) {
						               			echo $count_operation;
						               	}?>

                                    </div>
                                    <div>Departamentos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>operations">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sitemap fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    	<?php foreach ($count_teams as $count_team) {
						               			echo $count_team;
						               	}?>
                                    </div>
                                    <div>Equipes/Setor</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>teams">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    	<?php foreach ($count_employees as $count_employee) {
						               			echo $count_employee;
						               	}?>
						            </div>
                                    <div>Funcionários</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url(); ?>employees">
                            <div class="panel-footer">
                                <span class="pull-left">Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>


                <!-- /.col-lg-12 -->
            </div>


            <!-- JavaScript para alert -->
            <!-- <span id="blink">blink</span> -->
          <script type="text/javascript">
        //     var ui = (function() {
        //         function Blinker(control, rate, css) {
        //             if(!(this instanceof Blinker)) {
        //                 return new Blinker();
        //             }

        //             this.control = control;
        //             this.rate = rate;
        //             this.css = css;
        //             this.blinkIntervalId = 0;
        //             this.resetCss = {};
        //             this.toogle = true;

        //             for(var prop in this.css) {
        //                 this.resetCss[prop] = "";
        //             }
        //         }

        //         Blinker.prototype.blink = function() {
        //             var that = this;
        //             that.blinkIntervalId = setInterval(function() {
        //                 if(that.toogle) {
        //                     //$(that.control).css(that.css);
        //                     that.setCss(that.css);
        //                     that.toogle = false;
        //                 } else {
        //                     //$(that.control).css(that.resetCss);
        //                     that.setCss(that.resetCss);
        //                     that.toogle = true;
        //                 }
        //             }, this.rate);
        //         };
                
        //         Blinker.prototype.setCss = function(css) {
        //             for(var prop in css) {
        //                 this.control.style[prop] = css[prop];
        //             }
        //         };
        //         var blinkers = [];

        //         return {
        //             blink : function(control, rate, css) {
        //                 var b = new Blinker(control, rate, css);
        //                 blinkers.push(b);
        //                 b.blink();
        //             },
        //             clearBlink : function(control) {
        //                 for(var i = 0, max = blinkers.length; i < max; i++) {
        //                     var blinker = blinkers[i];
        //                     if(blinker.control == control) {
        //                         blinker.clear();
        //                         blinkers.splice(i, 1);
        //                         return;
        //                     }
        //                 }
        //             }
        //         };
        //     })();

        //     window.onload = function(){     

        //         var txt1 = document.getElementById("txt1");
        //         ui.blink(txt1, 100, {
        //             "backgroundColor" : "red"
        //         });

        //         var txt2 = document.getElementById("txt2");
        //         ui.blink(txt2, 500, {
        //             "backgroundColor" : "red"
        //         });

        //         var blink = document.getElementById("blink");
        //         ui.blink(blink, 500, {
        //             "backgroundColor" : "red"
        //         });

                
        //     };
        </script>