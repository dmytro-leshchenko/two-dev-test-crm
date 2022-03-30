<?php
namespace Db;

class Db
{
    private $allowedEngines = ['mysql'];
    private $connection;

    private function connect()
    {
        // load configurations from the env variables
        $engine = getenv('DB_ENGINE');
        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT') ? : 3306;
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');
        $db   = getenv('DB_DATABASE');

        // check that engine class exists and initialise connection
        if(in_array($engine, $this->allowedEngines) && file_exists($engine . '.php')) {

            $className = ucfirst($engine);
            $class = new \ReflectionClass($className);
            $dbAdapter = $class->newInstanceArgs(array($host, $port, $username, $password, $db));

            return $dbAdapter->getConnection();
        }
    }

    public function getConnection()
    {
        if(!$this->connection) {
            $this->connection = $this->connect();
        }

        return $this->connection;
    }
}

