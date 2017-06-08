<?php

class Instituicao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("crud", "crud");
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
    }

    public function Index() {
        $data['pagina'] = 'admin/instituicao';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovaInstituicao/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovaInstituicao/Deletar/' . $this->input->post('deletar')));
        }else if ($this->input->post('inserir', TRUE)) {
            redirect(base_url('admin/NovaInstituicao/Inserir/' . $this->input->post('deletar')));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getInstituicoes() {
        $instituicao = $this->crud->Selecionar("instituicao", "", "", array("descricao" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($instituicao as $row):
            $i++;
            if ($i == count($instituicao))
                $data .= '["' . $row->idinstituicao . '",' .
                        '"' . $row->descricao . '"]';
            else
                $data .= '["' . $row->idinstituicao . '",' .
                        '"' . $row->descricao . '"],';
        endforeach;
        $data .= ']}';
        echo $data;
        exit();
    }

}

