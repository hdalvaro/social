<?php

class ReportModel extends CI_Model {

    public $dateBegin;
    public $dateEnd;
    public $isCadUnico;
    public $idBeneficio;
    public $reportType;
    public $type;
    public $gender;
    public $ownHome;
    public $canalizedWater;
    public $power;
    public $illegalArea;

    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function buildReport(){
        $this->load->model("PersonModel");
        if($this->reportType == 'bpc'){
            $filter = " AND pb.id_beneficio > 2 AND pb.id_beneficio <= 7";    
        }else if ($this->reportType == 'pbf'){
            $filter = " AND pb.id_beneficio = 1";
        }        
        if($this->dateBegin != ""){
            $filter .= " AND pb.data_concessao >= '" . $this->dateBegin . "'";
        }
        if($this->dateEnd != ""){
            $filter .= " AND pb.data_concessao <= '" . $this->dateEnd . "'";
        }
        if($this->type > 0){
           $filter .= " AND pb.id_beneficio = " . $this->type;
        }
        if($this->isCadUnico == 1){
            $filter .= " AND p.cadastro_unico = 1";
        }else if($this->isCadUnico == 2){
            $filter .= " AND p.cadastro_unico = 0";
        }     

        if($this->ownHome != ""){
            $filter .= " AND p.moradia = " . $this->ownHome;
        }

        if($this->canalizedWater != ""){
            $filter .= " AND p.agua_encanada = " . $this->canalizedWater;
        }

        if($this->power != ""){
            $filter .= " AND p.luz_eletrica = " . $this->power;
        }
        
        if($this->illegalArea != ""){
            $filter .= " AND p.area_irregular = " . $this->illegalArea;
        }

        if($this->gender > 0){
            $filter .= " AND p.sexo = " . $this->gender;
        }

        return $this->PersonModel->getBeneficiarios($filter);
        
    }
}
