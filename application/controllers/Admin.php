<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	public function editor(){
		$this->load->helper('url');
        $this->load->view('html/admin/editor');
	}
	public function submitEditor(){
        ob_start();
	    $content =  $_POST['content'];
	    echo $content;
	    $out1 = ob_get_contents();
        ob_end_clean();
        $fp = fopen("/var/www/iTools/static/test3.html","w");
        if(!$fp)
        {
        echo "System Error";
        exit();
        }
        else
        {
        fwrite($fp,$out1);
        fclose($fp);
        echo "Success";
        }


	}


}
