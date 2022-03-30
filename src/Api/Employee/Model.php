<?php

namespace Employee;

use Db\Db;

class Model
{
    private $dbConnection;

    public function __construct()
    {
        $dbModel = new Db();
        $this->dbConnection = $dbModel->getConnection();
    }

    public function getEmployees()
    {
        $sql = 'SELECT * FROM `employees`';
        $employees = $this->dbConnection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // add validation of data and check if it's not empty
        return $employees;
    }

    public function getEmployeeById($id)
    {
        $sql = "SELECT * FROM `employees` WHERE id = ?";
        $employee = $this->dbConnection->prepare($sql)->execute([$id])->fetchAll(PDO::FETCH_ASSOC);
        // customer variable could be skipped, but keeping it for additional manipulations
        return $employee;
    }
}