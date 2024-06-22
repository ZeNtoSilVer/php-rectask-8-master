<?php
require_once 'Resource.php';

class Room implements Resource {
    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }
}
