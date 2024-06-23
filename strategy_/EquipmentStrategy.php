<?php
require_once 'ResourceStrategy.php';

class EquipmentStrategy implements ResourceStrategy {
    public function create($data) {
        return new Equipment($data['id'], $data['name']);
    }
}