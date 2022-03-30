<?php
namespace Api;

abstract class ApiAbstract {
        public function getCollection() {}
        public function getEntityById($entityId = false) {}
        public function createEntity() {}
        public function updateEntity($entityId = false) {}
        public function deleteEntity() {}
}