<?php

class Logout extends Controller {

	public function index() {
		$data['title'] = "From logout";
        $data['header'] = "CA Dice Game";
        $data['guest'] = "true";
		session_destroy();
		$_SESSION = null;

		// header("Location: loginform");
		$this->view("loginform", $data);
		
	}
}