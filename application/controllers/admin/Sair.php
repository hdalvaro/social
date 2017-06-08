<?php

class Sair extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('logged')){
            redirect(base_url());
        }                 
    }

    public function Index() {
        if ($this->session->userdata('usuario')) {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
}
    
?>


