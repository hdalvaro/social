<?php

class PersonModel extends CI_Model {
    
    public $idpessoa;
    public $nome;
    public $cpf;
    public $nis;
    public $cartao_sus;
    public $rg;
    public $id_bairro;
    public $id_logradouro;
    public $renda_mensal;
    public $data_nascimento;
    public $luz_eletrica;
    public $agua_encanada;
    public $moradia;
    public $tipo_moradia;
    public $area_irregular;
    public $esgoto;
    public $numero;
    public $id_cidade;
    public $data_atualizacao;
    public $cod_familia;
    public $sexo;
    public $id_estado_origem;
    public $id_cidade_origem;
    public $bolsa_familia;
    public $cadastro_unico;
    

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert() {
        $this->db->insert('pessoa', $this);
    }
    
    public function update() {
        $this->db->where('idpessoa', $this->idpessoa);
        $this->db->update('pessoa', $this);
    }

    public function all() {
        return $this->db->query("SELECT * FROM pessoa ORDER BY nome")->result();
    }

    public function searchPersonByName(){
        $personExists = $this->db->query("SELECT idpessoa
            FROM pessoa
            WHERE nome LIKE '%". $this->nome ."%'"
            )->result();
        if($personExists){
            foreach($personExists as $row):
                return $row->idpessoa;
            endforeach;            
        }else{
            return false;
        }
    }

    public function getBeneficios() {
        return $this->db->query("SELECT p.nome AS nome_beneficiario, pb.data_concessao, 
            pb.status, pb.valor
            FROM pessoa p
            INNER JOIN pessoa_beneficios pb ON pb.id_pessoa = p.idpessoa 
            ORDER BY p.nome")->result();
    }

    public function getBeneficiarios($filtros = ""){
        
        $sql = "SELECT p.nome AS nome_beneficiario,
            p.nis, p.renda_mensal, b.descricao AS beneficio,
            pb.data_concessao, pb.status, pb.valor, pb.numero_beneficio
            FROM pessoa p
            INNER JOIN pessoa_beneficios pb ON pb.id_pessoa = p.idpessoa
            INNER JOIN beneficio b ON b.idbeneficio = pb.id_beneficio
            WHERE p.idpessoa IS NOT NULL 
            $filtros
            ORDER BY b.descricao, p.nome, pb.data_concessao";
        return $this->db->query($sql)->result();
    }

}
