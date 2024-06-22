<?php
require_once 'ReservationManager.php';
require_once './notifier/PushNotifier.php';

// Utwórz menedżera rezerwacji
$reservationManager = new ReservationManager();

$reservationManager->attach(new PushNotifier);

$roomReservation = $reservationManager->createReservation('room', 1, 'Main Conference Room', '2024-06-20 10:00', '2024-06-20 12:00');
$carReservation = $reservationManager->createReservation('car', 2, 'Company Car', '2024-06-21 09:00', '2024-06-21 17:00');
$equipmentReservation = $reservationManager->createReservation('equipment', 3, 'Shovel', '2024-06-23 09:00', '2024-06-23 11:00');

$reservationManager->editReservation($roomReservation->getId(), '2024-06-20 11:00', '2024-06-20 13:00');
$reservationManager->deleteReservation($carReservation->getId());
$reservationManager->deleteReservation($equipmentReservation->getId());