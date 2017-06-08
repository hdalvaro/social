<?php

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
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
        $data['pagina'] = 'admin/usuario';
        if ($this->input->post('editar', TRUE)) {
            redirect(base_url('admin/NovoUsuario/Atualizar/' . $this->input->post('editar')));
        } else if ($this->input->post('deletar', TRUE)) {
            redirect(base_url('admin/NovoUsuario/Deletar/' . $this->input->post('deletar')));
        } else if ($this->input->post('inserir', TRUE)) {
            redirect(base_url('admin/NovoUsuario/Inserir/'));
        }
        $this->load->view('admin/principal', $data);
    }

    public function getUsuarios() {
        $usuario = $this->UsuarioModel->all();
        $arrayUsuario = array();
        foreach ($usuario as $row):
            $arrayUsuario['data'][] = "$row->idusuario, '$row->login', '$row->nome'";
        endforeach;
        exit(json_encode($arrayUsuario));
//        $data = '{"data":[';
//        $i = 0;
//        foreach ($usuario as $row):
//            $i++;
//            if ($i == count($usuario))
//                $data .= '["' . $row->idusuario . '",' .
//                        '"' . $row->login . '",' .
//                        '"' . $row->nome . '"]';
//            else
//                $data .= '["' . $row->idusuario . '",' .
//                        '"' . $row->login . '",' .
//                        '"' . $row->nome . '"],';
//        endforeach;
//        $data .= ']}';
//        echo $data;
//        exit();
    }

}
