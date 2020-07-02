<?php


class Examples extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('Examplesmodel');
		$this->load->library('encrypt');
		$this->load->library('encryption');
	}

	public function index() {
		$this->load->view('header');
		$this->load->view('Examples/Encryption');
		$this->load->view('footer');

	}

	public function dropdown(){
		$data['country'] = $this->Examplesmodel->fetch_country();
		$this->load->view('header');
		$this->load->view('Examples/Dropdown',$data);
		$this->load->view('footer');
	}

	public function fetch_state(){
		if($this->input->post('country_id'))
		{
			echo $this->Examplesmodel->fetch_state($this->input->post('country_id'));
		}

	}

	public function fetch_city(){
		if($this->input->post('state_id'))
		{
			echo $this->Examplesmodel->fetch_city($this->input->post('state_id'));
		}
	}

	public function key_encoder() {
		$key=$this->input->post('key');
		$data['encrypt_value'] = $this->encrypt->encode($key);
		$this->load->view('header');
		$this->load->view('Examples/Encryption', $data);
		$this->load->view('footer');
	}

	public function key_decoder() {
		$encrypt_key=$this->input->post('encrypt_key');
		$data['decrypt_value'] = $this->encrypt->decode($encrypt_key);
		$this->load->view('header');
		$this->load->view('Examples/Encryption', $data); 
		$this->load->view('footer');

	}

	public function useragent() {
		$this->load->library('user_agent');
		$data['browser']=$this->agent->browser();
		$data['browser_version']=$this->agent->version();
		$data['os']=$this->agent->platform();
		$data['en']=$this->agent->accept_lang();
		$data['ip_address']=$this->input->ip_address();
		$this->load->view('header');
		$this->load->view('Examples/Useragent', $data);
		$this->load->view('footer');
	}
}
?>

<!-- /* End of file Login.php */
/* Location: ./application/controllers/Login.php */ -->