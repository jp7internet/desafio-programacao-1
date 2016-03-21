<?php

class Crud extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('CrudModel');
    }
    
    function index(){
        $this->load->view('create');
    }
    
    public function create(){      
        $this->form_validation->set_rules('name_purchase', 'Name_Purchase', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('count_item', 'Count_Item', 'trim|required');
        $this->form_validation->set_rules('name_merchant', 'Name_Merchant', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){
            echo "Erro Validação";
        }else{
            $purchaser['name_purchase'] = $this->input->post('name_purchase');
            $itens['description'] = $this->input->post('description');
            $itens['price'] = $this->input->post('price');
            $itens['count_item'] = $this->input->post('count_item');
            $merchants['name_merchant'] = $this->input->post('name_merchant');
            $merchants['address'] = $this->input->post('address');
            
            $this->CrudModel->create($purchaser, $itens, $merchants);
        }
    }
    
    public function update(){
        $id = $this->input->post('id_cart');
        $data['list'] = $this->CrudModel->getById($id);
        
        $this->load->view('update', $data);
    }
    
    public function do_update(){
        $this->form_validation->set_rules('name_purchase', 'Name_Purchase', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');
        $this->form_validation->set_rules('count_item', 'Count_Item', 'trim|required');
        $this->form_validation->set_rules('name_merchant', 'Name_Merchant', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        
        if ($this->form_validation->run() == FALSE){
            echo "Erro Validação";
        }else{
            $purchaser['name_purchase'] = $this->input->post('name_purchase');
            $itens['description'] = $this->input->post('description');
            $itens['price'] = $this->input->post('price');
            $itens['count_item'] = $this->input->post('count_item');
            $merchants['name_merchant'] = $this->input->post('name_merchant');
            $merchants['address'] = $this->input->post('address');
            $purchaser['id_cart'] = $this->input->post('id_cart');

            $this->CrudModel->update($purchaser, $itens, $merchants);
        }
    }
    
    public function delete(){
        $id = $this->input->post('id_cart');
        $this->CrudModel->delete($id);
    }
}
