<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>application/views/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>application/views/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>application/views/js/usuario.js"></script>

<style>
    .error{
        color: #E74C3C;
    }
</style>
<div id="container" >    
    <div class="tab-pane active in" id="home">
        <form id="formUsuario" name="novousuario" method ="post">
            <?php
            $perfil_usuario = 0;
            if (isset($user)) { //Se for Atualização carrega os valores
                foreach ($user as $result) {
                    $id = $result->idusuario;
                    $nome = $result->nome;
                    $login = $result->login;
                    $perfil_usuario = $result->perfil_usuario;
                }
            }
            ?>            
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cadastro de Usuários</h3>
                </div>
                <div class="panel-body">
                    <div class="row form-group">
                        <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12 form-group"> 
                            <label for="id">Código</label>
                            <input readonly name="id" id="id" type="text" value="<?php echo (isset($id) ? $id : set_value('id')) ?>" class="form-control">
                        </div>     
                        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 form-group"> 
                            <label for="nome">Nome</label>
                            <input autofocus="" name="nome" id="nome" type="text" value="<?php echo (isset($nome) ? $nome : set_value('nome')) ?>" class="form-control ">                
                            <?php
                            if (trim(form_error('nome')) != '') {
                                echo "<div class='alert alert-danger'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                echo form_error('nome') . "</div>";
                            }
                            ?>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                            <label for="perfil_usuario">Perfil do Usuário</label>
                            <select class="form-control" name="perfil_usuario" id="perfil_usuario">
                                <option <?php echo $perfil_usuario == 1 ? "selected" : ""; ?> value="1">Comum</option>
                                <option <?php echo $perfil_usuario == 2 ? "selected" : ""; ?> value="2">Técnico</option>
                                <option <?php echo $perfil_usuario == 3 ? "selected" : ""; ?> value="3">Administrador</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">                
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 form-group"> 
                            <label for="login">Login</label>
                            <input  name="login" id="login" type="text" value="<?php echo (isset($login) ? $login : set_value('login')) ?>" class="form-control">                
                            <?php
                            if (trim(form_error('login')) != '') {
                                echo "<div class='alert alert-danger'>";
                                echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                                echo form_error('login') . "</div>";
                            }
                            ?>      
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12 form-group"> 
                            <label for="senha">Senha</label>
                            <input name="senha" id="senha" type="password" class="form-control">                
                        </div>
                    </div>
                </div>   
            </div>   
            <button type="submit" class="btn btn-primary" id="gravar"><i class="fa fa-save fa-fw"></i> Salvar</button>
            <button type="submit" id ="cancelar" class="btn btn-danger">Cancelar</button>
        </form>
    </div>          
</div>         
<script type="text/javascript">
    $("#formUsuario").validate({
        rules: {
            'login': {
                required: true,
                minlength: 5
            },
            'nome': {
                required: true,
                minlength: 6
            }
        }
    });
</script>