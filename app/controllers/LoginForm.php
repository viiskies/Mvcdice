<?php

class LoginForm extends Controller
{

    public function index()
    {
        $data['title'] = "Login Form";


        $this->view("loginForm", $data);
    }
}