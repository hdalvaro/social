<?php

class ProfissaoModel extends CI_Model {
    
    public $idprofissao;
    public $descricao;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('profissao', $this);
    }

    public function update() {
        $this->db->where('idprofissao', $this->idprofissao);
        $this->db->update('profissao', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM profissao ORDER BY descricao")->result();
    }
}
