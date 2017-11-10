<?php

class Reg extends Controller {

	public function index() {
		if(isset($_POST['name']) && $_POST['name'] != "" && $_POST['password'] != "" && $_POST['repeatPassword'] != "") {

			try {
				$user = $this->model('User');
				$response = $user->getUser($_POST['username']);

				if(empty($response)) {
					if ($_POST['password'] == $_POST['repeatPassword']) {

						$user->addUser($_POST['name'],$_POST['username'],$_POST['password']);

						$response['message'] = ['type' => 'success','body' => 'User was added'];

						// die();
						header("Location: dice/play");
					} else {
						$response['message'] = ['type' => 'danger', 'body' => 'Passwords don\'t match.'];
						$conn = null;
					}

				} else {
					$response['message'] = ['type' => 'danger', 'body' => 'This username is already registered. Choose another.'];
					$conn = null;
				}

			} catch(PDOException $e) {
				$response['message'] = ['type' => 'danger','body' => $e->getMessage()];
			}
		} else {
			$response['message'] = ['type' => 'warning','body' => 'No user data to submit'];
		} 


	}
}