<?php

class Pessoa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("crud", "crud");
        $this->load->model("PersonModel");
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
    }

    public function Index() {
//        $this->output->enable_profiler(TRUE);
        $data['pagina'] = 'admin/pessoa';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovaPessoa/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovaPessoa/Deletar/' . $this->input->post('deletar')));
        } else if ($this->input->post('inserir', TRUE)) {
            redirect(base_url("admin/NovaPessoa/Inserir"));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getPessoas() {
//        $pessoa = $this->PersonModel->all();
//        exit(json_encode(array("data" => $pessoa)));
        $pessoa = $this->crud->Selecionar("pessoa", "", "", array("nome" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($pessoa as $row):
            $i++;
            if ($i == count($pessoa))
                $data .= '["' . $row->idpessoa . '",' .
                        '"' . $row->nome . '",' .
                        '"' . $row->nis . '"]';
            else
                $data .= '["' . $row->idpessoa . '",' .
                        '"' . $row->nome . '",' .
                        '"' . $row->nis . '"],';
        endforeach;
        $data .= ']}';
        exit($data);
    }

}
