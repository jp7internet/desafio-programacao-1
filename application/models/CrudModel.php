<?php


/**
 * Description of CrudModel
 *
 * @author jonathan
 */
class CrudModel extends CI_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function create($purchaser=NULL, $itens=NULL, $merchants=NULL){
        $this->db->insert('purchaser', $purchaser);
        $this->db->insert('itens', $itens);
        $this->db->insert('merchants', $merchants);
        
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
        
        redirect(base_url(''));
    }
    
    public function getById($id = NULL){
        if($id!=NULL){
            $this->db->where('id_cart',$id);
            $this->db->limit(1);
            $query = $this->db->get('cart');
            
            $data = NULL;
            if($query){
                foreach($query->result() as $value){
                    $query2 = $this->db->get_where('purchaser', array('id_purchase' => $value->id_purchase));
                    foreach($query2->result() as $v){
                        $data[$value->id_cart]['id_cart'] = $value->id_cart;
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
    public function update($purchaser=NULL, $itens=NULL, $merchants=NULL){
        $this->db->where('id_cart',$purchaser['id_cart']);
        $this->db->limit(1);
        $query = $this->db->get('cart');
        
        foreach ($query->result() as $value){
            $id_cart = $value->id_cart;
            $id_purchase = $value->id_purchase;
            $id_item = $value->id_item;
            $id_merchant = $value->id_merchant;
        }
        
        $this->db->where('id_purchase', $id_purchase);
        $this->db->set('name_purchase', $purchaser['name_purchase']);
        $this->db->update('purchaser');
        
        $this->db->where('id_item', $id_item);
        $this->db->update('itens', $itens);
        
        $this->db->where('id_merchant', $id_merchant);
        $this->db->update('merchants', $merchants);
        
        redirect('');
    }
    
    public function delete($id=NULL){
        $this->db->where('id_cart',$id);
        $this->db->limit(1);
        $query = $this->db->get('cart');
        
        foreach ($query->result() as $value){
            $id_cart = $value->id_cart;
            $id_purchase = $value->id_purchase;
            $id_item = $value->id_item;
            $id_merchant = $value->id_merchant;
        }
        
        $this->db->delete('cart', array('id_cart'=>$id_cart));
        $this->db->delete('purchaser', array('id_purchase'=>$id_purchase));
        $this->db->delete('itens', array('id_item'=>$id_item));
        $this->db->delete('merchants', array('id_merchant'=>$id_merchant));

        redirect('');
    }
}
