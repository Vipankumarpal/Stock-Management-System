<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
	//hello its amol
		class VendorController extends My_Controller{
			function __construct(){
				parent:: __construct();
			}

				// Add Vendor
				function add(){
				$post=$this->input->post();
				// echo 'This IS Running';
				 $this->form_validation->set_rules('name', 'Username', 'required|regex_match[/^[a-zA-Z\s]*$/]|is_unique[vendor.name]',
					array('is_unique'=> '%s Already Exists')
					);
				 $this->form_validation->set_rules('address', 'Address', 'required');
				 $this->form_validation->set_rules('contact', 'Contact', 'required|numeric|is_unique[vendor.contact]|min_length[10]|max_length[10]',
					array('is_unique'=> '%s Already Exists')	
				);

				 if ($this->form_validation->run()){
				 	// echo 'Running';
				 	$this->VendorModel->add($post);
				 	$this->session->set_flashdata('msg', "Add Vendor Successfully");
				 	redirect(base_url('add-vendor'));
				 }else{
				 	$data['template'] = 'vendor/add';
				 	$this->load->view('layout', $data);
				 }
					
				}

				function view(){
					$data['vendors']= $this->VendorModel->view();
					$data['template'] = 'vendor/index';
				 	$this->load->view('layout', $data);
				}

				// Delete Vendor
				function delete($id){
					// echo 'Deleted'. $id;
					$this->VendorModel->delete($id);
					redirect(base_url('vendors'));
				}

				function edit($id){										
					$this->form_validation->set_rules('name', 'Username', 'required');
					$this->form_validation->set_rules('address', 'Address', 'required');
					$this->form_validation->set_rules('contact', 'Contact', 'required|numeric');
					if ($this->form_validation->run()){
						// echo 'Running';
						$this->VendorModel->edit($id, $this->input->post());
						$this->session->set_flashdata('msg', "Update Vendor Successfully");
						redirect(base_url('edit-vendor/'.$id));
					}else{
						$data['vendor'] = $this->VendorModel->vendor($id);
						$data['template'] = 'vendor/edit';
						$this->load->view('layout', $data);
					}
				}

				

			}
		?>