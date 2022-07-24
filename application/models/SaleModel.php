<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
		class SaleModel extends CI_Model{
			function __construct(){
				parent:: __construct();
			}
		// Add Sale in Database
			function add($arr){
				$query = $this->db->insert('sale',$arr);
				return $query;
		 	// return $this->db->insert('vendor',$arr);
			}

			// view Sale from database
			function view(){
				$query = $this->db->get('sale');
				return $query->result();
			}

			// delete Sale 

			function delete($id){
				$query = $this->db->delete('sale',array('id' => $id));
				return $query;

				 // return $this->db->delete('purchase', array('id' => $id));
			}
			// Edit Sale

			function edit($id, $arr){
				$this->db->where('id', $id);
				$this->db->update('sale', $arr);
			}

			// View Single Sale
			function sale($id)
			{
				$this->db->where('id', $id);
				$query = $this->db->get('sale');
				return $query->result();
			}
			
	 }
		
?>