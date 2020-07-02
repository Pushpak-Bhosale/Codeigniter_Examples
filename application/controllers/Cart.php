<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        // $this->load->model('Product');
    }

    public function index()
    {
        $data=array();
        $data['cartItems']=$this->cart->contents();
        $this->load->view('Shop/details', $data);
    }

    public function updateItemQty(){
        $update = 0;
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');
        if (!empty($rowid) && !empty($qty)) {
            $data = array(
                'rowid' => $rowid,
                'qty' => $qty
            );
            $update=$this->cart->update($data);
        }
        echo $update?'ok':'err';
    }

    public function removeItem($rowid){
    	$this->cart->remove($rowid);
    	redirect('cart');
    }

}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */