

<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
		class UserModel extends CI_Model{
			function __construct(){
				parent:: __construct();
			}

			// Login Function Start
			function islogin($arr){
					$query= $this->db->get_where('admin',
						array(
							'name'=> $arr['name'],
							'password' => $arr['password']
						)
				);
					 // print_r( $query->result() );
					if( empty( $query->result() ) ){
						return false;
					}else{
						return true;
					}
					
			}

			// Count vendors
			function count(){
			 	$query['vendors']= $this->db->count_all('vendor');
			 	$query['items']= $this->db->count_all('item');
			 	$query['purchases']= $this->db->count_all('purchase');
			 	$query['sales']= $this->db->count_all('sale');
			 	
				return $query;
			}	

	}
		
?>