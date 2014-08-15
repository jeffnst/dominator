<?php

class Nensyatter extends CI_Controller
{

	/** @var User_model */
	public $user;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->user->set_check_login('nn');
	}

	public function index()
	{
		$user = $this->user->get_user();
		$meta = new Metaobj();
		$meta->setup_yopparatter();
		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$messages = array();
		if (($err = $this->session->userdata('err')))
		{
			$this->session->unset_userdata('err');
			$messages[] = $err;
		}
		if (($posted = $this->session->userdata('posted')))
		{
			$this->session->unset_userdata('posted');
			$messages[] = $posted;
		}

		$this->load->view('navbar', array('meta' => $meta, 'user' => $user));
		$this->load->view('alert', array('messages' => $messages));
		$this->load->view('yopparatterform', array('token' => $this->_set_token(), 'is_login' => !!$user));
		$this->load->view('yopparatterfoot');
	}
}