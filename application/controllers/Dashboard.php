<?php

/**
 * Description of Dashboard
 *
 * @author jonathan
 */

class Dashboard extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->load->model('DashboardModel');
    }    
    
    public function index(){
        $data['list'] = $this->DashboardModel->listCart();
        $this->load->view('dashboard', $data);
    }
    
    public function upload(){
        $arquivo = $_FILES['filetext'];

        $ponteiro = fopen ($arquivo['tmp_name'], 'r');
        $texto = NULL;
        
        while (!feof ($ponteiro)) {
            $linha = fgets($ponteiro, 4096);
            $texto .= $linha."\n";
        } 
        
        $this->DashboardModel->uploadFile($texto);
    }
}
