<form method="post" enctype="multipart/form-data">
    <div class="row form-group">
        <div class="col-xs-12 col-md-6"> 
            <?php
            if ($this->session->flashdata('msg_succeso') != '') {
                echo "<div class='alert alert-success'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                echo $this->session->flashdata('msg_succeso') . "</div>";
            } else if ($this->session->flashdata('msg_error') != '') {
                echo "<div class='alert alert-danger'>";
                echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                echo $this->session->flashdata('msg_error') . "</div>";
            }
            ?>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-12 col-md-12"> 
            <div class="alert alert-danger">
                <p>Selecione com <strong>atenção</strong> o layout adequado a sua planilha. Em caso de dúvidas não importe o arquivo.</p>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-5 col-xs-12">    
            <label for="userfile">Selecione o Arquivo</label>
            <input type="file" name="userfile" id="userfile" size="20">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-xs-12 col-md-8"> 
            <label class="control-label" for="modelo">Layout de Importação</label>
            <div class="controls">
                <div class="col-xs-12 col-md-12">                    
                    <input checked="" class="radio-inline " type="radio" name="modelo" id="radios-0" value="0">Cadastro Único
                </div>
                <div class="col-xs-12 col-md-12">                    
                    <input class="radio-inline " type="radio" name="modelo" id="radios-0" value="1">Bolsa Família
                </div>
                <div class="col-xs-12 col-md-12">                    
                    <input class="radio-inline " type="radio" name="modelo" id="radios-0" value="2">BPC
                </div>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-5 col-xs-12">    
            <button class="btn btn-warning" name="importar" id="importar" type="submit" value="1">
                Importar
                <i class="fa fa-upload fa-fw"></i>
            </button>
        </div>
    </div>
</form>