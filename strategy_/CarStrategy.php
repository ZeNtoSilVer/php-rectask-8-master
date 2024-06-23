<?php
require_once 'ResourceStrategy.php';

class CarStrategy implements ResourceStrategy {
    public function create($data) {
        return new Car($data['id'], $data['name']);
    }
}