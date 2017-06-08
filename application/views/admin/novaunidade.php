<div id="container">
    <div class="tab-pane active in" id="home">        
        <form id="formLogradouro" name="novounidade" method ="post">
            <?php
            if (isset($unidade)) { //Se for Atualização carrega os valores
                foreach ($unidade as $row) {
                    $id = $row->idunidade;
                    $descricao = $row->descricao;
                    $sigla = $row->sigla;
                }
            }
            ?>        
            <h3 class="">Cadastro de Unidades de Atendimento</h3>
            <div class="row form-group">                        
                <input readonly name="id" id="id" type="hidden" value="<?php echo (isset($id) ? $id : set_value('id')) ?>" class="form-control">
                <div class="col-md-12 col-xs-12 col-lg-8 col-sm-12"> 
                    <label for="descricao">Unidade</label>
                    <input autofocus="" autocomplete="off" name="descricao" id="descricao" type="text" value="<?php echo (isset($descricao) ? $descricao : set_value('descricao')) ?>" class="form-control ">                
                    <?php
                    if (trim(form_error('descricao')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('descricao') . "</div>";
                    }
                    ?>
                </div>                       
            </div>   
            <div class="row form-group">   
                <div class="col-md-12 col-xs-12 col-lg-4 col-sm-12"> 
                    <label for="sigla">Sigla</label>
                    <input autofocus="" autocomplete="off" name="sigla" id="sigla" type="text" value="<?php echo (isset($sigla) ? $sigla : set_value('sigla')) ?>" class="form-control ">                
                    <?php
                    if (trim(form_error('sigla')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('sigla') . "</div>";
                    }
                    ?>
                </div>  
            </div>
            <button type="submit" class="btn btn-primary" id="salvar" name="salvar" value="salvar">
                <i class="fa fa-save fa-fw"></i> Salvar
            </button>
            <button type="submit" id="cancelar" name="cancelar" value="cancelar" class="btn btn-danger">
                <i class="fa fa-close fa-fw"></i> Cancelar
            </button>
        </form>
    </div>          
</div>         