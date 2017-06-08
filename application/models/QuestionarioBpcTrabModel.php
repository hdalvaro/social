<?php

class QuestionarioBpcTrabModel extends CI_Model {

    public $idquestionario_bpc_trab;
    public $id_questionario;
    public $bpc_trabalho_public;
    public $id_profissao;
    public $poss_participar_curso;


    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('questionario_bpc_trab', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM questionario_bpc_trab")->result();
    }

    public function update() {
        $this->db->where('questionario_bpc_trab', $this->idquestionario_bpc_trab);
        $this->db->update('questionario_bpc_trab', $this);
    }

}
