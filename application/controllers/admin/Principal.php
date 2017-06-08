<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

    public function Index() {
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        
        $data['pagina'] = 'admin/home';       
        $this->load->view('admin/principal', $data);
    }

    public function sessionDestroy(){
    	$this->session->sess_destroy();
    	redirect(base_url());
    }

}
