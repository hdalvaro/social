<html>
    <head>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1" name="viewport">
<!--        <link rel="shortcut icon" href="<?php echo base_url(); ?>application/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url(); ?>application/images/favicon.ico" type="image/x-icon">-->
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>SIG Social - Município de Bento Gonçalves</title>                              
        <link href="<?php echo base_url(); ?>application/estilos/material/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">                      
        <link href="<?php echo base_url(); ?>application/estilos/material/material-dashboard.css" rel="stylesheet" type="text/css" media="screen">                      
        <link href="<?php echo base_url(); ?>application/estilos/material/demo.css" rel="stylesheet" type="text/css" media="screen">                      
        <link href="<?php echo base_url(); ?>application/estilos/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="screen">                         
        <link href="<?php echo base_url(); ?>application/estilos/admin/dataTables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">                          
        <link href="<?php echo base_url(); ?>application/estilos/admin/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen">                                                  
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
        <?php
        $this->load->helper('js');
        $js = $this->data['js'] = load_js(array('jquery-3.0.0.min.js',
            'bootstrap-337/bootstrap.js', 'browse_detect.js',
            'jquery-ui/jquery-ui.min.js', 'bootstrap-select.min.js',
            'modernizr.min.js', 'jquery-validation/jquery.validate.min.js',
            'jquery-validation/messages_pt_BR.min.js', 'jquery-validation/additional-methods.min.js',
            'material.min.js', 'material-dashboard.js', 'jquery-mask.js'
        ));
        echo $js;
        $end1 = $this->uri->segment(1);
        $end2 = '/' . $this->uri->segment(2);
        $res = $end1 . $end2;
        $url = $this->uri->segment(2);
        ?>  
        <style type="text/css">
            .material-icons.md-18 { font-size: 18px; }
            .material-icons.md-24 { font-size: 24px; }
            .material-icons.md-36 { font-size: 36px; }
            .material-icons.md-48 { font-size: 48px; }
        </style>
    </head>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="">
            <div class="logo">
                <a href="http://www.ucs.br" class="simple-text">
                    SIG Social
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li <?php if ($res == 'admin/principal') echo 'class="active"' ?>>
                        <a href="<?php echo base_url(); ?>admin/principal">
                            <i class="material-icons">home</i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li <?php if ($res == 'admin/consulta') echo 'class="active"' ?>>
                        <a href="<?php echo base_url("admin/consulta"); ?>">
                            <i class="material-icons">search</i>
                            <p>Consulta de Dados</p>
                        </a>
                    </li>
                    <li <?php if ($res == 'admin/pessoa') echo 'class="active"' ?>>
                        <a href="<?php echo base_url(); ?>admin/pessoa">
                            <i class="material-icons">person</i>
                            <p>Pessoas</p>
                        </a>
                    </li>
                    <?php 
                    /* 21/05 - Somente o usuário administrador pode inserir novos usuários 
                        e importar dados.
                    */
                    if($this->session->userdata("user_profile") == 3): ?>
                        <li <?php if ($res == 'admin/usuario') echo 'class="active"' ?>>
                            <a href="<?php echo base_url(); ?>admin/usuario">
                                <i class="material-icons">account_circle</i>
                                <p>Usuários</p>
                            </a>
                        </li>
                        <li <?php if ($res == 'admin/importar') echo 'class="active"' ?>>
                            <a class="hidden-xs" href="<?php echo base_url(); ?>admin/importar">
                                <i class="material-icons">file_upload</i>
                                <p>Upload de Dados</p>
                            </a>
                        </li>
                    <?php endif;?>
                    <li <?php if ($res == 'admin/relatorio') echo 'class="active"' ?>>
                        <a href="<?php echo base_url(); ?>admin/relatorio">
                            <i class="material-icons">library_books</i>
                            <p>Relatórios</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Assistência Social</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a title="Sair do Aplicativo" href="<?php echo base_url("admin/principal/sessionDestroy")?>">
                                    <i class="material-icons">exit_to_app</i>
                                    <p class="hidden-lg hidden-md">Sair</p>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Busca Rápida">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i><div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <?php $this->load->view($pagina); ?>
                </div>
            </div>
            <footer>
                <center>
                    <p>
                        <i class="material-icons">copyright</i> 
                        Dev by Alvaro Cunico - 2017
                    </p>
                </center>
            </footer>
        </div>
    </div>
</html>