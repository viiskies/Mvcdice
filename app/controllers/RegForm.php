<?php

class RegForm extends Controller {

	public function index() {
		$data['title'] = "CA Dice Game";
        $data['header'] = "User List";
        $data['body'] = "Here we have a list of our players";

        $this->view("regForm", $data);
	}
}