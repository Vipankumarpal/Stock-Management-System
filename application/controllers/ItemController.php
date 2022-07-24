<?php 
	defined ('BASEPATH') OR exit('This is Not Running');
	//hello its amol
		class ItemController extends My_Controller{
			function __construct(){
				parent:: __construct();
			}

				// Add Item
				function add(){
				$post=$this->input->post();
				// echo 'This IS Running';
				 $this->form_validation->set_rules('item', 'Item', 'required|regex_match[/^[a-zA-Z\s]*$/]');
				 if ($this->form_validation->run()){
				 	// echo 'Running';
				 	$this->ItemModel->add($post);
					$this->StockModel->add($post);
					$this->session->set_flashdata('msg', "Add Item Successfully");
				 	redirect(base_url('add-item'));
				 }else{
				 	$data['template'] = 'item/add';
				 	$this->load->view('layout', $data);
				 }
					
				}
				
				// View Items

				function view(){

					$data['items']= $this->ItemModel->view();
					$data['template'] = 'item/index';
				 	$this->load->view('layout', $data);
				}

				// Delete Item
				function delete($id){
					// echo 'Deleted'. $id;
					$this->ItemModel->delete($id);
					$this->StockModel->delete($id);
					redirect(base_url('items'));
				}

				function image(){
					if($this->input->post('submit') )
					{
						$config['upload_path']          = './images/';
						$config['allowed_types']        = 'gif|jpg|png|jpeg';
						$config['max_size']             = 100;
						$config['max_width']            = 1024;
						$config['max_height']           = 768;
						$config['file_name']           = time() . $_FILES['photo']['name'];

						$this->load->library('upload', $config);

						if ( ! $this->upload->do_upload('photo'))
						{
								$data['error'] = array('error' => $this->upload->display_errors());
								$data['template'] = 'item/image';
								$this->load->view('layout', $data);
						}
						else
						{
								$data['success'] = array('upload_data' => $this->upload->data());
								$data['template'] = 'item/image';
								$this->load->view('layout', $data);
						}
					}
					else
					{
						echo "upload a file";
						$data['template'] = 'item/image';
						$this->load->view('layout', $data);
					}
				}

				// Update Function
				function edit($id){										
					$this->form_validation->set_rules('item', 'Item', 'required|regex_match[/^[a-zA-Z\s]*$/]');
					if ($this->form_validation->run()){
						// echo 'Running';
						$this->ItemModel->edit($id, $this->input->post());
						$this->StockModel->edit($id, $this->input->post());
						$this->session->set_flashdata('msg', "Update Item Successfully");
						redirect(base_url('edit-item/'.$id));
					}else{
						$data['item'] = $this->ItemModel->item($id);
						$data['template'] = 'item/edit';
						$this->load->view('layout', $data);
					}
				}

			}
		?>