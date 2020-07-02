<?php
class Shop extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
          //Load cart library
		$this->load->library('cart');
        //Load product model
		// $this->load->model('Shop');
    }

    public function index() {
    	$data=array();
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status', 1);
		$this->db->order_by('name', 'asc');
		$query=$this->db->get();
		$data['products']=$query->result_array();
        $this->load->view('Shop/Home',$data);
    }

    public function addToCart($prodId){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('status', 1);
		$this->db->where('id', $prodId);
		$query=$this->db->get();
		$product=$query->row_array();
		// $product=$this->Product->getRows($prodId);
        //Add Products To The Cart
		$data = array(
			'id' => $product['id'],
			'qty' => 1,
			'price' => $product['price'],
			'name' => $product['name'],
			'image' => $product['image']
		);

		$data=$this->cart->insert($data);
		// print_r($data);
		// exit;

        //Redirect the cart page
		redirect('Shop');
	}
}
?>

