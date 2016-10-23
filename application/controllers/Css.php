<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Css extends CI_Controller {
    public function index(){
    	$this->load->helper('url');
    	$this->load->view('html/tools/css');
    }

    public function compress() {
        $css = $_POST['css'];
        /* remove comments */
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        /* remove tabs, spaces, newlines, etc. */
        $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
        echo $css;
    }
}
?>