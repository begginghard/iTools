  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Regex extends CI_Controller {
      public function index() {
          $this->load->helper('url');
          $this->load->view('html/tools/regex');
      }
  }
  ?>