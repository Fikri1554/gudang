<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	// public function index()
	// {
	// 	$this->load->view('login');
	// }
	public function index()
	{
		$this->load->view('menu');
	}
}
