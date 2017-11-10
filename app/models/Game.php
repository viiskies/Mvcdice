<?php

class Game implements GameInterface {

	private $db;

	function __construct(Database $db){
		$this->db = $db;
	}

	public function getAllGames(): array
	{
		return $this->db->select("SELECT * FROM games");
	}

	public function getUserGames(string $username): array
	{
		return $this->db->select("SELECT * FROM games WHERE username = :username", 
			[":username" => $username]);
	}

	public function getTopWinners(int $count) {
		$count = intval($count);
		return $this->db->select("
			SELECT username, max(winings) FROM `games` 
			GROUP BY username 
			ORDER BY max(winings) 
			DESC limit $count"
		);
	}

	public function getTopPlayers(int $count) {
		$count = intval($count);
		return $this->db->select("
			SELECT games.id, games.username, count(games.username) AS total_games FROM games 
			JOIN users ON users.username = games.username 
			GROUP BY games.username 
			ORDER BY total_games DESC 
			LIMIT $count"
		);
	}

	public function postGameDB($roll1, $roll2, $roll3, $roll4, $winings) {

		return $this->db->insert("
			INSERT INTO games (username, roll1, roll2, roll3, roll4, winings, ip, date) 
			VALUES (:username, :roll1, :roll2, :roll3, :roll4, :winings, :ip, NOW())", 		
			[
			':username' => $_SESSION['username'],
			':roll1' => $roll1,
			':roll2' => $roll2,
			':roll3' => $roll3,
			':roll4' => $roll4,
			':winings' => $winings,
			':ip' => $_SERVER['REMOTE_ADDR']
			]);
	}
}