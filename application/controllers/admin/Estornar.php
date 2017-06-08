<?php

class Estornar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $this->load->model("EstornarModel", "estorno");
        $this->load->model("UsuarioModel");
        $this->UsuarioModel->login = $this->session->userdata('usuario');
        if($this->UsuarioModel->userProfile() == 1){
            redirect(base_url('admin/principal'));
        }
    }

    public function Index($offset = '') {
        $data['pagina'] = 'admin/estornar';
        $data['planilha'] = $this->estorno->selectPlanilhas();
        if ($this->input->post('estornar') != "") {             
            $this->estorno->estornaPlanilha($this->input->post('arquivo'));
        }
        $this->load->view('admin/principal', $data);
    }

}
