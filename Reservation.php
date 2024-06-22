<?php
class Reservation {
    private $id;
    private $resource;
    private $startTime;
    private $endTime;

    public function __construct($id, $resource, $startTime, $endTime) {
        $this->id = $id;
        $this->resource = $resource;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getId() {
        return $this->id;
    }

    public function getResource() {
        return $this->resource;
    }

    public function getStartTime() {
        return $this->startTime;
    }

    public function getEndTime() {
        return $this->endTime;
    }

    public function setStartTime($startTime) {
        $this->startTime = $startTime;
    }

    public function setEndTime($endTime) {
        $this->endTime = $endTime;
    }

    public function getAll() {
        return [
            'id' => $this->id,
            'resource' => $this->resource->getAll(),
            'startTime' => $this->startTime,
            'endTime' => $this->endTime
        ];
    }
}