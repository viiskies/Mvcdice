<?php

class Auth extends Controller
{

    protected $msg = [];

    public function index()
    {
        $this->loginForm();
    }

    public function regForm()
    {
        $data['messages'] = $this->msg;
        $data['title'] = "Registration Form";
        $this->view("auth/regForm", $data);
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
                $this->msg[] = ['type' => 'danger', 'body' => 'This username is registered. Choose another.'];
                $this->regForm();
            }

        } else {
            $this->msg[] = ['type' => 'warning', 'body' => 'No user data to submit'];
            $this->regForm();
        }
    }

    public function loginForm()
    {
        $data['messages'] = $this->msg;
        $data['title'] = "Login Form";
        $this->view("auth/loginForm", $data);
    }


    public function login()
    {
        // after registration jump straight into page
        if (isset($_SESSION['username'])) {


        	// Dice method play
            header('Location: dice/play');
            die();
        }

        if (isset($_POST['username']) && $_POST['password'] != "") {

            $user = $this->model('User');
            $response = $user->getUserPass($_POST['username']);

            $hash = $response['password'];
            $password = $_POST['password'];

            if (password_verify($password, $hash)) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['last_login'] = date("Y-m-d H:m:s");

                $data['title'] = 'Dice game';
                $this->view('dice/play', $data);

            } else {
                $this->msg[] = ['type' => 'danger', 'body' => "Can't authenticate you. <br> Please try again!"];
                $this->loginForm();
            }
        } else {
            $this->msg[] = ['type' => 'danger', 'body' => 'Please fill in username and password'];
            $this->loginForm();
        }
    }


    public function logout()
    {
        session_destroy();
        $_SESSION = null;

        $this->msg[] = ['type' => 'success', 'body' => 'Logged out'];
        $this->loginForm();
    }
}