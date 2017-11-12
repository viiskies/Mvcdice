<?php

class Home extends Controller
{

    public function index()
    {

        $data['title'] = "CA Dice Game";
        $data['header'] = "CA Dice Game";
        $data['body'] = "This is the best game!";

        $this->view("dice/play", $data);
    }
}