<?php 
	defined('BASEPATH') OR exit('This is not Running');
	class PurchaseController extends My_Controller{
		function __construct(){
		parent:: __construct();
		}


		// Add Purchase 
		function add(){
			$data['vendors']= $this->VendorModel->view();
			$data['items']= $this->ItemModel->view();
				$post=$this->input->post();
				// echo 'This IS Running';
				 $this->form_validation->set_rules('vendor', 'VendorName', 'required');
				 $this->form_validation->set_rules('item', 'ItemName', 'required');
				 $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
				 $this->form_validation->set_rules('price', 'Price', 'required|numeric');
				 if ($this->form_validation->run()){
				 	// echo 'Running';
				 	$this->PurchaseModel->add($post);
				 	$this->StockModel->add_item($post);
				 	$this->session->set_flashdata('msg', "Add Purchase Successfully");
				 	redirect(base_url('add-purchase'));
				 }else{
				 	$data['template'] = 'purchase/add';
				 	$this->load->view('layout', $data);
				 }
					
				}

		// View Purchase
				function view(){
					$data['purchase']= $this->PurchaseModel->view();

					$data['template'] = 'purchase/index';
				 	$this->load->view('layout', $data);
				}

		// Delete Purchase

				function delete($id){
					$this->PurchaseModel->delete($id);
					redirect(base_url('purchase'));
				}

		// Edit Purchase
				function edit($id){	
				$post= $this->input->post();									
				 $this->form_validation->set_rules('vendor', 'VendorName', 'required');
				 $this->form_validation->set_rules('item', 'ItemName', 'required');
				 $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
				 $this->form_validation->set_rules('price', 'Price', 'required|numeric');
					if ($this->form_validation->run()){
						// echo 'Running';
						$this->PurchaseModel->edit($id, $post);
						$this->session->set_flashdata('msg', "Update Purchase Successfully");
						redirect(base_url('edit-purchase/'.$id));
					}else{
						$data['purchase'] = $this->PurchaseModel->purchase($id);
						$data['template'] = 'purchase/edit';
						$this->load->view('layout', $data);
					}
				}
	}

?>