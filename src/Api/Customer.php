<?php

namespace Api;

use Customer\Model;

class Customer extends ApiAbstract
{
    public function getCollection()
    {
        $customerModel = new Model();
        return $customerModel->getCustomers();
    }

    public function getEntityById($entityId)
    {
        $customerModel = new Model();
        return $customerModel->getCustomerById($entityId);
    }
}