<html>
    <head> 
        <title>SIG Social</title>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1">
<!--        <link rel="shortcut icon" href="<?php echo base_url(); ?>application/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url(); ?>application/images/favicon.ico" type="image/x-icon">-->
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link href="<?php echo base_url(); ?>application/estilos/admin/bootstrap-337/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">                          
        <link href="<?php echo base_url(); ?>application/estilos/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">                         
        <link href="<?php echo base_url(); ?>application/estilos/admin/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">                          
        <link href="<?php echo base_url(); ?>application/estilos/admin/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen">                                                  
        <?php
        $this->load->helper('js');
        $js = $this->data['js'] = load_js(array('jquery.js',
            'jquery-ui/jquery-ui.min.js', 'bootstrap-337/bootstrap.min.js'));
        echo $js;
        ?>
        <style>
            @media only screen and (max-width: 801px) {
                /* For mobile phones: */
                [class*="col-"] {
                    width: 100%;
                }
            }
            @media only screen and (min-width: 801px) and (max-width: 1600px){
                /* For Desktop/Tablets/Ipad: */
                .areaForm {
                    width: 450px;
                    height: 400px;
                    margin-left: -100px; /* metade da largura */
                    margin-top: -100px; /* metade da altura */
                    position: absolute;
                    top: 40%;
                    left: 35%;
                }
            }
            @media only screen and (min-width: 1600px) {
                /* For Desktop/Tablets/Ipad: */
                .areaForm {
                    width: 450px;
                    height: 600px;
                    margin-left: -100px; /* metade da largura */
                    margin-top: -100px; /* metade da altura */
                    position: absolute;
                    top: 40%;
                    left: 43%;
                }
            }
        </style>
    </head>
    <body>         
        <div class="areaForm">
            <form autocomplete="off" class="form-horizontal" name="login" method="post">       
                <div class="row form-group">
                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <span>Acesso ao SIG Social</span>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row form-group">
                                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                        <label for="login">Usuário</label>
                                        <input autofocus="" placeholder="Digite o seu usuário" type="text" id="login" name="login" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                        <label for="password">Senha</label>
                                        <input placeholder="Digite sua senha" name="password" id="password" type="password" value="" class="form-control">                
                                    </div>
                                </div>                
                            </div>
                            <div class="panel-footer">
                                <div class="form-group">                            
                                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                        <input type="submit" name="btnProximo" class="btn btn-block btn btn-success" value="Entrar">
                                    </div>    
                                </div>
                                <div class="form-group">                        
                                    <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                        <center><p><i class="fa fa-copyright fa-fw"></i> Dev by Alvaro Cunico - 2017</p></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>