<form id="formReports" method="post" target="_blank">
    <div class="row form-group">
        <div class="col-md-4">
            <label for="modelo">Modelo Relatório</label>
            <select class="form-control" name="modelo" id="modelo">
                <option value="1">Bolsa Família</option>
                <option value="2">Benefício da Prestação Continuada</option>        
            </select>
        </div>
        <div class="col-md-3">
            <label for="cadastro_unico">Cadastro Único</label>
            <select class="form-control" name="cadastro_unico" id="cadastro_unico">
                <option selected value="0">Ambos</option>
                <option value="1">Somente c/ CadÚnico</option>        
                <option value="2">Somente s/ CadÚnico</option>        
            </select>
        </div>
        <div class="col-md-3">
            <label for="sexo">Sexo</label>
            <select class="form-control" name="sexo" id="sexo">
                <option selected value="0">Ambos</option>
                <option value="1">Masculino</option>        
                <option value="2">Feminino</option>        
            </select>
        </div>
        <div class="col-md-2">
            <label for="moradia">Moradia Própria</label>
            <select class="form-control" name="moradia" id="moradia">
                <option selected value="">Ambos</option>
                <option value="0">Não</option>        
                <option value="1">Sim</option>        
            </select>
        </div>        
    </div>
    <div class="row form-group">
        <div class="col-md-3">
            <label for="agua_encanada">Água Encanada</label>
            <select class="form-control" name="agua_encanada" id="agua_encanada">
                <option selected value="">Ambos</option>
                <option value="0">Não</option>        
                <option value="1">Sim</option>        
            </select>
        </div>
        <div class="col-md-3">
            <label for="luz_eletrica">Luz Elétrica</label>
            <select class="form-control" name="luz_eletrica" id="luz_eletrica">
                <option selected value="">Ambos</option>
                <option value="0">Não</option>        
                <option value="1">Sim</option>        
            </select>
        </div>
        <div class="col-md-3">
            <label for="area_irregular">Área Irregular</label>
            <select class="form-control" name="area_irregular" id="area_irregular">
                <option selected value="">Ambos</option>
                <option value="0">Não</option>        
                <option value="1">Sim</option>        
            </select>
        </div>          
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label for="tipo">Tipo de Benefício</label>
            <select class="form-control" name="tipo" id="tipo">
                <option selected value="0">Selecione</option>
                <?php 
                    foreach($beneficios as $row):
                        echo "<option value='$row->idbeneficio'>$row->descricao</option>";
                    endforeach;
                ?>
            </select>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-4">
            <label for="dataInicio">Concedido a partir de </label>
            <input type="date" class="form-control" name="dataInicio">
        </div>
        <div class="col-md-4">
            <label for="dataInicio">Concedido até </label>
            <input type="date" class="form-control" name="dataFim">
        </div>
    </div>  
    <button class="btn btn-success" value="1" name="btnGerar" id="btnGerar">
        <i class="material-icons">picture_as_pdf</i> Gerar Relatório
    </button>
</form>