<?php

class Profissao extends CI_Controller {

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
        $data['pagina'] = 'admin/profissao';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovaProfissao/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovaProfissao/Deletar/' . $this->input->post('deletar')));
        }else if ($this->input->post('inserir', TRUE)) {
            redirect(base_url('admin/NovaProfissao/Inserir/' . $this->input->post('deletar')));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getProfissoes() {
        $profissao = $this->crud->Selecionar("profissao", "", "", array("descricao" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($profissao as $row):
            $i++;
            if ($i == count($profissao))
                $data .= '["' . $row->idprofissao . '",' .
                        '"' . $row->descricao . '"]';
            else
                $data .= '["' . $row->idprofissao . '",' .
                        '"' . $row->descricao . '"],';
        endforeach;
        $data .= ']}';
        echo $data;
        exit();
    }

}

