<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
		class ItemModel extends CI_Model{
			function __construct(){
				parent:: __construct();
			}
		// Add Item In Database
			function add($arr){

				// print_r($arr);
				// die();
				// echo '<pre>';
				// var_dump($this->db->get_where('item', array('item'=>$arr['item']))->result_id->num_rows  ); die();
			if( $this->db->get_where('item', array('item'=>$arr['item']))->result_id->num_rows ){
				$query = $this->db->get_where('item', array('item'=>$arr['item']));
				$query = $query->result();
				$query = current($query);
				// $arr['stock'] = $arr['stock'] + $query->stock;
				// $arr['stock'] = $arr['stock'] - $query->stock;
				return $this->db->update('item',$arr, array('id'=> $query->id));
				
			}else{
				return $this->db->insert('item',$arr);
			}

		 	// return $this->db->insert('item',$arr);
			}

			// fetch Items From Database
			 function view(){
			 	// $this->db->order_by("item", "asc");
			 	$query = $this->db->get('item');
				return $query->result();
			 }

			 // Delete Item
			 function delete($id){
				return $this->db->delete('item', array('id' => $id));
			}

			// Update Item 
			function edit($id, $arr){
				$this->db->where('id', $id);
				$this->db->update('item', $arr);
			}

			// get Single Item
			function item($id)
			{
				$this->db->where('id', $id);
				$query = $this->db->get('item');
				return $query->result();
			}

	 }
		
?>