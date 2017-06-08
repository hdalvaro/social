<?php

class QuestionarioBpcModel extends CI_Model {

    public $idquestionario_bpc;
    public $id_pessoa;
    public $data_avaliacao;
    public $data_atualizacao;
    public $beneficiario_outro_municipio;
    public $id_razao_pcd;
    public $integracao_familiar_usuario;
    public $integracao_social_usuario;
    public $passe_livre_tipo;
    public $usuario_com_dependencia;
    public $situacao_dependencia;
    public $id_principal_cuidador;
    public $situacao_cuidado;
    public $servico_paefi;
    public $servico_mse;
    public $servico_abordagem_social;
    public $servico_pcd;
    public $id_instituicao_pcd;
    public $projeto_asses_defesa;
    public $id_instituicao_defesa;
    public $projeto_mercad_trab;
    public $id_instituicao_merc_trab;
    public $scfv;
    public $id_instituicao_scfv;
    public $instituicao_municipal;
    public $id_instituicao_municipal;    
    public $instituicao_fora_municipio;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        return $this->db->insert('questionario_bpc', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM questionario_bpc")->result();
    }

    public function update() {
        $this->db->where('idquestionario_bpc', $this->idquestionario_bpc);
        $this->db->update('questionario_bpc', $this);
    }

}
