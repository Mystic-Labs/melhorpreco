<?php

class login extends CI_Controller {

	private $uri_login_index 		= "/Login/index";
	private $uri_dashboard_index 	= "/Dashboard/index";

	public function index () {
        
            try {
                $this->load->view('templates/header.php');
                $this->load->view('login/index.php');
                $this->load->view('templates/footer.php');
            } catch (Exception $ex) {
                print_r("erro na exibição da página");
            }
        }
        
        public function loga(){
            $passe = $this->input->post();
            
            $usuario = $this->load->model('usuario_model');
            var_dump($this->usuario_model->tentaLogar($passe));

            var_dump($_REQUEST);
        }
}