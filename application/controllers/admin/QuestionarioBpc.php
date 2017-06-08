<?php

class QuestionarioBpc extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $this->load->model("UsuarioModel");
        $this->UsuarioModel->login = $this->session->userdata('usuario');
        if ($this->UsuarioModel->userProfile() == 1) {
            redirect(base_url('admin/principal'));
        }
        $this->load->model("QuestionarioBpcModel");
        $this->load->library('Form_validation');
    }

    public function Index() {
        $this->load->model("PersonModel");
        $this->load->model("TipoCuidadorModel");
        $this->load->model("InstituicaoModel");
        $this->load->model("ProfissaoModel");
        $data['pagina'] = "admin/questionariobpc";
        $data['pessoa'] = $this->PersonModel->all();
        $data['tipoCuidador'] = $this->TipoCuidadorModel->all();
        $data['instituicao'] = $this->InstituicaoModel->all();
        $data['profissao'] = $this->ProfissaoModel->all();
        $this->load->view("admin/principal", $data);
    }

    public function insertEtapa1() {
        $this->QuestionarioBpcModel->id_pessoa = $this->input->post("id_pessoa", TRUE);
        $this->QuestionarioBpcModel->data_avaliacao = $this->input->post("data_avaliacao", TRUE);
        $this->QuestionarioBpcModel->data_atualizacao = $this->input->post("data_atualizacao", TRUE);
        $this->QuestionarioBpcModel->beneficiario_outro_municipio = $this->input->post("beneficiario_outro_municipio", TRUE);
        $this->QuestionarioBpcModel->id_razao_pcd = $this->input->post("id_razao_pcd", TRUE);
        $this->QuestionarioBpcModel->integracao_familiar_usuario = $this->input->post("integracao_familiar_usuario", TRUE);
        $this->QuestionarioBpcModel->integracao_social_usuario = $this->input->post("integracao_social_usuario", TRUE);
        $this->QuestionarioBpcModel->passe_livre_tipo = $this->input->post("passe_livre_tipo", TRUE);
        $this->QuestionarioBpcModel->usuario_com_dependencia = $this->input->post("usuario_com_dependencia", TRUE);
        $this->QuestionarioBpcModel->situacao_dependencia = $this->input->post("situacao_dependencia", TRUE);
        $this->QuestionarioBpcModel->id_principal_cuidador = $this->input->post("id_principal_cuidador", TRUE);
        $this->QuestionarioBpcModel->situacao_cuidado = $this->input->post("situacao_cuidado", TRUE);
        $this->QuestionarioBpcModel->servico_paefi = $this->input->post("servico_paefi", TRUE);
        $this->QuestionarioBpcModel->servico_mse = $this->input->post("servico_mse", TRUE);
        $this->QuestionarioBpcModel->servico_abordagem_social = $this->input->post("servico_abordagem_social", TRUE);
        $this->QuestionarioBpcModel->servico_pcd = $this->input->post("servico_pcd", TRUE);
        $this->QuestionarioBpcModel->id_instituicao_pcd = $this->input->post("id_instituicao_pcd", TRUE);
        $this->QuestionarioBpcModel->projeto_asses_defesa = $this->input->post("projeto_asses_defesa", TRUE);
        $this->QuestionarioBpcModel->id_instituicao_defesa = $this->input->post("id_instituicao_defesa", TRUE);
        $this->QuestionarioBpcModel->projeto_mercad_trab = $this->input->post("projeto_mercad_trab", TRUE);
        $this->QuestionarioBpcModel->id_instituicao_merc_trab = $this->input->post("id_instituicao_merc_trab", TRUE);
        $this->QuestionarioBpcModel->scfv = $this->input->post("scfv", TRUE);
        $this->QuestionarioBpcModel->id_instituicao_scfv = $this->input->post("id_instituicao_scfv", TRUE);
        $this->QuestionarioBpcModel->instituicao_municipal = $this->input->post("instituicao_municipal", TRUE);
        $this->QuestionarioBpcModel->id_instituicao_municipal = $this->input->post("id_instituicao_municipal", TRUE);
        $this->QuestionarioBpcModel->instituicao_fora_municipio = $this->input->post("instituicao_fora_municipio", TRUE);
        $this->QuestionarioBpcModel->insert();
        exit($this->db->insert_id());
    }

    public function insertEtapa2() {
        $this->load->model("QuestionarioBpcSaudeModel", "BpcSaude");
        $this->BpcSaude->id_questionario = $this->input->post("id_questionario", TRUE);
        $this->BpcSaude->esf = $this->input->post("esf", TRUE);
        $this->BpcSaude->ubs = $this->input->post("ubs", TRUE);
        $this->BpcSaude->capsi = $this->input->post("capsi", TRUE);
        $this->BpcSaude->capsii = $this->input->post("capsii", TRUE);
        $this->BpcSaude->capsad = $this->input->post("capsad", TRUE);
        $this->BpcSaude->sae = $this->input->post("sae", TRUE);
        $this->BpcSaude->melhor_em_casa = $this->input->post("melhor_em_casa", TRUE);
        $this->BpcSaude->crmi = $this->input->post("crmi", TRUE);
        $this->BpcSaude->pim = $this->input->post("pim", TRUE);
        $this->BpcSaude->insert();
        exit($this->db->insert_id());
    }

    public function insertEtapa3() {
        $this->load->model("QuestionarioBpcTrabModel", "BpcTrab");
        $this->BpcTrab->id_questionario = $this->input->post("id_questionario", TRUE);
        $this->BpcTrab->bpc_trabalho_public = $this->input->post("bpc_trabalho_public", TRUE);
        $this->BpcTrab->id_profissao = $this->input->post("id_profissao", TRUE);
        $this->BpcTrab->poss_participar_curso = $this->input->post("poss_participar_curso", TRUE);
        $this->BpcTrab->insert();
        exit($this->db->insert_id());
    }

}
