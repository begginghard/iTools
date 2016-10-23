<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'jsmin.php';

class Js extends CI_Controller {
    public function index(){
    	$this->load->helper('url');
    	$this->load->view('html/tools/js');
    }

    public function compress() {
        $js = $_POST['js'];
        echo JSMin::minify($js);
    }
}
?>