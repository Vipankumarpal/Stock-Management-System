<?php
class My_Controller extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		
		// Load Database
		$this->load->database();
		// Load Models
		$this->load->model('UserModel');
		$this->load->model('VendorModel');
		$this->load->model('ItemModel');
		$this->load->model('PurchaseModel');
		$this->load->model('SaleModel');
		$this->load->model('StockModel');
		
	}
}
?>
