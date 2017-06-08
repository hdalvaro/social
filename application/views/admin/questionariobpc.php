<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">
        <a href="#tabPrincipal" aria-controls="tabPrincipal" role="tab" data-toggle="tab">Dados Principais</a>
    </li>
    <li role="presentation">
        <a href="#tabBpcSaude" aria-controls="tabBpcSaude" role="tab" data-toggle="tab">Dados BPC Saúde</a>
    </li>
    <li role="presentation">
        <a href="#tabBpcTrabalho" aria-controls="tabBpcTrabalho" role="tab" data-toggle="tab">Dados BPC Trabalho</a>
    </li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
    <?php // INICIO ABA DADOS PRINCIPAIS ?>
    <div role="tabpanel" class="tab-pane active" id="tabPrincipal">
        <input type="hidden" id="id_questionario">
        <form name="formDadosPrincipais" id="formDadosPrincipais" method="post">
            <div class="row form-group">
                <div class="col-md-4 col-lg-3 col-xs-12 col-sm-12">
                    <label for="beneficiario_outro_municipio">Beneficiário em outro Município?</label>
                    <select id="beneficiario_outro_municipio" name="beneficiario_outro_municipio" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-3 col-xs-12 col-sm-12">
                    <label for="data_avaliacao">Data Avaliação</label>
                    <input type="date" name="data_avaliacao" id="data_avaliacao" class="form-control">
                </div>
                <div class="col-md-4 col-lg-3 col-xs-12 col-sm-12">
                    <label for="data_atualizacao">Data Atualização</label>
                    <input type="date" name="data_atualizacao" id="data_atualizacao" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <label for="id_pessoa">Pessoa</label>
                    <select id="id_pessoa" name="id_pessoa" class="form-control">
                        <option selected="" value="0">Selecione a Pessoa</option>
                        <?php
                        $options = "";
                        foreach ($pessoa as $row) {
                            $options .= "<option value ='" . $row->idpessoa . "'>" . $row->nome . "</option>";
                        }
                        echo $options;
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <label for="integracao_familiar_usuario">Integração Familiar do Beneficiário</label>
                    <textarea class="form-control" name="integracao_familiar_usuario" id="integracao_familiar_usuario"></textarea>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <label for="integracao_social_usuario">Integração Social do Beneficiário</label>
                        <textarea class="form-control" name="integracao_social_usuario" id="integracao_social_usuario"></textarea>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="usuario_com_dependencia">Usuário com Dependência?</label>
                            <select id="usuario_com_dependencia" name="usuario_com_dependencia" class="form-control">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="situacao_dependencia">Descreva a Dependência</label>
                            <input type="text" name="situacao_dependencia" id="situacao_dependencia" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="id_principal_cuidador">Principal Cuidador</label>
                            <select id="id_principal_cuidador" name="id_principal_cuidador" class="form-control">
                                <option selected="" value="0">Selecione</option>
                                <?php
                                $options = "";
                                foreach ($tipoCuidador as $row) {
                                    $options .= "<option value ='" . $row->idtipo_cuidador . "'>" . $row->descricao . "</option>";
                                }
                                echo $options;
                                ?>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="situacao_cuidado">Situação do cuidado</label>
                            <input type="text" name="situacao_cuidado" id="situacao_cuidado" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="servico_paefi">Serviço PAEFI?</label>
                            <select id="servico_paefi" name="servico_paefi" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="servico_mse">Serviço MSE?</label>
                            <select id="servico_mse" name="servico_mse" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                            <label for="servico_abordagem_social">Serviço Abordagem Social?</label>
                            <select id="servico_abordagem_social" name="servico_abordagem_social" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="servico_pcd">Serviço PCD?</label>
                            <select id="servico_pcd" name="servico_pcd" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="id_instituicao_pcd">Informe a Instituição PCD</label>
                            <select id="id_instituicao_pcd" name="id_instituicao_pcd" class="form-control">
                                <option value="">Selecione</option>
                                <?php
                                $options = "";
                                foreach ($instituicao as $row) {
                                    $options .= "<option value ='" . $row->idinstituicao . "'>" . $row->descricao . "</option>";
                                }
                                echo $options;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="projeto_asses_defesa">Projeto Assess. Defesa?</label>
                            <select id="projeto_asses_defesa" name="projeto_asses_defesa" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="id_instituicao_defesa">Informe a Instituição Defesa</label>
                            <select id="id_instituicao_defesa" name="id_instituicao_defesa" class="form-control">
                                <option value="">Selecione</option>
                                <?php
                                $options = "";
                                foreach ($instituicao as $row) {
                                    $options .= "<option value ='" . $row->idinstituicao . "'>" . $row->descricao . "</option>";
                                }
                                echo $options;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="projeto_mercad_trab">Projeto Mercado de Trabalho?</label>
                            <select id="projeto_mercad_trab" name="projeto_mercad_trab" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="id_instituicao_merc_trab">Informe a Instituição do Projeto</label>
                            <select id="id_instituicao_merc_trab" name="id_instituicao_merc_trab" class="form-control">
                                <option value="">Selecione</option>
                                <?php
                                $options = "";
                                foreach ($instituicao as $row) {
                                    $options .= "<option value ='" . $row->idinstituicao . "'>" . $row->descricao . "</option>";
                                }
                                echo $options;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="scfv">SCFV</label>
                            <select id="scfv" name="scfv" class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="id_instituicao_scfv">Informe a Instituição do SCFV</label>
                            <select id="id_instituicao_scfv" name="id_instituicao_scfv" class="form-control">
                                <option value="">Selecione</option>
                                <?php
                                $options = "";
                                foreach ($instituicao as $row) {
                                    $options .= "<option value ='" . $row->idinstituicao . "'>" . $row->descricao . "</option>";
                                }
                                echo $options;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                            <label for="instituicao_municipal">Inserido em Instituição Municipal?</label>
                            <select id="instituicao_municipal " name="instituicao_municipal " class="form-control">
                                <option value="">Selecione</option>
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12">
                            <label for="id_instituicao_municipal">Informe a Instituição do Projeto</label>
                            <select id="id_instituicao_municipal" name="id_instituicao_municipal" class="form-control">
                                <option value="">Selecione</option>
                                <?php
                                $options = "";
                                foreach ($instituicao as $row) {
                                    $options .= "<option value ='" . $row->idinstituicao . "'>" . $row->descricao . "</option>";
                                }
                                echo $options;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                            <label for="instituicao_fora_municipio">Instituição fora do Município</label>
                            <input type="text" name="instituicao_fora_municipio" id="instituicao_fora_municipio" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-offset-10 col-md-2">
                            <button type="button" class="btn btn-primary" id="btnSalvarEtapa1" name="btnSalvarEtapa1">Salvar Etapa 1</button>
                        </div>
                    </div>                    
                </div>
            </div>
        </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="tabBpcSaude">
        <form name="formBpcSaude" id="formBpcSaude" method="post">
            <div class="row form-group">
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <label for="esf">ESF</label>
                    <select id="esf" name="esf" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <label for="ubs">UBS</label>
                    <select id="ubs" name="ubs" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <label for="capsi">CAPS I</label>
                    <select id="capsi" name="capsi" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <label for="capsii">CAPS II</label>
                    <select id="capsii" name="capsii" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                    <label for="capsad">CAPS AD</label>
                    <select id="capsad" name="capsad" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                    <label for="sae">SAE</label>
                    <select id="sae" name="sae" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <label for="melhor_em_casa">Melhor em Casa</label>
                    <select id="melhor_em_casa" name="melhor_em_casa" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                    <label for="crmi">CRMI</label>
                    <select id="crmi" name="crmi" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                    <label for="pim">PIM</label>
                    <select id="pim" name="pim" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-offset-10 col-md-2">
                    <button type="button" class="btn btn-primary" id="btnSalvarEtapa2">Salvar Etapa 2</button>
                </div>
            </div>
        </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="tabBpcTrabalho">
        <form id="formBpcTrab" name="formBpcTrab" method="post">
            <div class="row form-group">
                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                    <label for="bpc_trabalho_public">Faz parte do Público?</label>
                    <select id="bpc_trabalho_public" name="bpc_trabalho_public" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <label for="poss_participar_curso">Possibilidade de Participar de Cursos?</label>
                    <select id="poss_participar_curso" name="poss_participar_curso" class="form-control">
                        <option value="">Selecione</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12">
                    <label for="id_profissao">Profissao</label>
                    <select id="id_profissao" name="id_profissao" class="form-control">
                        <option selected="" value="0">Selecione a Profissão</option>
                        <?php
                        $options = "";
                        foreach ($profissao as $row) {
                            $options .= "<option value ='" . $row->idprofissao . "'>" . $row->descricao . "</option>";
                        }
                        echo $options;
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-offset-10 col-md-2">
                    <button type="button" class="btn btn-primary" id="btnSalvarEtapa3">Salvar Etapa 3</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $("#btnSalvarEtapa1").on("click", function () {
        $.post("QuestionarioBpc/insertEtapa1", {
            id_pessoa: $("#id_pessoa").val(),
            data_avaliacao: $("#data_avaliacao").val(),
            data_atualizacao: $("#data_atualizacao").val(),
            beneficiario_outro_municipio: $("#beneficiario_outro_municipio").val(),
            id_razao_pcd: $("#id_razao_pcd").val(),
            integracao_familiar_usuario: $("#integracao_familiar_usuario").val(),
            integracao_social_usuario: $("#integracao_social_usuario").val(),
            passe_livre_tipo: $("#passe_livre_tipo").val(),
            usuario_com_dependencia: $("#usuario_com_dependencia").val(),
            situacao_dependencia: $("#situacao_dependencia").val(),
            id_principal_cuidador: $("#id_principal_cuidador").val(),
            situacao_cuidado: $("#situacao_cuidado").val(),
            servico_paefi: $("#servico_paefi").val(),
            servico_mse: $("#servico_mse").val(),
            servico_abordagem_social: $("#servico_abordagem_social").val(),
            servico_pcd: $("#servico_pcd").val(),
            id_instituicao_pcd: $("#id_instituicao_pcd").val(),
            projeto_asses_defesa: $("#projeto_asses_defesa").val(),
            id_instituicao_defesa: $("#id_instituicao_defesa").val(),
            projeto_mercad_trab: $("#projeto_mercad_trab").val(),
            id_instituicao_merc_trab: $("#id_instituicao_merc_trab").val(),
            scfv: $("#scfv").val(),
            id_instituicao_scfv: $("#id_instituicao_scfv").val(),
            instituicao_municipal: $("#instituicao_municipal").val(),
            id_instituicao_municipal: $("#id_instituicao_municipal").val(),
            instituicao_fora_municipio: $("#instituicao_fora_municipio").val()
        }, function (val) {
            $("#id_questionario").val(val);
            alert("Etapa 1 inserida com sucesso!");
        });
    });

    $("#btnSalvarEtapa2").on("click", function () {
        $.post("QuestionarioBpc/insertEtapa2", {
            id_questionario: $("#id_questionario").val(),
            esf: $("#esf").val(),
            ubs: $("#ubs").val(),
            capsi: $("#capsi").val(),
            capsii: $("#capsii").val(),
            capsad: $("#capsad").val(),
            sae: $("#sae").val(),
            melhor_em_casa: $("#melhor_em_casa").val(),
            crmi: $("#crmi").val(),
            pim: $("#pim").val()
        }, function (html) {
            alert("Etapa 2 inserida com sucesso!");
        });
    });

    $("#btnSalvarEtapa3").on("click", function () {
        $.post("QuestionarioBpc/insertEtapa3", {
            id_questionario: $("#id_questionario").val(),
            bpc_trabalho_public: $("#bpc_trabalho_public").val(),
            ubs: $("#ubs").val(),
            id_profissao: $("#id_profissao").val(),
            poss_participar_curso: $("#poss_participar_curso").val(),

        }, function (html) {
            alert("Etapa 3 inserida com sucesso!");
        });
    });
</script>