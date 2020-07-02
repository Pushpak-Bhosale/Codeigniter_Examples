<?php


class Admin extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if(! $this->session->userdata('id'))
			return redirect('Login/index');

		
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect ('Login/index');
	}

	public function welcome()
	{
		$this->load->model('Loginmodel','ar');
		$this->load->library('pagination');

		$config=[
			'base_url' => base_url('Admin/welcome'),
			'per_page' =>3,
			'total_rows' => $this->ar->num_rows(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'next_tag_open' =>"<li>",
			'next_tag_close' =>"</li>",
			'prev_tag_open' =>"<li>",
			'prev_tag_close' =>"</li>",
			'num_tag_open' =>"<li>",
			'num_tag_close' =>"<li>",
			'cur_tag_open' =>"<li class='active'><a>",
			'cur_tag_close' =>"</a></li>"

		];


		$this->pagination->initialize($config);

		
		$articles=$this->ar->articleList($config['per_page'],$this->uri->segment(3));
		$this->load->view('Admin/dashboard',['articles'=>$articles]);
	}


	// public function welcome()
	// {
	
	// 	$this->load->model('Loginmodel','ar');
	// 	$this->load->library('pagination');
	// 	 $config=[
	// 	       'base_url' => base_url('Admin/welcome'),
	// 	       'per_page' =>2,
	// 	       'total_rows' => $this->ar->num_rows(),

	// 	];
	// 	$this->pagination->initialize($config);

	// 	$articles=$this->ar->articleList($config['per_page'],$this->uri->segment(3));
	// 	$this->load->view('Admin/dashboard',['articles'=>$articles]);
	
	// }

	public function userValidation()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '2000';
		$config['max_height']  = '2000';
		
		$this->load->library('upload', $config);
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>'); 
		if($this->form_validation->run('add_article_rules') && $this->upload->do_upload())
		{
			$post=$this->input->post();
			$data=$this->upload->data();
			$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
			$post['image_path']=$image_path;
			$this->load->model('Loginmodel','useradd');
			if($this->useradd->add_articles($post))
			{
				$this->session->set_flashdata('msg','Article Added Successfully');
				$this->session->set_flashdata('msg_class','alert-success');
				
			}
			else
			{
				$this->session->set_flashdata('msg','Article Not Added Successfully');
				$this->session->set_flashdata('msg_class','alert-danger');
			}
			return redirect('Admin/welcome');
			
		}
		else
		{
			$upload_error=$this->upload->display_errors();
			$this->load->view('Admin/add_article',compact('upload_error'));
		}
		
	}

	public function adduserarticle()
	{
		$this->load->view('Admin/add_article');
	}

	public function editarticle($id)
	{
		$this->load->model('Loginmodel');
		$article=$this->Loginmodel->find_article($id);
		$this->load->view('Admin/edit_article',['article'=>$article]);
	}

	public function updatearticle($article_id)
	{
		if($this->form_validation->run('add_article_rules'))
		{
			$post=$this->input->post(); 
	      //$articleid=$post['article_id'];
	      //unset($articleid);
			$this->load->model('loginmodel','editupdate');
			if($this->editupdate->update_article($article_id,$post))
			{
				$this->session->set_flashdata('msg','Article Update successfully');
				$this->session->set_flashdata('msg_class','alert-success');
			}
			else
			{
				$this->session->set_flashdata('msg','Articles not update Please try again!!');
				$this->session->set_flashdata('msg_class','alert-danger');
			}
			return redirect('admin/welcome');
		}
		else
		{
			$this->editarticle($article_id);
		}

	}

	public function delarticles()
	{
		$id=$this->input->post('id');
		
		$this->load->model('Loginmodel','delarticle');
		if($this->delarticle->del($id))
		{
			$this->session->set_flashdata('msg','Article Deleted Successfully');
			$this->session->set_flashdata('msg_class','alert-success');
		}
		else
		{
			$this->session->set_flashdata('msg','Please try again..not delete');
			$this->session->set_flashdata('msg_class','alert-danger');
		}
		return redirect('admin/welcome');

	}

	


}
?>

<!-- /* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */ -->