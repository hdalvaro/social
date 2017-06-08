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
                <p>Após executar este procedimento, o único jeito de recuperar os dados será importando a planilha novamente. Portanto selecione com <strong>ATENÇÃO</strong> a planilha a ser estornada.</p>
            </div>
        </div>
    </div>
    <div class="row form-group">       
        <div class="col-md-6 col-xs-12 col-lg-6 col-sm-12">
            <label for="arquivo">Planilha</label>
            <select id="arquivo" name ="arquivo" class="form-control selectpicker span10" data-live-search="true" >
                <option>Selecione</option>  
                <?php foreach ($planilha as $row) : ?>
                    <option value ="<?php echo $row->planilha_origem; ?>"><?php echo $row->planilha_origem; ?></option>        
                <?php endforeach; ?>
            </select>                    
        </div>
    </div>    
    <div class="row form-group">
        <div class="col-md-5 col-xs-12">    
            <button class="btn btn-warning" name="estornar" id="estornar" type="submit" value="1">Estornar Arquivo<i class="fa fa-undo fa-fw"></i></button>
        </div>
    </div>
</form>