<?php

class Relatorio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('usuario')) {
            redirect(base_url());
        }
    }

    public function Index() {
        $this->load->model("BeneficioModel");
        $data['pagina'] = 'admin/relatorio';
        $data['beneficios'] = $this->BeneficioModel->all();
        if($this->input->post("btnGerar", TRUE)){
            if($this->input->post("modelo", TRUE) == 1){
                $this->PbfReport();
            }else if($this->input->post("modelo", TRUE) == 2){
                $this->BpcReport();
            }
            
        }
        $this->load->view('admin/principal', $data);
    }

    public function PbfReport(){
        $this->load->library('FPDF');
        $this->load->model("ReportModel");
        $this->ReportModel->reportType = 'pbf';
        $filterText = "";
        if($this->input->post("dataInicio", TRUE) != ""){
            $this->ReportModel->dateBegin = $this->input->post("dataInicio", TRUE);
            $filterText .= "Data de Concessão >= " . date("d/m/Y", strtotime($this->input->post("dataInicio", TRUE)));
        }
        if($this->input->post("dataFim", TRUE) != ""){
            $this->ReportModel->dateEnd = $this->input->post("dataFim", TRUE);
            $filterText .= " Data de Concessão <= " . date("d/m/Y", strtotime($this->input->post("dataFim", TRUE)));
        }
        if($this->input->post('tipo', TRUE) > 0){
           $this->ReportModel->type = $this->input->post('tipo', TRUE);
        }

        if($this->input->post('sexo', TRUE) > 0){
           $this->ReportModel->gender = $this->input->post('sexo', TRUE);
        }

        if($this->input->post('moradia', TRUE) != ""){
           $this->ReportModel->ownHome = $this->input->post('moradia', TRUE);
        }else{
            $this->ReportModel->ownHome = "";
        }

        if($this->input->post('agua_encanada', TRUE) != ""){
           $this->ReportModel->canalizedWater = $this->input->post('agua_encanada', TRUE);
        }else{
            $this->ReportModel->canalizedWater = "";
        }

        if($this->input->post('luz_eletrica', TRUE) != ""){
           $this->ReportModel->power = $this->input->post('luz_eletrica', TRUE);
        }else{
            $this->ReportModel->power = "";
        }

        if($this->input->post('area_irregular', TRUE) != ""){
           $this->ReportModel->illegalArea = $this->input->post('area_irregular', TRUE);
        }else{
            $this->ReportModel->illegalArea = "";
        }


        if($this->input->post('cadastro_unico', TRUE) == 1){
            $this->ReportModel->isCadUnico = 1;
            $filterText .= "Somente pessoas que possuem CadÚnico";
        }else if($this->input->post('cadastro_unico', TRUE) == 2){
            $this->ReportModel->isCadUnico = 2;;
            $filterText .= "Somente pessoas que não possuem CadÚnico";
        }
        $data = $this->ReportModel->buildReport();
        $pdf = new FPDF('L', 'cm', 'A4'); 
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->AddPage();
        $pdf->Cell(27, 1, utf8_decode('Bolsa Família'), 0, 0.1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(27, 0, utf8_decode("Data de Emissão: " . date("d/m/Y")), 0, 0.1, 'R');
        $pdf->Cell(27, 1, utf8_decode("Usuário: " . $this->session->userdata('usuario')), 0, 0.1, 'R');
        $pdf->Cell(27, 1, utf8_decode($filterText), 0, 0.1, 'L');
        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 1, "Nome", 1, 0, 'C');
        $pdf->Cell(4, 1, "NIS", 1, 0, 'C');
        $pdf->Cell(4, 1, "Renda Mensal", 1, 0, 'C');
        $pdf->Cell(4, 1, utf8_decode("Data Concessão"), 1, 0, 'C');
        $pdf->Cell(4, 1, utf8_decode("Valor"), 1, 0, 'C');
        $pdf->Ln(1);
        $pdf->SetFont('Arial', '', 10);
        foreach($data as $row):
            $renda_mensal = $row->renda_mensal != 0 ? "R$ " .  $row->renda_mensal : "Não Informada";
            $pdf->Cell(10, 1, utf8_decode($row->nome_beneficiario), 1, 0, 'C');
            $pdf->Cell(4, 1, $row->nis, 1, 0, 'C');
            $pdf->Cell(4, 1, utf8_decode($renda_mensal), 1, 0, 'C');
            $pdf->Cell(4, 1, date("d/m/Y", strtotime($row->data_concessao)), 1, 0, 'C');
            $pdf->Cell(4, 1, "R$ " . $row->valor, 1, 0, 'C');
            $pdf->Ln(1);
        endforeach;
        $pdf->output();
    }

     public function BpcReport(){
        $this->load->library('FPDF');
        $this->load->model("ReportModel");
        $this->ReportModel->reportType = 'bpc';
        $filterText = "";
        if($this->input->post("dataInicio", TRUE) != ""){
            $this->ReportModel->dateBegin = $this->input->post("dataInicio", TRUE);
            $filterText .= "Data de Concessão >= " . date("d/m/Y", strtotime($this->input->post("dataInicio", TRUE)));
        }
        if($this->input->post("dataFim", TRUE) != ""){
            $this->ReportModel->dateEnd = $this->input->post("dataFim", TRUE);
            $filterText .= " Data de Concessão <= " . date("d/m/Y", strtotime($this->input->post("dataFim", TRUE)));
        }
        if($this->input->post('tipo', TRUE) > 0){
           $this->ReportModel->type = $this->input->post('tipo', TRUE);
        }
        if($this->input->post('sexo', TRUE) > 0){
           $this->ReportModel->gender = $this->input->post('sexo', TRUE);
        }
        if($this->input->post('cadastro_unico', TRUE) == 1){
            $this->ReportModel->isCadUnico = 1;
            $filterText .= "Somente pessoas que possuem CadÚnico";
        }else if($this->input->post('cadastro_unico', TRUE) == 2){
            $this->ReportModel->isCadUnico = 2;;
            $filterText .= "Somente pessoas que não possuem CadÚnico";
        }
     
        $data = $this->ReportModel->buildReport();
        $pdf = new FPDF('L', 'cm', 'A4'); 
        $pdf->AliasNbPages();
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->AddPage();
        $pdf->Cell(27, 1, utf8_decode('Benefício da Prestação Continuada'), 0, 0.1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(27, 1, utf8_decode("O * ao lado do nome significa que o benefício está cessado."), 0, 0.1, 'L');
        $pdf->Cell(27, 1, utf8_decode($filterText), 0, 0.1, 'L');
        $pdf->Ln(1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 1, "Nome", 1, 0, 'C');
        $pdf->Cell(2.5, 1, "NIS", 1, 0, 'C');
        $pdf->Cell(3, 1, "Renda Mensal", 1, 0, 'C');
        $pdf->Cell(3, 1, utf8_decode("Data Concessão"), 1, 0, 'C');
        $pdf->Cell(5.5, 1, utf8_decode("Tipo Benefício"), 1, 0, 'C');
        $pdf->Cell(2.5, 1, utf8_decode("Nº Benefício"), 1, 0, 'C');
        $pdf->Ln(1);
        $pdf->SetFont('Arial', '', 10);
        $totalAtivos = 0;
        $totalCessados = 0;
        foreach($data as $row):
            $cancelado = $row->status == 1 ? "*" : "";
            $renda_mensal = $row->renda_mensal != 0 ? "R$ " .  $row->renda_mensal : "Não Informada";
            $pdf->Cell(10, 1, utf8_decode($row->nome_beneficiario . $cancelado), 1, 0, 'C');
            $pdf->Cell(2.5, 1, $row->nis, 1, 0, 'C');
            $pdf->Cell(3, 1, utf8_decode($renda_mensal), 1, 0, 'C');
            $pdf->Cell(3, 1, date("d/m/Y", strtotime($row->data_concessao)), 1, 0, 'C');
            $pdf->Cell(5.5, 1, utf8_decode($row->beneficio), 1, 0, 'C');
            $pdf->Cell(2.5, 1, $row->numero_beneficio, 1, 0, 'C');
            $pdf->Ln(1);
            if($row->status == 1){
                $totalCessados++;
            }else{
                $totalAtivos++;
            }
        endforeach;
        $pdf->Ln(0.45);
        $pdf->Cell(26.6, 0.5, utf8_decode("Total de Benefícios Ativos: $totalAtivos"), 0, 0.1, 'R');
        $pdf->Cell(26.6, 0.5, utf8_decode("Total de Benefícios Cessados: $totalCessados"), 0, 0.1, 'R');
        $pdf->Cell(26.6, 0.5, utf8_decode("Total Geral: " . ($totalAtivos + $totalCessados)), 0, 0, 'R');
        $pdf->output();
    }

}