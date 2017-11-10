<?php

class Login extends Controller {

	public function index() {
		$login_alert = false;

	// after registration jump straight into page
		if (isset($_SESSION['username'])) {
			$_POST['username'] = $_SESSION['username'];
			$_POST['password'] = $_SESSION['password'];
		}

		if (isset($_POST['username']) ) {

			try {

				$user = $this->model('User');
				$response = $user->getUserPass($_POST['username']);

				// print_r($response);
				// echo $response[0]['username'];
				// die();


			} catch(PDOException $e) { 
				echo $e->getMessage(); 
			}
			$hash = $response[0]['password'];
			$password = $_POST['password'];

			if ( password_verify($password, $hash) && $_POST['password'] != "") {

				$_SESSION['username'] = $_POST['username'];
				$_SESSION['last_login'] = date("Y-m-d H:m:s");

		// setcookie("sausainis_username", $response['username'], time() + (60*60*24), "/");

			} else {
				$login_alert = true;
			}


		} elseif (isset($_POST['logout'])) {

			session_destroy();
			$_SESSION = null;
		} 

		if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
			// die();
			header("Location: dice/play");
		} else {
	// echo "You are guest";
		}
	}

	public function logout() {}

}