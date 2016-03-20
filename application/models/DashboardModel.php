<?php

/**
 * Description of Dashboard
 *
 * @author jonathan
 */
class DashboardModel extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    
    function uploadFile($texto = NULL){
        
        // Caso a variável $texto tenha conteúdo, é realizado o parser.
        if($texto){
            // Realizando um split, onde cada informação separada por tab ou enter, será colocado em uma posição do vetor.
            $vetor = preg_split('[	|\n]', $texto);      
            
            // Ignorando as primeiras linhas, pois são só os cabeçalhos                         
            $cont = 7;                                                          
            
            // Indicando onde acaba as informações.
            $tamanho = count($vetor);
            $vetor[$tamanho] = 'fim';
            
            // Laço, onde so sera finalizado quando for encontrado a posiçao onde contem a string 'fim'.
            while($vetor[$cont] != 'fim'){
                
                //Para evitar um número grande de repetições, e como ja se sabe o número de colunas,
                //podemos atribuir a vetores chamados $purchaser, $itens, $merchants, as suas respectivas informações,
                //somando o contador, ou seja, levando manualmente a posição onde se encontra as informações.
                $purchaser['name_purchase'] = $vetor[$cont];
                $itens['description'] = $vetor[$cont+1];
                $itens['price'] = $vetor[$cont+2];
                $itens['count_item'] = $vetor[$cont+3];
                $merchants['name_merchant'] = $vetor[$cont+4];
                $merchants['address'] = $vetor[$cont+5];

                //Inserindo as informaçoes contidas nos vetores $purchaser, $itens e $merchants nas tabelas corretas.
                $this->db->insert('purchaser', $purchaser);
                $this->db->insert('itens', $itens);
                $this->db->insert('merchants', $merchants);

                //Selecionando o ultimo id_purchase inserido, para que ele seja atribuido a tabela cart.
                $this->db->select('id_purchase');
                $this->db->order_by('id_purchase', 'desc');
                $this->db->limit(1);
                $query = $this->db->get('purchaser');
                
                foreach($query->result()[0] as $value){
                    $id_purchase = $value;
                }
                
                //Selecionando o ultimo id_item inserido, para que ele seja atribuido a tabela cart.
                $this->db->select('id_item');
                $this->db->order_by('id_item', 'desc');
                $this->db->limit(1);
                $query = $this->db->get('itens');
                
                foreach($query->result()[0] as $value){
                    $id_item = $value;
                }
                
                //Selecionando o ultimo id_merchant inserido, para queele seja atribuido a tabela cart.
                $this->db->select('id_merchant');
                $this->db->order_by('id_merchant', 'desc');
                $this->db->limit(1);
                $query = $this->db->get('merchants');
                
                foreach($query->result()[0] as $value){
                    $id_merchant = $value;
                }
                 
                //Atribuindo as informaçoes selecionadas na tabela cart.
                $this->db->set('id_purchase', $id_purchase);
                $this->db->set('id_item', $id_item);
                $this->db->set('id_merchant', $id_merchant);
                $this->db->insert('cart'); 
                
                //Para evitar um numero grande de laços, ao inves de somar +1 no contador, e somado +7,
                //Essa liberdade se da pelo fato de sempre ter o mesmo numero de colunas no arquivo.
                $cont +=7;
            }
        }else{
            echo 'não tem conteudo';
        }
        
        redirect(base_url(''));
    }
    
    public function listCart(){
        $query = $this->db->get('cart');
        $data = NULL;
        if($query){
            foreach($query->result() as $value){
                $query2 = $this->db->get_where('purchaser', array('id_purchase' => $value->id_purchase));
                foreach($query2->result() as $v){
                    $data[$value->id_cart]['name_purchase'] = $v->name_purchase;
                }

                $query2 = $this->db->get_where('itens', array('id_item' => $value->id_item));
                foreach($query2->result() as $v){
                    $data[$value->id_cart]['description'] = $v->description;
                    $data[$value->id_cart]['price'] = $v->price;
                    $data[$value->id_cart]['count_item'] = $v->count_item;
                }

                $query2 = $this->db->get_where('merchants', array('id_merchant' => $value->id_merchant));
                foreach($query2->result() as $v){
                    $data[$value->id_cart]['name_merchant'] = $v->name_merchant;
                    $data[$value->id_cart]['address'] = $v->address;
                }
            }
            if($data != NULL){
                return $data;
            }
        }
    }
}
