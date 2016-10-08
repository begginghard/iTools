<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {



	/**
	 * Index Page for this controller
	 */
	public function ct() {
		$url = '/json/index.html';
		header("Location:{$url}");
	}



}
