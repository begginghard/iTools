<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base64 extends CI_Controller {
    public function index() {
        $this->load->helper('url');
        $this->load->view('html/tools/base64');
    }

    public function encode() {
        $val = $_POST['val'];
        if($val) {
            echo base64_encode($val);
        } else {
            echo "";
        }
    }

    public function decode() {
        $val = $_POST['val'];
        if($val) {
            echo base64_decode($val);
        } else {
            echo "";
        }
    }
}
