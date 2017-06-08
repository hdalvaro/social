<?php

class PessoaBeneficioModel extends CI_Model {

    public $idpessoa_beneficios;
    public $id_pessoa;
    public $id_beneficio;
    public $data_concessao;
    public $numero_beneficio;
    public $status;
    public $motivo_cancelamento;
    public $data_cancelamento;
    public $valor;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('pessoa_beneficios', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM pessoa_beneficios")->result();
    }

    public function update() {
        $this->db->where('idpessoa_beneficios', $this->idpessoa_beneficios);
        $this->db->update('pessoa_beneficios', $this);
    }
}
