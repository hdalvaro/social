<?php

class Logradouro extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("crud", "crud");
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $this->load->model("UsuarioModel");
        $this->UsuarioModel->login = $this->session->userdata('usuario');
        if($this->UsuarioModel->userProfile() == 1){
            redirect(base_url('admin/principal'));
        }
    }

    public function Index() {
        $data['pagina'] = 'admin/logradouro';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovoLogradouro/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovoLogradouro/Deletar/' . $this->input->post('deletar')));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getLogradouros() {
        $logradouro = $this->crud->Selecionar("logradouro", "", "", array("descricao" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($logradouro as $row):
            $i++;
            if ($i == count($logradouro))
                $data .= '["' . $row->idlogradouro . '",' .
                        '"' . $row->descricao . '"]';
            else
                $data .= '["' . $row->idlogradouro . '",' .
                        '"' . $row->descricao . '"],';
        endforeach;
        $data .= ']}';
        echo $data;
        exit();
    }

}

?>
