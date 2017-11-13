<?php
class Auth extends Controller {

	protected $msg = [];

	public function regForm()
	{
		$data['title'] = "Registration Form";
		$this->view("regForm", $data);
	}

	public function reg()
	{
		if (isset($_POST['username']) && $_POST['username'] != "" && $_POST['password'] != "" && $_POST['repeatPassword'] != "") {
			$user = $this->model('User');
			$response = $user->getUser($_POST['username']);

			if (empty($response)) {
				if ($_POST['password'] == $_POST['repeatPassword']) {
					$password_h = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->addUser($_POST['name'], $_POST['username'], $password_h);

					$this->msg[] = ['type' => 'success', 'body' => 'User was added'];

					$this->loginForm();

				} else {
					$this->msg[] = ['type' => 'danger', 'body' => 'Passwords don\'t match.'];
					$this->regForm();
				}

			} else {
				$response['message'] = ['type' => 'danger', 'body' => 'This username is already registered. Choose another.'];
				$this->regForm();
			}

		} else {
			$response['message'] = ['type' => 'warning', 'body' => 'No user data to submit'];
			$this->regForm();
		}
	}

	public function loginForm()
	{
		$data['messages'] = $this->msg;
		$data['title'] = "Login Form";
		$this->view("loginForm", $data);
	}


	public function login()
	{
        // after registration jump straight into page
		if (isset($_SESSION['username'])) {
			die();
			header('Location: dice/play');
			exit;
		}

		if (isset($_POST['username']) && $_POST['password'] != "") {

			$user = $this->model('User');
			$response = $user->getUserPass($_POST['username']);

			$hash = $response['password'];
			$password = $_POST['password'];

			if (password_verify($password, $hash) ) {
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['last_login'] = date("Y-m-d H:m:s");
				// die();
				// header('Location: dice/play');
				$data['title'] = 'Dice game';
				$this->view('dice/play', $data);

                    // setcookie("sausainis_username", $response['username'], time() + (60*60*24), "/");
			} else {

				$this->msg[] = ['type' => 'danger', 'body' => 'cant login.'];
				$this->loginForm();

			}
		} else {
			$this->msg[] = ['alert'];
			$this->loginForm();
		}
	}


	public function logout() {

		session_destroy();
		$_SESSION = null;

		$this->msg[] = ['type' => 'success', 'body' => 'Logget out'];
		$this->loginForm();
	}
}