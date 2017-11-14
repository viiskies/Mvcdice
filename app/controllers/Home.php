<?php

class Home extends Controller
{

    public function index()
    {

        $data['title'] = "CA Dice Game";
        $data['header'] = "CA Dice Game";
        $data['body'] = "This is the best game!";
        if (empty($_SESSION['username'])) {
            $this->view('auth/loginform', $data);
            die();
        }
        $this->view('dice/play', $data);
    }
}