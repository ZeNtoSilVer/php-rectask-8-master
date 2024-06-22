<?php
require_once 'ReservationManager.php';
require_once './notifier/PushNotifier.php';

// Utwórz menedżera rezerwacji
$reservationManager = new ReservationManager();

$reservationManager->attach(new PushNotifier);

$reservationManager->createReservation('ConferenceRoom', 1, 'Main Conference Room', '2024-06-20 10:00', '2024-06-20 12:00');
$reservationManager->createReservation('Car', 2, 'Company Car', '2024-06-21 09:00', '2024-06-21 17:00');

$reservationManager->editReservation('1', '2024-06-20 11:00', '2024-06-20 13:00');
$reservationManager->deleteReservation('2');