<?php

class NovoUsuario extends CI_Controller {

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
        $this->load->model("UsuarioModel");
        $this->load->library('Form_validation');
    }

    public function CamposValidos() {
        $config = array(
            array(
                'field' => 'nome',
                'label' => 'Nome',
                'rules' => 'trim|required',
            ),
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'trim|required',
        ));
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

    public function Index() {
        $data['titulo'] = 'Adicionar Usuario';
        $data['pagina'] = "admin/novousuario";
        $this->load->view("admin/principal", $data);
    }

    public function Inserir() {
        if (!$this->ValidaFormulario()) {
            $this->Index();
        } else {
            $this->UsuarioModel->login = $this->input->post('login', TRUE);
            $this->UsuarioModel->nome = strtoupper($this->input->post('nome', TRUE));
            $this->UsuarioModel->perfil_usuario = strtoupper($this->input->post('perfil_usuario', TRUE));
            $this->UsuarioModel->senha = password_hash($this->input->post('senha', TRUE), PASSWORD_BCRYPT);
            $this->UsuarioModel->insert();
            $this->session->set_flashdata('msg_succeso', 'Usuário cadastrado com sucesso!');
            redirect(base_url("admin/usuario"));
        }
    }

    public function Atualizar() {
        $data['titulo'] = 'Atualizar Usuário';
        $data['pagina'] = "admin/novousuario";
        if (trim($this->uri->segment(4)) != '') {
            $id = $this->uri->segment(4);
        }     
        if (!$this->ValidaFormulario()) {
            $data['user'] = $this->UsuarioModel->userById($id);
            $this->load->view("admin/principal", $data);
        }else {
            $this->UsuarioModel->idusuario = $this->input->post('id', TRUE);
            $this->UsuarioModel->login = $this->input->post('login', TRUE);
            $this->UsuarioModel->nome = strtoupper($this->input->post('nome', TRUE));
            $this->UsuarioModel->perfil_usuario = strtoupper($this->input->post('perfil_usuario', TRUE));
            //$this->UsuarioModel->senha = password_hash($this->input->post('senha', TRUE), PASSWORD_BCRYPT);
            $this->UsuarioModel->update();
            $this->session->set_flashdata('msg_succeso', 'Usuário atualizado com sucesso!');
            redirect(base_url() . "admin/usuario");
        }
    }

    public function Deletar($id) {
        if (!isset($id)) {
            echo "<strong>Erro 404 - Página não encontrada.</strong>";
            exit();
        }
        $this->crud->Deletar('usuario', $id, 'id');
        $this->session->set_flashdata('msg_delete', 'Usuário removido com sucesso!');
        redirect(base_url() . 'admin/usuario');
    }

}
