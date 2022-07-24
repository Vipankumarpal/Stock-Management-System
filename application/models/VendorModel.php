

<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
		class VendorModel extends CI_Model{
			function __construct(){
				parent:: __construct();
			}
		// Add Vendor In Database
			function add($arr){
				// print_r($arr);
				// die();
				// echo '<pre>';
				// var_dump($this->db->get_where('vendor', array('contact'=>$arr['contact']))->result_id->num_rows  ); die();
			if( $this->db->get_where('vendor', array('contact'=>$arr['contact']))->result_id->num_rows ){
				
				$this->session->set_flashdata('msg', "Contact Already Exist..!");

              	redirect(base_url('add'));
              
				}else{
					return $this->db->insert('vendor',$arr);
				}
				
			}

		 	


			// fetch Vendor From Database
			 function view(){
			 	 // $this->db->order_by("name", "desc");
			 	$query = $this->db->get('vendor');
				return $query->result();
			 }

			 // Delete Vendor
			 function delete($id){
				return $this->db->delete('vendor', array('id' => $id));
			} 
			// Update Vendor 
			function edit($id, $arr){
				$this->db->where('id', $id);
				$this->db->update('vendor', $arr);
			}

			// get Single Vendor
			function vendor($id)
			{
				$this->db->where('id', $id);
				$query = $this->db->get('vendor');
				return $query->result();
			}

			// Count vendors
			function count(){
				$query = $this->db->count_all('vendor');
				return $query;
			}
	 }
		
?>