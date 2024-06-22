<?php
require_once './resource/Room.php';
require_once './resource/Car.php';
require_once './resource/Equipment.php';

class ResourceFactory {
    public static function createResource($type, $id, $name) {
        switch ($type) {
            case 'room':
                return new Room($id, $name);
            case 'car':
                return new Car($id, $name);
            case 'equipment':
                return new Equipment($id, $name);
            default:
                return null;
        }
    }
}
