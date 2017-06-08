<?php

class NovaInstituicao extends CI_Controller {

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
        $this->load->library('Form_validation');
    }

    public function CamposValidos() {
        $config = array(
            array(
                'field' => 'descricao',
                'label' => 'Descrição',
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
            redirect(base_url("admin/instituicao"));
        }
        if (!$this->ValidaFormulario()) {
            $data['pagina'] = "admin/novainstituicao";
            $this->load->view("admin/principal", $data);
        } else {
            $valores = array(
                'descricao' => strtoupper($this->input->post('descricao', TRUE)),
            );
            $this->crud->Inserir("instituicao", $valores);
            $this->session->set_flashdata('msg_succeso', 'Instituicao inserida com sucesso!');
            redirect(base_url() . "admin/instituicao");
        }
    }

    public function Atualizar() {
        if ($this->input->post('cancelar', TRUE) != "") {
            redirect(base_url("admin/instituicao"));
        }
        $id = $this->input->post('id', TRUE);
        if (!$id) {
            $id = $this->uri->segment(4);
        }
        if (!$this->ValidaFormulario()) {
            $limite = 1;
            $data['pagina'] = "admin/novainstituicao";
            $data["instituicao"] = $this->crud->Selecionar("instituicao", array('idinstituicao' => $id), "", "", $limite);
            $this->load->view("admin/principal", $data);
        } else {
            $valores = array(
                'descricao' => strtoupper($this->input->post('descricao', TRUE)),
            );
            $this->crud->Atualizar("instituicao", $valores, $id, 'idinstituicao');
            $this->session->set_flashdata('msg_succeso', 'Instituicao atualizado com sucesso!');
            redirect(base_url() . "admin/instituicao");
        }
    }

    public function Deletar($id) {
        redirect(base_url() . "admin/instituicao");
    }

}
