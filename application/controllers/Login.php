<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsuarioModel');
        $this->load->model('crud');
        $this->load->library('Form_validation');
    }

    public function CamposValidos() {
        $config = array(
            array(
                'field' => 'login',
                'label' => 'Login',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'password',
                'label' => 'Senha',
                'rules' => 'required|trim'
            )
        );
        return $config;
    }

    public function ValidaFormulario() {
        $this->form_validation->set_rules($this->CamposValidos());
        if ($this->form_validation->run() == FALSE) {
            return false;
        } else
            return true;
    }

    public function Index() {
        if ($this->ValidaFormulario()) {
            $this->UsuarioModel->login = $this->input->post('login', TRUE);
            $this->UsuarioModel->senha = $this->input->post('password', TRUE);
            if ($this->UsuarioModel->validPassword()) {
                $this->UsuarioModel->createSession();
                redirect(base_url("admin/Principal"));
            } else {
                redirect(base_url("Login"));
            }
        }
        $this->load->view("Login");
    }

}
