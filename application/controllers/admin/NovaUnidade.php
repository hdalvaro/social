<?php

class NovaUnidade extends CI_Controller {

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
            redirect(base_url("admin/unidade"));
        }
        if (!$this->ValidaFormulario()) {
            $data['pagina'] = "admin/novaunidade";
            $this->load->view("admin/principal", $data);
        } else {
            $valores = array(
                'descricao' => strtoupper($this->input->post('descricao', TRUE)),
            );
            $this->crud->Inserir("unidade", $valores);
            $this->session->set_flashdata('msg_succeso', 'Unidade inserida com sucesso!');
            redirect(base_url() . "admin/unidade");
        }
    }

    public function Atualizar() {
        if ($this->input->post('cancelar', TRUE) != "") {
            redirect(base_url("admin/unidade"));
        }
        $id = $this->input->post('id', TRUE);
        if (!$id) {
            $id = $this->uri->segment(4);
        }
        if (!$this->ValidaFormulario()) {
            $limite = 1;
            $data['pagina'] = "admin/novaunidade";
            $data["unidade"] = $this->crud->Selecionar("unidade", array('idunidade' => $id), "", "", $limite);
            $this->load->view("admin/principal", $data);
        } else {
            $valores = array(
                'descricao' => strtoupper($this->input->post('descricao', TRUE)),
            );
            $this->crud->Atualizar("unidade", $valores, $id, 'idunidade');
            $this->session->set_flashdata('msg_succeso', 'Unidade atualizado com sucesso!');
            redirect(base_url() . "admin/unidade");
        }
    }

    public function Deletar($id) {
        redirect(base_url() . "admin/unidade");
    }

}
