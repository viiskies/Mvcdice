<?php

class Dice extends Controller {

	public function index() {
		//json all games
		header("Content-type:application/json");

		$game = $this->model('Game');
		$result = $game->getAllGames();

		echo json_encode($result);
	}

	public function myGames() {
		header("Content-type:application/json");

		$game = $this->model('Game');
		$result = $game->getUserGames($_SESSION['username']);

		echo json_encode($result);
	}

	public function topWinners() {
		header("Content-type:application/json");

		$game = $this->model('Game');
		$result = $game->getTopWinners(3);

		echo json_encode($result);
	}

	public function playedmost() {
		header("Content-type:application/json");

		$game = $this->model('Game');
		$result = $game->getTopPlayers(3);

		echo json_encode($result);
	}

	public function play() {
		$data = [];
		$this->view('dice/play', $data);
	}

	public function postGame() {
		$roll1 = $_POST['roll1'];
		$roll2 = $_POST['roll2'];
		$roll3 = $_POST['roll3'];
		$roll4 = $_POST['roll4'];
		$winings = $_POST['winings'];

		$game = $this->model('Game');
		$result = $game->postGameDB($roll1, $roll2, $roll3, $roll4, $winings);
	}
}