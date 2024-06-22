<?php
require_once './resource/Room.php';
require_once './resource/Car.php';

class ResourceFactory {
    public static function createResource($type, $id) {
        switch ($type) {
            case 'room':
                return new Room($id);
            case 'car':
                return new Car($id);
            default:
                return null;
        }
    }
}
