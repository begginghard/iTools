<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('html/tools/index');
	}
	public function ct(){
		$this->load->helper('url');
        $this->load->view('html/tools/ct');
	}

    public function regex() {
        $this->load->helper('url');
        $this->load->view('html/tools/regex');
    }

    public function urlcode(){
         $this->load->helper('url');
         $this->load->view('html/tools/urlcode');
    }

    public function basecode() {
        $this->load->helper('url');
        $this->load->view('html/tools/basecode');
    }

    public function mdcode() {
        $this->load->helper('url');
        $this->load->view('html/tools/mdcode');
    }
}
