<?php

class BeneficioModel extends CI_Model {

    public $idbeneficio;
    public $descricao;
    public $sigla;
    public $codigo_programa;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('beneficio', $this);
    }

    public function update() {
        $this->db->where('idbeneficio', $this->idbeneficio);
        $this->db->update('beneficio', $this);
    }

    public function all() {
        return $this->db->query("SELECT idbeneficio, descricao, sigla, codigo_programa FROM beneficio ORDER BY descricao")->result();
    }
}
