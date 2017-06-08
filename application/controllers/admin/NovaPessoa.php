<?php

class NovaPessoa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $this->load->model("UsuarioModel");
        $this->UsuarioModel->login = $this->session->userdata('usuario');
        if($this->UsuarioModel->userProfile() == 1){
            redirect(base_url('admin/principal'));
        }     
        $this->load->model("crud", "crud");
        $this->load->model("PersonModel");
        $this->load->model("BairroModel");
        $this->load->model("LogradouroModel");
        $this->load->library('Form_validation');
    }

    public function CamposValidos() {
        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required',
            )
        );
        return $config;
    }

    public function ValidaFormulario() {
        $this->form_validation->set_rules($this->CamposValidos());
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else {
            return true;
        }
    }

    public function Inserir() {

        if ($this->input->post('cancelar', TRUE) != "") {
            redirect(base_url("admin/pessoa"));
        }
        if (!$this->ValidaFormulario()) {
            $data['pagina'] = "admin/novapessoa";
            $data['bairros'] = $this->BairroModel->all();
            $data['logradouros'] = $this->LogradouroModel->all();
            $this->load->view("admin/principal", $data);
        } else {
            $this->PersonModel->nome = strtoupper($this->input->post('nome', TRUE));
            $this->PersonModel->cpf = $this->input->post('cpf', TRUE);
            $this->PersonModel->nis = $this->input->post('nis', TRUE);
            $this->PersonModel->cartao_sus = $this->input->post('cartao_sus', TRUE);
            $this->PersonModel->rg = $this->input->post('rg', TRUE);
            $this->PersonModel->id_bairro = $this->input->post('id_bairro', TRUE);
            $this->PersonModel->id_logradouro = $this->input->post('id_logradouro', TRUE);
            $this->PersonModel->data_nascimento = $this->input->post('data_nascimento', TRUE);
            $this->PersonModel->sexo = $this->input->post('sexo', TRUE);
            $this->PersonModel->bolsa_familia = $this->input->post('bolsa_familia', TRUE);
            $this->PersonModel->cadastro_unico = $this->input->post('cadastro_unico', TRUE);
            $this->PersonModel->luz_eletrica = $this->input->post('luz_eletrica', TRUE);
            $this->PersonModel->agua_encanada = $this->input->post('agua_encada', TRUE);
            $this->PersonModel->moradia = $this->input->post('moradia', TRUE);
            $this->PersonModel->esgoto = $this->input->post('esgoto', TRUE);
            $this->PersonModel->area_irregular = $this->input->post('area_irregular', TRUE);
            $this->PersonModel->data_atualizacao = date("Y-m-d");
            $this->PersonModel->insert();
            $this->session->set_flashdata('msg_succeso', 'Pessoa inserida com sucesso!');
            redirect(base_url() . "admin/pessoa");
        }
    }

    public function Atualizar() {
        //$this->output->enable_profiler(TRUE);
        if ($this->input->post('cancelar', TRUE) != "") {
            redirect(base_url("admin/pessoa"));
        }
        $id = $this->input->post('id', TRUE);
        if (!$id) {
            $id = $this->uri->segment(4);
        }
        if (!$this->ValidaFormulario()) {
            $limite = 1;
            $data['pagina'] = "admin/novapessoa";
            $data["pessoa"] = $this->crud->Selecionar("pessoa", array('idpessoa' => $id), "", "", $limite);
            $data['bairros'] = $this->BairroModel->all();
            $data['logradouros'] = $this->LogradouroModel->all();
            $this->load->view("admin/principal", $data);
        } else {
            $this->PersonModel->idpessoa = $this->input->post('id', TRUE);
            $this->PersonModel->nome = strtoupper($this->input->post('nome', TRUE));
            $this->PersonModel->cpf = $this->input->post('cpf', TRUE);
            $this->PersonModel->nis = $this->input->post('nis', TRUE);
            $this->PersonModel->cartao_sus = $this->input->post('cartao_sus', TRUE);
            $this->PersonModel->rg = $this->input->post('rg', TRUE);
            $this->PersonModel->id_bairro = $this->input->post('id_bairro', TRUE);
            $this->PersonModel->id_logradouro = $this->input->post('id_logradouro', TRUE);
            $this->PersonModel->data_nascimento = $this->input->post('data_nascimento', TRUE);
            $this->PersonModel->sexo = $this->input->post('sexo', TRUE);
            $this->PersonModel->bolsa_familia = $this->input->post('bolsa_familia', TRUE);
            $this->PersonModel->cadastro_unico = $this->input->post('cadastro_unico', TRUE);
            $this->PersonModel->luz_eletrica = $this->input->post('luz_eletrica', TRUE);
            $this->PersonModel->agua_encanada = $this->input->post('agua_encada', TRUE);
            $this->PersonModel->moradia = $this->input->post('moradia', TRUE);
            $this->PersonModel->esgoto = $this->input->post('esgoto', TRUE);
            $this->PersonModel->area_irregular = $this->input->post('area_irregular', TRUE);
            $this->PersonModel->data_atualizacao = date("Y-m-d");
            $this->PersonModel->update();
            $this->session->set_flashdata('msg_succeso', 'Pessoa atualizada com sucesso!');
            redirect(base_url() . "admin/pessoa");
        }
    }

    public function Deletar($id) {
        redirect(base_url() . "admin/pessoa");
    }

}
