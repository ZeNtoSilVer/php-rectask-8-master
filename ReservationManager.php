<?php
require_once './resource/Resource.php';
require_once './resource/ResourceFactory.php';

class ReservationManager {
    private $reservations = [];
    
  
    public function createReservation($resourceType, $resourceId, $resourceName, $startTime, $endTime) {
        $resource = ResourceFactory::createResource($resourceType, $resourceId, $resourceName);
        $reservation = new Reservation(uniqid(), $resource, $startTime, $endTime);
        $this->reservations[$reservation->getId()] = $reservation;
        return $reservation;
    }

    public function editReservation($reservationId, $startTime, $endTime) {
        if (isset($this->reservations[$reservationId])) {
            $this->reservations[$reservationId]->setStartTime($startTime);
            $this->reservations[$reservationId]->setEndTime($endTime);
        } else {
            throw new Exception("Reservation not found");
        }
    }

    public function deleteReservation($reservationId) {
        if (isset($this->reservations[$reservationId])) {
            $resourceName = $this->reservations[$reservationId]->getResource()->getName();
            unset($this->reservations[$reservationId]);
        } else {
            throw new Exception("Reservation not found");
        }
    }

    public function getReservations() {
        return $this->reservations;
    }
}
