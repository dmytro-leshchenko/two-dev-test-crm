<?php

namespace Api;

use Employee\Model;

class Employee extends ApiAbstract
{
    public function getCollection()
    {
        $employeeModel = new Model();
        return $employeeModel->getEmployees();
    }

    public function getEntityById($entityId)
    {
        $employeeModel = new Model();
        return $employeeModel->getEmployeeById($entityId);
    }
}