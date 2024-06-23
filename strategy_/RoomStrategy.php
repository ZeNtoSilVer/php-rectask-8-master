<?php
require_once 'ResourceStrategy.php';

class RoomStrategy implements ResourceStrategy {
    public function create($data) {
        return new Room($data['id'], $data['name']);
    }
}