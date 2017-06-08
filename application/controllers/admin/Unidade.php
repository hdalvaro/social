<?php

class Unidade extends CI_Controller {

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
        $data['pagina'] = 'admin/unidade';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovaUnidade/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovaUnidade/Deletar/' . $this->input->post('deletar')));
        }else if ($this->input->post('inserir', TRUE)) {
            redirect(base_url('admin/NovaUnidade/Inserir/' . $this->input->post('deletar')));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getUnidades() {
        $unidade = $this->crud->Selecionar("unidade", "", "", array("descricao" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($unidade as $row):
            $i++;
            if ($i == count($unidade))
                $data .= '["' . $row->idunidade . '",' .
                        '"' . $row->descricao . '"]';
            else
                $data .= '["' . $row->idunidade . '",' .
                        '"' . $row->descricao . '"],';
        endforeach;
        $data .= ']}';
        echo $data;
        exit();
    }

}

