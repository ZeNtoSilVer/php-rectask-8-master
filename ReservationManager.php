<?php
require_once './resource/Resource.php';
require_once './resource/ResourceFactory.php';
require_once 'Reservation.php';

class ReservationManager {
    private $reservations = [];
    private $notifiers = [];

    public function attach(Notifier $notifier)
    {
        if (!in_array($notifier, $this->notifiers, true)) {
            $this->notifiers[] = $notifier;
        }
    }
  
    public function createReservation($resourceType, $resourceId, $resourceName, $startTime, $endTime) {
        $resource = ResourceFactory::createResource($resourceType, $resourceId, $resourceName);
        $reservation = new Reservation(uniqid(), $resource, $startTime, $endTime);
        $this->reservations[$reservation->getId()] = $reservation;
        $this->notify('reservation:created', $reservation->getAll());
        return $reservation;
    }

    public function editReservation($reservationId, $startTime, $endTime) {
        if (isset($this->reservations[$reservationId])) {
            $this->reservations[$reservationId]->setStartTime($startTime);
            $this->reservations[$reservationId]->setEndTime($endTime);
            $this->notify('reservation:edited', $this->reservations[$reservationId]->getAll());
        } else {
            throw new Exception("Reservation not found");
        }
    }

    public function deleteReservation($reservationId) {
        if (isset($this->reservations[$reservationId])) {
            $resourceName = $this->reservations[$reservationId]->getResource()->getName();
            unset($this->reservations[$reservationId]);
            $this->notify('reservation:deleted', $resourceName);
        } else {
            throw new Exception("Reservation not found");
        }
    }

    public function getReservations() {
        return $this->reservations;
    }

    private function notify($action, $resource) {
        foreach($this->notifiers as $notifier) {
            $notifier->update($action, $resource);
        }
    }
}
