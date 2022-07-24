<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
class StockModel extends CI_Model{
    function __construct(){
        parent:: __construct();
    }
    function add($arr){

        // echo '<pre>';
        // print_r($arr);
        // die();
        // var_dump($this->db->get_where('item', array('item'=>$arr['item']))->result_id->num_rows  ); die();
    if( $this->db->get_where('stock', array('item'=>$arr['item']))->result_id->num_rows ){
        $query = $this->db->get_where('stock', array('item'=>$arr['item']));
        $query = $query->result();
        $query = current($query);
        // $arr['stock'] = $arr['stock'] + $query->stock;
        // $arr['stock'] = $arr['stock'] - $query->stock;
        return $this->db->update('stock',$arr, array('id'=> $query->id));
        
    }else{
        return $this->db->insert('stock',array(
            'item'=> $arr['item'],
            'stock'=>0
        ));
    }
    }

    // Add Items In Stock table
    public function add_item($arr)
    {
        $stock = $this->db->get_where('stock', array('item' => $arr['item']))->result()[0]->stock;
        if( $stock !== false ){

            $data = array(
                'stock' => $arr['quantity']+$stock
            );
        
            $this->db->where('item', $arr['item']);
            $this->db->update('stock', $data);
        
        }
    }

    // Subtract item from Stock table
        public function sub_item($arr)
    {
        $stock = $this->db->get_where('stock', array('item' => $arr['item']))->result()[0]->stock;
        if( $stock !== false ){

            $data = array(
                'stock' => $stock-$arr['quantity']
            );
        
            $this->db->where('item', $arr['item']);
            $this->db->update('stock', $data);
        
        }
    }

    // fetch Items From Database
     function view(){
        // $this->db->order_by("item", "asc");
        $query = $this->db->get('stock');
      
        return $query->result();
     }

    // Update Item 
            function edit($id, $arr){
                $this->db->where('id', $id);
                $this->db->update('stock', $arr);
            }

    // Delete Item
     function delete($id){
        return $this->db->delete('stock', array('id' => $id));
    }

}
