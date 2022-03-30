<?php

namespace DB;

class Mysql {

    private $connection = null;

    public function __construct($host, $port, $db, $username, $password)
    {

        try {
            $this->connection = new PDO("mysql:host=$host;port=$port;dbname=$db", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}