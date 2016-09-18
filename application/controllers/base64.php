<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class base64 extends CI_Controller {
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
