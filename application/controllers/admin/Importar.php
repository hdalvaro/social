<?php

class Importar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
        $this->load->model("crud", "crud");
        if (!$this->crud->SelectCampo('perfil_usuario', 'usuario', "WHERE login = '" . $this->session->userdata('usuario') . "'") == 1) {
            redirect(base_url('admin/principal'));
        }
        $this->load->model("Validador", "validador");
        $this->load->library("PHPExcel", "excel");
    }

    public function Index() {
        $data['pagina'] = 'admin/importar';
        if ($this->input->post('importar', TRUE) == 1) {
            //$fileName = $this->do_upload();
            $fileName = "";
            if ($this->input->post('modelo', TRUE) == 0) {
                $this->importarCadUnico($fileName);
            } else if ($this->input->post('modelo', TRUE) == 1) {
                $this->importarBolsaFamilia($fileName);
            }else if ($this->input->post('modelo', TRUE) == 2) {
                $this->importarBpc($fileName);
            }
        }
        $this->load->view('admin/principal', $data);
    }

    public function do_upload() {
        $config['upload_path'] = base_url() . 'uploads/';
        $config['allowed_types'] = 'xls|xlsx|ods';
        $config['max_size'] = '999999999';
        $config['max_width'] = '999999999'; 
        $config['max_height'] = '999999999';
        $config['encrypt_name'] = FALSE;     
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->session->set_flashdata('msg_error', 'Erro ao realizar importação: ' . $this->upload->display_errors());
            redirect(base_url('admin/Importar'));
        } else {
            return $this->upload->file_name;
        }
    }

    public function importarCadUnico($nomeArq) {
        ini_set("max_execution_time", 0);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objReader->setLoadSheetsOnly(0);
        $objPHPExcel = $objReader->load("./uploads/cad_unico.xlsx");      
        $objPHPExcel->setActiveSheetIndex(0);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet):
            $highestRow = $worksheet->getHighestRow(); 
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            for ($row = 2; $row <= $highestRow; $row++) :
                $id_pessoa = 0;
                $id_bairro = 0;
                $id_logradouro = 0;
                $id_cidade = 0;
                $nomeMunicipio = strtoupper($worksheet->getCellByColumnAndRow(0, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(0, $row)->getValue() : "");
                $nomeBairro = strtoupper($worksheet->getCellByColumnAndRow(5, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(5, $row)->getValue() : "");
                $nomeLogradouro = strtoupper($worksheet->getCellByColumnAndRow(6, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(6, $row)->getValue() : "");
                if (!$this->validador->selectByName('cidade', 'ibge', $worksheet->getCellByColumnAndRow(2, $row)->getValue(), 'id')) {
                    $this->crud->Inserir('cidade', array(
                        'descricao' => $nomeMunicipio,
                        'id_estado' => $this->validador->selectByName('estado', 'sigla', $worksheet->getCellByColumnAndRow(1, $row)->getValue()),
                        'ibge' => $worksheet->getCellByColumnAndRow(2, $row)->getValue() != NULL ? 
                            $worksheet->getCellByColumnAndRow(2, $row)->getValue() : 0,
                    ));
                    $id_cidade = $this->db->insert_id();
                } else {
                    $id_cidade = $this->validador->selectByName('cidade', 'ibge', $worksheet->getCellByColumnAndRow(2, $row)->getValue(), 'id');
                }
                if (!$this->validador->selectByName('bairro', 'descricao', $nomeBairro, 'idbairro')) {
                    $this->crud->Inserir('bairro', array(
                        'descricao' => $nomeBairro
                    ));
                    $id_bairro = $this->db->insert_id();
                } else {
                    $id_bairro = $this->validador->selectByName('bairro', 'descricao', $nomeBairro, 'idbairro');
                }
                if (!$this->validador->selectByName('logradouro', 'descricao', $nomeLogradouro, 'idlogradouro')) {
                    $this->crud->Inserir('logradouro', array(
                        'descricao' => $nomeLogradouro,
                        "id_bairro" => $id_bairro
                    ));
                    $id_logradouro = $this->db->insert_id();
                } else {
                    $id_logradouro = $this->validador->selectByName('logradouro', 'descricao', $nomeLogradouro, 'idlogradouro');
                }
                if (!$this->validador->selectByName('pessoa', 'nis', $worksheet->getCellByColumnAndRow(11, $row)->getValue(), 'idpessoa')) {
                    $UNIX_DATE = ($worksheet->getCellByColumnAndRow(4, $row)->getValue() - 25569) * 86400;
                    $EXCEL_DATE = 25569 + ($UNIX_DATE / 86400);
                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
                    $data_atualizacao = $UNIX_DATE;
                    $UNIX_DATE = ($worksheet->getCellByColumnAndRow(13, $row)->getValue() - 25569) * 86400;
                    $EXCEL_DATE = 25569 + ($UNIX_DATE / 86400);
                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;
                    $data_nascimento = $UNIX_DATE;
                    $this->crud->Inserir('pessoa', array(
                        'cod_familia' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                        'data_atualizacao' => gmdate("Y-m-d", $data_atualizacao),
                        'id_cidade' => $id_cidade,
                        'id_bairro' => $id_bairro,
                        'id_logradouro' => $id_logradouro,
                        'numero' => $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
                        'renda_mensal' => $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                        'bolsa_familia' => $worksheet->getCellByColumnAndRow(9, $row)->getValue(),
                        'nome' => $worksheet->getCellByColumnAndRow(10, $row)->getValue(),
                        'nis' => $worksheet->getCellByColumnAndRow(11, $row)->getValue(),
                        'sexo' => $worksheet->getCellByColumnAndRow(12, $row)->getValue(),
                        'data_nascimento' => $data_nascimento,
                    ));
                }
            endfor;
        endforeach;
        $this->session->set_flashdata('msg_succeso', 'Os dados foram importados com sucesso!');
        redirect(base_url('admin/importar'));
    }

    public function importarBolsaFamilia($nomeArq) {
        ini_set("max_execution_time", 0);
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objReader->setLoadSheetsOnly(0);
        $objPHPExcel = $objReader->load("./uploads/pbf-bento-janeiro-2017.xlsx");
        $objPHPExcel->setActiveSheetIndex(0);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet):
            $highestRow = $worksheet->getHighestRow(); 
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            for ($row = 2; $row <= $highestRow; $row++) :
                $id_pessoa = 0;
                $id_cidade = 0;
                $nomeMunicipio = strtoupper($worksheet->getCellByColumnAndRow(2, $row)->getValue() != NULL ? $worksheet->getCellByColumnAndRow(2, $row)->getValue() : "");
                if (!$this->validador->selectByName('cidade', 'descricao', $worksheet->getCellByColumnAndRow(2, $row)->getValue(), 'id')) {
                    $this->crud->Inserir('cidade', array(
                        'descricao' => $nomeMunicipio,
                        'id_estado' => $this->validador->selectByName('estado', 'sigla', $worksheet->getCellByColumnAndRow(0, $row)->getValue()),
                        'ibge' => ''
                    ));
                    $id_cidade = $this->db->insert_id();
                } else {
                    $id_cidade = $this->validador->selectByName('cidade', 'descricao', $worksheet->getCellByColumnAndRow(2, $row)->getValue(), 'id');
                }
                if (!$this->validador->selectByName('pessoa', 'nis', $worksheet->getCellByColumnAndRow(7, $row)->getValue(), 'idpessoa')) {
                    $this->crud->Inserir('pessoa', array(
                        'cod_familia' => $worksheet->getCellByColumnAndRow(3, $row)->getValue(),
                        'data_atualizacao' => '',
                        'id_cidade' => $id_cidade,
                        'numero' => '',
                        'renda_mensal' => '',
                        'bolsa_familia' => '1',
                        'nome' => $worksheet->getCellByColumnAndRow(8, $row)->getValue(),
                        'nis' => $worksheet->getCellByColumnAndRow(7, $row)->getValue(),
                        'sexo' => 1,
                        'data_nascimento' => '',
                    ));
                    $id_pessoa = $this->db->insert_id();
                } else {
                    $id_pessoa = $this->validador->selectByName('pessoa', 'nis', $worksheet->getCellByColumnAndRow(7, $row)->getValue(), 'idpessoa');
                }

                $this->crud->Inserir('pessoa_beneficios', array(
                    'id_pessoa' => $id_pessoa,
                    'id_beneficio' => $this->validador->selectByName('beneficio', 'codigo_programa', $worksheet->getCellByColumnAndRow(5, $row)->getValue(), 'idbeneficio'),
                    'data_concessao' => '2017-01-31',
                    'numero_beneficio' => '',
                    'motivo_cancelamento' => '',
                    'data_cancelamento' => '',
                    'valor' => substr($worksheet->getCellByColumnAndRow(7, $row)->getValue(), 0, 3)
                ));
            endfor;
        endforeach;
        $this->session->set_flashdata('msg_succeso', 'Os dados foram importados com sucesso!');
        redirect(base_url('admin/importar'));
    }


    public function importarBpc($nomeArq) {
        ini_set("max_execution_time", 0);
        $this->load->model("PersonModel");
        $this->load->model("PessoaBeneficioModel");
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objReader->setReadDataOnly(true);
        $objReader->setLoadSheetsOnly(0);
        $objPHPExcel = $objReader->load("./uploads/bpc.xlsx");
        $objPHPExcel->setActiveSheetIndex(0);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet):
            $highestRow = $worksheet->getHighestRow(); 
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
            for ($row = 2; $row <= $highestRow; $row++) :
                $nomeMunicipio = strtoupper($worksheet->getCellByColumnAndRow(5, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(5, $row)->getValue() : "");
                $nomeBairro = strtoupper($worksheet->getCellByColumnAndRow(4, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(4, $row)->getValue() : "");
                $nomeLogradouro = strtoupper($worksheet->getCellByColumnAndRow(3, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(3, $row)->getValue() : "");
                $nomeBeneficio = strtoupper($worksheet->getCellByColumnAndRow(2, $row)->getValue() != NULL ? 
                        $worksheet->getCellByColumnAndRow(2, $row)->getValue() : "");


                if (!$this->validador->selectByName('bairro', 'descricao', $nomeBairro, 'idbairro')) {
                    $this->crud->Inserir('bairro', array(
                        'descricao' => $nomeBairro
                    ));
                    $id_bairro = $this->db->insert_id();
                } else {
                    $id_bairro = $this->validador->selectByName('bairro', 'descricao', $nomeBairro, 'idbairro');
                }

                if (!$this->validador->selectByName('logradouro', 'descricao', $nomeLogradouro, 'idlogradouro')) {
                    $this->crud->Inserir('logradouro', array(
                        'descricao' => $nomeLogradouro,
                        "id_bairro" => $id_bairro
                    ));
                    $id_logradouro = $this->db->insert_id();
                } else {
                    $id_logradouro = $this->validador->selectByName('logradouro', 'descricao', $nomeLogradouro, 'idlogradouro');
                }

                if (!$this->validador->selectByName('beneficio', 'descricao', $nomeBeneficio, 'idbeneficio')) {
                    $this->crud->Inserir('beneficio', array(
                        'descricao' => $nomeBeneficio,
                        'sigla' => '',
                        'codigo_programa' => ''
                    ));
                    $id_beneficio = $this->db->insert_id();
                } else {
                    $id_beneficio = $this->validador->selectByName('beneficio', 'descricao', $nomeBeneficio, 'idbeneficio');
                }

                if (!$this->validador->selectByName('pessoa', 'nome', strtoupper($worksheet->getCellByColumnAndRow(1, $row)->getValue()), 'idpessoa')) {
                    $this->PersonModel->nome = strtoupper($worksheet->getCellByColumnAndRow(1, $row)->getValue());
                    $this->PersonModel->id_logradouro = $id_logradouro;
                    $this->PersonModel->id_bairro = $id_bairro;
                    $this->PersonModel->id_cidade = 1;
                    $this->PersonModel->cadastro_unico = 0;
                    $this->PersonModel->insert();
                    $id_pessoa = $this->db->insert_id();
                } else {
                    $id_pessoa = $this->validador->selectByName('pessoa', 'nome', $worksheet->getCellByColumnAndRow(1, $row)->getValue(), 'idpessoa');
                }

                $this->PessoaBeneficioModel->id_pessoa = $id_pessoa;
                $this->PessoaBeneficioModel->id_beneficio = $id_beneficio;
                $this->PessoaBeneficioModel->data_concessao = date("Y-m-d");
                $this->PessoaBeneficioModel->numero_beneficio = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                $this->PessoaBeneficioModel->status = $worksheet->getCellByColumnAndRow(7, $row)->getValue() == "CESSADO" ? 1 : 0;
                $this->PessoaBeneficioModel->insert();
            endfor;
        endforeach;
        $this->session->set_flashdata('msg_succeso', 'Os dados foram importados com sucesso!');
        redirect(base_url('admin/importar'));
    }

}
