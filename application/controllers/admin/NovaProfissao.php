<?php

class NovaProfissao extends CI_Controller {

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
            redirect(base_url("admin/profissao"));
        }
        if (!$this->ValidaFormulario()) {
            $data['pagina'] = "admin/novaprofissao";
            $this->load->view("admin/principal", $data);
        } else {
            $valores = array(
                'descricao' => strtoupper($this->input->post('descricao', TRUE)),
            );
            $this->crud->Inserir("profissao", $valores);
            $this->session->set_flashdata('msg_succeso', 'Profissao inserida com sucesso!');
            redirect(base_url() . "admin/profissao");
        }
    }

    public function Atualizar() {
        if ($this->input->post('cancelar', TRUE) != "") {
            redirect(base_url("admin/profissao"));
        }
        $id = $this->input->post('id', TRUE);
        if (!$id) {
            $id = $this->uri->segment(4);
        }
        if (!$this->ValidaFormulario()) {
            $limite = 1;
            $data['pagina'] = "admin/novaprofissao";
            $data["profissao"] = $this->crud->Selecionar("profissao", array('idprofissao' => $id), "", "", $limite);
            $this->load->view("admin/principal", $data);
        } else {
            $valores = array(
                'descricao' => strtoupper($this->input->post('descricao', TRUE)),
            );
            $this->crud->Atualizar("profissao", $valores, $id, 'idprofissao');
            $this->session->set_flashdata('msg_succeso', 'Profissao atualizado com sucesso!');
            redirect(base_url() . "admin/profissao");
        }
    }

    public function Deletar($id) {
        redirect(base_url() . "admin/profissao");
    }

}
