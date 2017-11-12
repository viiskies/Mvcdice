<?php

class User {

    private $db;

    function __construct(Database $db){
        $this->db = $db;
    }

    // Get all users
    public function getAllUsers() : array {
        return $this->db->select("SELECT id, username FROM users");
    }

    // Get user
    public function getUser(string $username) : array {
        return $this->db->select("SELECT username FROM users WHERE username = :username",
            ['username' => $username]);
    }

    // Get user iwth password
    public function getUserPass(string $username) {
        return $this->db->selectOne("SELECT username, password FROM users WHERE username = :username",
            ['username' => $username]);
    }

    // Get user
    public function addUser(string $name, string $username, string $password)  {

        return $this->db->insert("INSERT INTO users (name, username, password) VALUES (:name, :username, :password)",
            ['username' => $username,
            'name' => $name,
            'password' => $password
            ]);
    }

    // Remove user by ID
    public function removeUser(int $id) : bool {
        return $this->db->remove("DELETE FROM users WHERE id = :id",
            ["id" => $id]);
    }
}