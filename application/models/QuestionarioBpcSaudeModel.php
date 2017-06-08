<?php

class QuestionarioBpcSaudeModel extends CI_Model {

    public $idquestionario_bpc_saude;
    public $id_questionario;
    public $esf;
    public $ubs;
    public $capsi;
    public $capsii;
    public $capsad;
    public $sae;
    public $melhor_em_casa;
    public $crmi;
    public $pim;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('questionario_bpc_saude', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM questionario_bpc_saude")->result();
    }

    public function update() {
        $this->db->where('idquestionario_bpc_saude', $this->idquestionario_bpc_saude);
        $this->db->update('questionario_bpc_saude', $this);
    }

}
