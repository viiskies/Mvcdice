<?php

class Stats extends Controller
{
    public function index()
    {

        $data['title'] = "Dice Game Stats";
        $data['header'] = "Stats";
        $data['body'] = "This is game stats!";

        $game = $this->model('Game');
        $data['games'] = $game->getTopWinners(3);

        $this->view("stats/index", $data);
    }

    public function top()
    {

        $data['title'] = "Dice Game Stats";
        $data['header'] = "Top players";
        $data['body'] = "Here we have a list of our players";

        $this->view("stats/top", $data);
    }
}