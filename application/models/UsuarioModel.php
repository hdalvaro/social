<?php

class UsuarioModel extends CI_Model {

    public $idusuario;
    public $login;
    public $nome;
    public $senha;
    public $perfil_usuario;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        $this->db->insert('usuario', $this);
    }

    public function update() {
        $this->db->where('idusuario', $this->idusuario);
        $this->db->update('usuario', $this);
    }

    public function all() {
        return $this->db->query("SELECT idusuario, login, nome, perfil_usuario FROM usuario")->result();
    }

    public function userById($id) {
        return $this->db->query("SELECT idusuario, login, nome, perfil_usuario FROM usuario WHERE idusuario = $id")->result();
    }

    public function validPassword(){  
        $login = $this->login; 
        $query = $this->db->query("SELECT senha 
                       FROM usuario 
                       WHERE login = '$login' LIMIT 1")->result();
        foreach($query as $row):
            return password_verify($this->senha, $row->senha);
        endforeach;
    }

    public function userProfile(){
        $return = $this->db->query("SELECT perfil_usuario FROM usuario WHERE login = '" . $this->login . "'")->result();
        foreach($return as $row):
            return $row->perfil_usuario;
        endforeach;
    }

    public function createSession(){
         $data =array(
            'usuario' => $this->login,
            'logged' => true,
            'user_profile' => $this->crud->SelectCampo('perfil_usuario', 'usuario', "WHERE login = '" . $this->login . "'")
            );
        $this->session->set_userdata($data);
    }
}
