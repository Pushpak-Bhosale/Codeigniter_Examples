<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function index()
	{
		if ($this->cart->total_items() <= 0 ) {
			redirect('products');
		}
		$custData=$data=array();
		$submit=$this->input->post('placeorder');
		if(isset($submit)){
			print_r($this->input->post());
		}
		$data['custData'] = $custData;
		$data['cartItems'] = $this->cart->contents();
		$this->load->view('Shop/checkout', $data);
	}

	public function checkoutdetails() {
		print_r($this->input->post());
		$data=$this->input->post();
		$insert=$this->db->insert('customers', $data);
		$id=$insert?$this->db->insert_id():false;
		print_r($id);
		if($id) {
			$order = $this->placeorder($id);
			if($order) {
				$this->session->set_userdata('success_msg','Order Placed Successfully.');
				redirect('Checkout/orderSuccess/'.$order);
			}
			else {
				$data['error_msg'] = 'Order Submisson Failed Please Try Again';
			}
		}
		else {
			$data['error_msg'] = 'Some Problems Occured Please Try Again';
		}

	}

	public function placeorder($custid) {
		$ordData = array (
			'customer_id' => $custid,
			'grand_total'=> $this->cart->total(),
			'created'=> date("Y-m-d H:i:s"),
			'modified'=> date("Y-m-d H:i:s")
		);
		$insertOrder = $this->db->insert('orders', $ordData);
		$id=$insertOrder?$this->db->insert_id():false;
		if($id) {
			$cartItems = $this->cart->contents();
			$ordItemData = array();
			$i=0;
			foreach ($cartItems as $items) {
				$ordItemData[$i]['order_id'] = $id;
				$ordItemData[$i]['product_id'] = $items['id'];
				$ordItemData[$i]['quantity'] = $items['qty'];
				$ordItemData[$i]['sub_total'] = $items['subtotal'];
				$i++;
			}
			if (!empty($ordItemData)) {
    			# code...
				$insertOrderItems = $this->db->insert_batch('order_items', $ordItemData);
				if($insertOrderItems){
					$this->cart->destroy();
					return $id; 
				}

			}
		}
		return false;
	}

	public function orderSuccess($ordId) {
		print_r($ordId);
	}
}

/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */