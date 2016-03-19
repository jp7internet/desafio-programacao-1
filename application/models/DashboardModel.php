<?php

/**
 * Description of Dashboard
 *
 * @author jonathan
 */
class DashboardModel extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    function uploadFile($texto = NULL){
        if($texto){
            $vetor = preg_split('[	|\n]', $texto);                    
            $cont = 7;
            
            $tamanho = count($vetor);
            $vetor[$tamanho] = 'fim';
            
            while($vetor[$cont] != 'fim'){
                $purchaser['name_purchase'] = $vetor[$cont];
                $itens['description'] = $vetor[$cont+1];
                $itens['price'] = $vetor[$cont+2];
                $itens['count_item'] = $vetor[$cont+3];
                $merchants['name_merchant'] = $vetor[$cont+4];
                $merchants['address'] = $vetor[$cont+5];

                $this->db->insert('purchaser',$purchaser);
                $this->db->insert('itens',$itens);
                $this->db->insert('merchants',$merchants);
                
                $cont +=7;
            }
        }else{
            echo 'não tem conteudo';
        }
    }
}
