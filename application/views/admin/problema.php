<?php
if ($this->session->flashdata('msg_succeso') != '') {
    echo "<div class='alert alert-success'>";
    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo $this->session->flashdata('msg_succeso') . "</div>";
} else if ($this->session->flashdata('msg_delete') != '') {
    echo "<div class='alert alert-danger'>";
    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo $this->session->flashdata('msg_delete') . "</div>";
} else if ($this->session->flashdata('msg_warning') != '') {
    echo "<div class='alert alert-warning'>";
    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo $this->session->flashdata('msg_warning') . "</div>";
}
?>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>application/views/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>application/views/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>application/views/js/tabelas.js"></script>
<form id="form_usuario" method="post">
    <div class="btn-toolbar">
        <a href="<?php echo base_url() ?>admin/NovoProblema/Inserir"<button type ="submit" class="btn btn-primary" id ="enviar"><i class="fa fa-plus-square fa-fw"></i> Novo Problema </button></a> 
    </div>
    <br/>
    <div class="well">
        <div class="table-responsive">
            <table id="tabelaProblemas" class="table table-striped" class="display" cellspacing="0" width="100%">
                <thead>       
                    <tr>
                        <th>ID</th>
                        <th>Descrição</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>           
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>