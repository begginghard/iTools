<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MdCode extends CI_Controller {
    public function encode() {
        $encryption = $_POST['encryption'];
        $val = $_POST['val'];
        $md5Res = "";
        if ($val) {
            $md5Res = md5($val);
        }

        if ($encryption == 1) {
            echo $md5Res;
        } else if ($encryption == 2) {
            echo substr($md5Res, 8, 16);
        } else {
            echo "加密方法选择32位或16位";
        }
    }


}
