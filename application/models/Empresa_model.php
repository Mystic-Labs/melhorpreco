<?php

class Empresa_Model Extends CI_Model{
    public $Email;
    private $EmpresaID;
	public function construct(){
		parent::__construct();
	}

	public function getInfo($idEmpresa){
                if (isset($idEmpresa['ID_EMPRESA_FK'])){
                    $sql = "select * from empresa where ID_EMPRESA = '".$idEmpresa['ID_EMPRESA_FK']."'";
                }
                else{
                    $sql = "select * from empresa where ID_EMPRESA = '".$idEmpresa."'";
                }
                
		
                
		$result = $this->db->query($sql);
                if (isset($result))   
                    return ($result->result_array()[0]);
                else{
                    return "";
                }
	}
        
        public function getCNPJEmpresa(){
		Seguranca::security();
                
		$this->EmpresaID = $this->usuario_model->getEmpresaAdministradas($_SESSION['user_data']['email']);

                $this->EmpresaID = $this->EmpresaID['ID_EMPRESA_FK'];
		return $this->EmpresaID;		
	}

        public function getInfoEmpresa(){
		$this->EmpresaID = $this->usuario_model->getEmpresaAdministradas($_SESSION['user_data']['email']);
		if ($this->EmpresaID == "")
                {
                    return "";
                }
                 //print_r($this->EmpresaID);  
		$this->load->model('empresa_model');
		return $this->empresa_model->getInfo($this->EmpresaID);
	}
        
        public function allProducts(){
                Seguranca::security();
                
                $this->EmpresaID = $this->usuario_model->getEmpresaAdministradas($_SESSION['user_data']['email']);
		
                $this->EmpresaID = $this->EmpresaID['ID_EMPRESA_FK'];
                
		echo($this->produto_model->all_products($this->EmpresaID));
	}
}

 ?>