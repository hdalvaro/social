<?php

class TipoCuidadorModel extends CI_Model {
    
    public $idtipo_cuidador;
    public $descricao;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('tipo_cuidador', $this);
    }

    public function update() {
        $this->db->where('idtipo_cuidador', $this->idtipo_cuidador);
        $this->db->update('tipo_cuidador', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM tipo_cuidador ORDER BY descricao")->result();
    }
}
