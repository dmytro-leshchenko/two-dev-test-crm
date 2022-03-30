<?php

namespace Customer;

use Db\Db;

class Model
{
    private $dbConnection;
    public function __construct()
    {
        $dbModel = new Db();
        $this->dbConnection = $dbModel->getConnection();
    }

    public function getCustomers()
    {
        $sql = 'SELECT * FROM `customers`';
        // it always return array from php8
        $customers = $this->dbConnection->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // add validation of data and check if it's not empty
        return $customers;
    }

    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM `customers` WHERE id = ?";
        $customer = $this->dbConnection->prepare($sql)->execute([$id])->fetchAll(PDO::FETCH_ASSOC);
        // customer variable could be skipped, but keeping it for additional manipulations
        return $customer;
    }
}