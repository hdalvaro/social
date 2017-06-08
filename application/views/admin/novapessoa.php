<div id="container">
    <div class="tab-pane active in" id="home">        
        <form id="formPessoa" name="novaPessoa" method ="post">
            <?php
            if (isset($pessoa)) { //Se for Atualização carrega os valores
                foreach ($pessoa as $row) {
                    $id = $row->idpessoa;
                    $nome = $row->nome;
                    $cpf = $row->cpf;
                    $nis = $row->nis;
                    $sexo = $row->sexo;
                    $data_nascimento = $row->data_nascimento;
                    $data_atualizacao = $row->data_atualizacao;
                    $cartao_sus = $row->cartao_sus;
                    $rg = $row->rg;
                    $id_cidade = $row->id_cidade;
                    $id_bairro = $row->id_bairro;
                    $id_logradouro = $row->id_logradouro;
                    $numero = $row->numero;
                    $renda_mensal = $row->renda_mensal;
                    $cod_familia = $row->cod_familia;
                    $bolsa_familia = $row->bolsa_familia;
                    $cadastro_unico = $row->cadastro_unico;
                    $luz_eletrica = $row->luz_eletrica;
                    $agua_encanada = $row->agua_encanada;
                    $moradia = $row->moradia;
                    $esgoto = $row->esgoto;
                    $area_irregular = $row->area_irregular;
                }
            }else{
                    $nome = '';
                    $cpf = '';
                    $nis = '';
                    $sexo = '';
                    $data_nascimento = '';
                    $data_atualizacao = '';
                    $cartao_sus = '';
                    $rg = '';
                    $id_cidade = '';
                    $id_bairro = '';
                    $id_logradouro = '';
                    $numero = '';
                    $renda_mensal = '';
                    $cod_familia = '';
                    $bolsa_familia = '';
                    $cadastro_unico = '';
                    $luz_eletrica = '';
                    $agua_encanada = '';
                    $moradia = '';
                    $esgoto = '';
                    $area_irregular = '';
            }
            ?>        
            <h3 class="">Cadastro de Pessoas</h3>
            <div class="row form-group">
                <input readonly name="id" id="id" type="hidden" value="<?php echo (isset($id) ? $id : set_value('id')) ?>" class="form-control">
                <div class="col-md-12 col-xs-12 col-lg-6 col-sm-12"> 
                    <label for="nome">Nome</label>
                    <input autofocus="" autocomplete="off" name="nome" id="nome" type="text" value="<?php echo (isset($nome) ? $nome : set_value('nome')) ?>" class="form-control ">                
                    <?php
                    if (trim(form_error('nome')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('nome') . "</div>";
                    }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-2 col-sm-12"> 
                    <label for="cpf">CPF</label>
                    <input autofocus="" autocomplete="off" name="cpf" id="cpf" type="text" value="<?php echo (isset($cpf) ? $cpf : set_value('cpf')) ?>" class="form-control cpf">
                    <?php
                    if (trim(form_error('cpf')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('cpf') . "</div>";
                    }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-2 col-sm-12"> 
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" class="form-control">
                        <option value="0">Selecione</option>
                        <option <?php echo isset($sexo) == 2 ? "selected" : ""; ?> value="2">Feminino</option>
                        <option <?php echo isset($sexo) == 1 ? "selected" : ""; ?> value="1">Masculino</option>
                    </select>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-2 col-sm-12"> 
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input autofocus="" autocomplete="off" name="data_nascimento" id="data_nascimento" type="date" value="<?php echo (isset($data_nascimento) ? $data_nascimento : set_value('data_nascimento')) ?>" class="form-control">
                    <?php
                    if (trim(form_error('data_nascimento')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('data_nascimento') . "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-xs-12 col-lg-4 col-sm-12"> 
                    <label for="nis">NIS</label>
                    <input autofocus="" autocomplete="off" name="nis" id="nis" type="text" value="<?php echo (isset($nis) ? $nis : set_value('nis')) ?>" class="form-control">
                    <?php
                    if (trim(form_error('nis')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('nis') . "</div>";
                    }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-2 col-sm-12"> 
                    <label for="cartao_sus">Cartão SUS</label>
                    <input autofocus="" autocomplete="off" name="cartao_sus" id="cartao_sus" type="text" value="<?php echo (isset($cartao_sus) ? $cartao_sus : set_value('cartao_sus')) ?>" class="form-control">
                    <?php
                    if (trim(form_error('cartao_sus')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('cartao_sus') . "</div>";
                    }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-2 col-sm-12"> 
                    <label for="rg">RG</label>
                    <input autofocus="" autocomplete="off" name="rg" id="rg" type="text" value="<?php echo (isset($rg) ? $rg : set_value('rg')) ?>" class="form-control">
                    <?php
                    if (trim(form_error('rg')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('rg') . "</div>";
                    }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-4 col-sm-12"> 
                    <label for="id_cidade">Cidade</label>
                    <select name="id_cidade" id="id_cidade" class="form-control">
                        <option>Selecione a cidade</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-xs-12 col-lg-4 col-sm-12"> 
                    <label for="id_bairro">Bairro</label>
                    <select name="id_bairro" id="id_bairro" class="form-control">
                        <option>Selecione o Bairro</option>
                        <?php
                        $options = "";
                        foreach ($bairros as $row):
                            $selected = $row->idbairro == $id_bairro ? "selected" : "";
                            $options .=  "<option $selected value='$row->idbairro'>$row->descricao</option>";
                        endforeach;
                        echo $options;
                        ?>
                    </select>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-4 col-sm-12"> 
                    <label for="id_logradouro">Logradouro</label>
                    <select name="id_logradouro" id="id_logradouro" class="form-control">
                        <option>Selecione o Logradouro</option>
                        <?php
                        
                        $options = "";
                        foreach ($logradouros as $row):
                            $selected = $row->idlogradouro == $id_logradouro ? "selected" : "";
                            $options .= "<option $selected value='$row->idlogradouro'>$row->descricao</option>";
                        endforeach;
                        echo $options;
                        
                        ?>
                    </select>
                </div>    
                <div class="col-md-12 col-xs-12 col-lg-2 col-sm-12"> 
                    <label for="numero">Número</label>
                    <input autofocus="" autocomplete="off" name="numero" id="numero" type="text" value="<?php echo (isset($numero) ? $numero : set_value('numero')) ?>" class="form-control">
                    <?php
                    if (trim(form_error('numero')) != '') {
                        echo "<div class='alert alert-danger'>";
                        echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                        echo form_error('numero') . "</div>";
                    }
                    ?>
                </div>                
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="bolsa_familia">Recebe Bolsa Família?</label>
                    <select id="bolsa_familia" name="bolsa_familia" class="form-control">
                        <option <?php echo $bolsa_familia == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $bolsa_familia == 0 ? "selected" : ""; ?>  value="0">Não</option>
                        <option <?php echo $bolsa_familia == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="cadastro_unico">Possui Cadastro Único?</label>
                    <select id="cadastro_unico" name="cadastro_unico" class="form-control">
                        <option <?php echo $cadastro_unico == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $cadastro_unico == 0 ? "selected" : ""; ?> value="0">Não</option>
                        <option <?php echo $cadastro_unico == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="luz_eletrica">Possui Luz Elétrica?</label>
                    <select id="luz_eletrica" name="luz_eletrica" class="form-control">
                        <option <?php echo $luz_eletrica == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $luz_eletrica == 0 ? "selected" : ""; ?> value="0">Não</option>
                        <option <?php echo $luz_eletrica == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="agua_encanada">Possui Água Encanada?</label>
                    <select id="agua_encanada" name="agua_encanada" class="form-control">
                        <option <?php echo $agua_encanada == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $agua_encanada == 0 ? "selected" : ""; ?> value="0">Não</option>
                        <option <?php echo $agua_encanada == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
                </div>                
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="moradia">Possui Moradia Própria?</label>
                    <select id="moradia" name="moradia" class="form-control">
                        <option <?php echo $moradia == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $moradia == 0 ? "selected" : ""; ?> value="0">Não</option>
                        <option <?php echo $moradia == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="esgoto">Possui Instalações de Esgoto?</label>
                    <select id="esgoto" name="esgoto" class="form-control">
                        <option <?php echo $esgoto == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $esgoto == 0 ? "selected" : ""; ?> value="0">Não</option>
                        <option <?php echo $esgoto == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
                </div> 
                <div class="col-md-12 col-xs-12 col-lg-3 col-sm-12"> 
                    <label for="area_irregular">Reside em área irregular?</label>
                    <select id="area_irregular" name="area_irregular" class="form-control">
                        <option <?php echo $area_irregular == "" ? "selected" : ""; ?> value="">Selecione</option>
                        <option <?php echo $area_irregular == 0 ? "selected" : ""; ?> value="0">Não</option>
                        <option <?php echo $area_irregular == 1 ? "selected" : ""; ?>  value="1">Sim</option>
                    </select>
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
<script>
    $("#cpf").mask('000.000.000-00', {reverse: true});
</script>   