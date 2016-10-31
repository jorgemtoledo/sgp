<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <title>Sistema SGP - CONTATO CONTACT CENTER</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap-3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap-3.1.1/css/metisMenu.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap-3.1.1/css/sb-admin-2.css" rel="stylesheet">


</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="form-signin" method="post" action="<?php echo base_url(); ?>dashboard/logar">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="password" type="password" value="">
                                </div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Logar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>




