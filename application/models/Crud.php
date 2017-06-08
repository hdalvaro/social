<?php

class Crud extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function SelectCampo($campo = 'id', $tabela = "usuario", $where = "WHERE 1=1") {
        $query = $this->db->query("SELECT $campo
                        FROM $tabela 
                        $where");
        foreach ($query->result() as $retorno) {
            return $retorno->$campo;
        }
    }

    public function Selecionar($tabela = "", $onde = array(), $campos = "", $ordem = array(), $limite = array(), $offset = array(), $valor = array()) {
        if (!$tabela) {
            echo utf8_decode("<p align='center'>É necessário indicar uma tabela para a seleção</p>");
            exit;
        }
        if ($campos) {
            $this->db->select($campos);
        }
        if ($onde) {
            $this->db->where($onde);
        }
        if ($ordem) {
            foreach ($ordem as $key => $value)
                $this->db->order_by($key, $value);
        }
        if ($limite != "")
            $dados = $this->db->get($tabela, $limite, $offset);
        else
            $dados = $this->db->get($tabela);
        return $dados->result();
    }

    public function Inserir($tabela = "", $valores = array()) {
        if (!$tabela) {
            echo utf8_decode("<p align='center'>É necessário indicar uma tabela para a seleção</p>");
            exit;
        } else if (!$valores) {
            echo utf8_decode("<p align='center'>É necessário indicar campos/valores para a inserção</p>");
            exit;
        }
        $this->db->insert($tabela, $valores);
    }

    public function Atualizar($tabela, $valores, $id, $campo = '') {
        if (!$tabela) {
            echo utf8_decode("<p align='center'>É necessário indicar uma tabela para a atualização</p>");
            exit;
        } else if (!$valores) {
            echo utf8_decode("<p align='center'>É necessário indicar campos/valores para a atualização</p>");
            exit;
        }
        if (!$campo)
            $this->db->where('id', $id);
        else
            $this->db->where($campo, $id);
        $this->db->update($tabela, $valores);
    }

    public function Deletar($tabela, $id, $campo) {
        if (!$campo)
            $this->db->where('id', $id);
        else
            $this->db->where($campo, $id);
        $this->db->delete($tabela);
    }

    public function count_posts($tabela, $onde = array()) {
        if ($onde) {
            $this->db->where($onde);
        }
        return $this->db->count_all($tabela);
    }

    public function list_posts($limit, $offset, $tabela = "", $campo = "", $ordem = "asc", $onde = array()) {
        $this->db->where($onde);
        $this->db->limit($limit, $offset);
        $this->db->order_by($campo, $ordem);
        $query = $this->db->get($tabela);
        return $query->result();
    }

}

?>
