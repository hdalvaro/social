<?php if ($this->session->userdata('user_profile') == 3 or $this->session->userdata('user_profile') == 2) { ?>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/escolaridade">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cadastros</p>
                        <h3 class="title">Escolaridade</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div> 
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/instituicao">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cadastros</p>
                        <h3 class="title">Instituições</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/profissao">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cadastros</p>
                        <h3 class="title">Profissões</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/unidade">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cadastros</p>
                        <h3 class="title">Unidades</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/bairro">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cadastros</p>
                        <h3 class="title">Bairros</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/logradouro">
                    <div class="card-header" data-background-color="orange">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Cadastros</p>
                        <h3 class="title">Ruas</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <a href="<?php echo base_url(); ?>admin/QuestionarioBpc">
                    <div class="card-header" data-background-color="blue">
                        <i class="material-icons">menu</i>
                    </div>
                    <div class="card-content">
                        <p class="category">Questionário</p>
                        <h3 class="title">BPC</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?php } else {
    ?>


<?php
}?>