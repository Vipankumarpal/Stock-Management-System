<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
	//hello its amol
		class UserController extends My_Controller{
			function __construct(){
				parent:: __construct();
			}

			// Login Function Start Here
			function login(){
				  // echo 'running';
				//Login Input Form Data
				if( $this->session->has_userdata("name")){
					redirect(base_url("dashboard"));
					exit;
				}
				$input= $this->input->post();

				$this->form_validation->set_rules('name','Username','required|alpha|trim');
				$this->form_validation->set_rules('password','Password','required|trim');
				if($this->form_validation->run()){
					if($this->UserModel->islogin($input)){
						$this->session->set_userdata(
						array('name' =>$this->input->post('name')));
						redirect(base_url('dashboard'));
					}else{
						$this->session->set_flashdata('error', "Name or Password is Invalid");
					redirect('login');
					}

				}
				$this->load->view('users/login');
			}

			// Logout Function Start Here

			function logout(){
				$this->session->unset_userdata(
				array('name'));
				redirect(base_url('login'));
			}

			// Count Data From Database
			function stock(){
				// Stock View
				
				$data['items']= $this->StockModel->view();
				// End
				
				$data['count_data']= $this->UserModel->count();
				// $data['items']= $this->UserModel->count();
				// $data['purchase']= $this->UserModel->count();
				// $data['sale']= $this->UserModel->count();

				$data['template'] = 'users/dashboard';
			 	$this->load->view('layout', $data);
			}

			// View Items

				// function view(){
				// 	$data['items']= $this->StockModel->view();
				// 	$data['template'] = 'users/dashboard';
				//  	$this->load->view('layout', $data);
				// }

				
		}
?>