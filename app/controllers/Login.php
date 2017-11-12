<?php

class Login extends Controller
{

    public function index()
    {


        // after registration jump straight into page
        if (isset($_SESSION['username'])) {
            header('Location: dice/play');
            exit;
        }

        if (isset($_POST['username'])) {

            try {

                $user = $this->model('User');
                $response = $user->getUserPass($_POST['username']);

                $hash = $response['password'];
                $password = $_POST['password'];

                if (password_verify($password, $hash) && $_POST['password'] != "") {
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['last_login'] = date("Y-m-d H:m:s");
                    // setcookie("sausainis_username", $response['username'], time() + (60*60*24), "/");
                } else {
                    $data['alert'] = 'cool';
                    $data['title'] = "Login Form";
                    $this->view("loginForm", $data);
                    exit;
                }


            } catch (PDOException $e) {
                echo $e->getMessage();
            }

        } elseif (isset($_POST['logout'])) {
            session_destroy();
            $_SESSION = null;
        }
        if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
//			 die();
            header("Location: dice/play");
        } else {
            header('Location: loginform');
        }
    }
}