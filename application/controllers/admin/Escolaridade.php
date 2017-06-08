<?php

class Escolaridade extends CI_Controller {

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
        $data['pagina'] = 'admin/escolaridade';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovaEscolaridade/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovaEscolaridade/Deletar/' . $this->input->post('deletar')));
        }else if ($this->input->post('inserir', TRUE)) {
            redirect(base_url('admin/NovaEscolaridade/Inserir/' . $this->input->post('deletar')));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getEscolaridades() {
        $escolaridade = $this->crud->Selecionar("escolaridade", "", "", array("descricao" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($escolaridade as $row):
            $i++;
            if ($i == count($escolaridade))
                $data .= '["' . $row->idescolaridade . '",' .
                        '"' . $row->descricao . '"]';
            else
                $data .= '["' . $row->idescolaridade . '",' .
                        '"' . $row->descricao . '"],';
        endforeach;
        $data .= ']}';
        echo $data;
        exit();
    }

}

