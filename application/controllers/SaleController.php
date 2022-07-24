<?php
	defined('BASEPATH') or exit('Script is not running');
	class SaleController extends My_controller{
			function __construct(){
				parent:: __construct();
			}

			// Add Sale
			function add(){
				$data['items']= $this->ItemModel->view();
				$post=$this->input->post();
				// echo 'This IS Running';
				 $this->form_validation->set_rules('item', 'ItemName', 'required');
				 
				$this->form_validation->set_rules('quantity', 'Quantity', 'required');

				 $this->form_validation->set_rules('price', 'Price', 'required|numeric');
				 if ($this->form_validation->run()){
				 	// echo 'Running';
				 	$this->SaleModel->add($post);
				 	$this->StockModel->sub_item($post);
				 	$this->session->set_flashdata('msg', "Add Sale Successfully");
				 	redirect(base_url('add-sale'));
				 }else{
				 	$data['template'] = 'sale/add';
				 	$this->load->view('layout', $data);
				 }


			}

			// View Sale

			function view(){
				$data['sale']= $this->SaleModel->view();

				$data['template'] = 'sale/index';
			 	$this->load->view('layout', $data);
			}

			// Delete Sale
			function delete($id){
				$this->SaleModel->delete($id);
					redirect(base_url('sale'));
			}

			// Edit Sale
			function edit($id){
				$post=$this->input->post();
				// echo 'This IS Running';
				 $this->form_validation->set_rules('item', 'ItemName', 'required');
				 $this->form_validation->set_rules('quantity', 'Quantity', 'required|numeric');
				 $this->form_validation->set_rules('price', 'Price', 'required|numeric');
				 if ($this->form_validation->run()){
				 	// echo 'Running';
				 	$this->SaleModel->edit($id , $post);
				 	$this->session->set_flashdata('msg', "Update Sale Successfully");
				 	redirect(base_url('edit-sale/'.$id));
				 }else{
				 	$data['sale'] = $this->SaleModel->sale($id);
				 	$data['template'] = 'sale/edit';
				 	$this->load->view('layout', $data);
				 }
			}
	}

?>