<?php
require_once 'ReservationManager.php';
require_once './strategy_/EquipmentStrategy.php';
require_once './strategy_/CarStrategy.php';
require_once './strategy_/RoomStrategy.php';
require_once './strategy_/EquipmentStrategy.php';
require_once './notifier/PushNotifier.php';

// Utwórz menedżera rezerwacji
$reservationManager = new ReservationManager(new EquipmentStrategy);

$reservationManager->attach(new PushNotifier);

$roomRes = $reservationManager->createReservation('room', 1, 'Main Conference Room', '2024-06-20 10:00', '2024-06-20 12:00');
$carRes = $reservationManager->createReservation('car', 2, 'Company Car', '2024-06-21 09:00', '2024-06-21 17:00');
$shovRes = $reservationManager->createReservation('equipment', 3, 'Shovel', '2024-06-23 09:00', '2024-06-23 11:00');

$reservationManager->setStrategy(new EquipmentStrategy);
$bombRes = $reservationManager->strategyCreateReservation(4, 'C4', '2021-01-01 09:00', '2021-01-01 10:00');
$reservationManager->setStrategy(new CarStrategy);
$bombRes = $reservationManager->strategyCreateReservation(5, 'Cheese', '2021-01-02 11:00', '2021-01-02 12:00');


$reservationManager->editReservation($roomRes->getId(), '2024-06-20 11:00', '2024-06-20 13:00');
$reservationManager->deleteReservation($carRes->getId());
$reservationManager->deleteReservation($shovRes->getId());