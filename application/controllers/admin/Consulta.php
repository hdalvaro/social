<?php

class Consulta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $this->load->model("PersonModel");
    }

    public function Index() {
        $data['pagina'] = 'admin/consulta';
        $this->load->view('admin/principal', $data);
    }

    public function getBeneficios() {
        exit(json_encode($this->PersonModel->getBeneficios()));
    }

}
