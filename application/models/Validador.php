<?php

class Validador extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function selectByName($tabela = 'escola', $campo = 'aluno', $valor = '', $campoRetorno = 'id') {
        $valor = strtoupper($valor);
        $query = "SELECT $campoRetorno
            FROM $tabela
            WHERE UPPER($campo) = '$valor'";
        $retorno = $this->db->query($query)->result();
        if ($retorno) {
            foreach ($retorno as $row):
                return $row->$campoRetorno;
            endforeach;
        }else {
            return false;
        }
    }

}
