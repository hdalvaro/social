<?php

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function ValidaUsuario($login = "", $senha = "") {
        if (!$login) {
            return false;
        } else {
            $query = $this->db->query("SELECT senha 
                       FROM usuario 
                       WHERE login = '$login' LIMIT 1")->result();
            foreach($query as $row):
                return password_verify($senha, $row->senha);
            endforeach;
        }
    }


}
