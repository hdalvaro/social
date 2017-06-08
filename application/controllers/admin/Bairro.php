<?php

class Bairro extends CI_Controller {

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
        $data['pagina'] = 'admin/bairro';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovoBairro/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovoBairro/Deletar/' . $this->input->post('deletar')));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getBairros() {
        $bairro = $this->crud->Selecionar("bairro", "", "", array("descricao" => ""), "", "");
        $data = '{"data":[';
        $i = 0;
        foreach ($bairro as $row):
            $i++;
            if ($i == count($bairro))
                $data .= '["' . $row->idbairro . '",' .
                        '"' . $row->descricao . '"]';
            else
                $data .= '["' . $row->idbairro . '",' .
                        '"' . $row->descricao . '"],';
        endforeach;
        $data .= ']}';
        echo $data;
        exit();
    }

}

?>
