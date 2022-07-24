<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
		class PurchaseModel extends CI_Model{
			function __construct(){
				parent:: __construct();
			}
		// Add Purchase in Database
			function add($arr){
				$query = $this->db->insert('purchase',$arr);
				return $query;
		 	// return $this->db->insert('vendor',$arr);
			}

			// view purchase from database
			function view(){
				// $this->db->order_by("vendor", "asc");
				$query = $this->db->get('purchase');
				return $query->result();
			}

			// delete Purchase 

			function delete($id){
				$query = $this->db->delete('purchase',array('id' => $id));
				return $query;

				 // return $this->db->delete('purchase', array('id' => $id));
			}
			// Edit Purchase

			function edit($id, $arr){
				$this->db->where('id', $id);
				$this->db->update('purchase', $arr);
			}

			// View Single Purchase
			function purchase($id)
			{
				$this->db->where('id', $id);
				$query = $this->db->get('purchase');
				return $query->result();
			}
			
	 }
		
?>