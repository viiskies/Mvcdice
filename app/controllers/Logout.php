<?php

class Logout extends Controller {

	public function index() {
		$data['title'] = "From logout";
        $data['header'] = "CA Dice Game";
        $data['guest'] = "true";
//      session_start();
		session_destroy();
		$_SESSION = null;

        $this->view("loginform", $data);
        header("Location: loginform");

    }
}