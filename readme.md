## Background 

Simple reservation system written with the use of factory pattern. 

Contents in the resource folder are available reservation types. 

Contents of Notifier folder are currently not used in the manager. 

Suppose that the manager's 
``` 
 private $reservations = [];
```
field is your reservations database. 


# Tasks 

Your task is to optimize and refactor existing code 

## Task 1 
Implement the observer pattern so the ReservationManager uses PushNotifier class to notify the user about reservation events 

## Task 2 
Add a new resource type "Equipment" and handle the ability to reservate it. 
Use Strategy pattern to handle different resource types 

## Task 3 
Identify the redundant code and move it to smaller helper classes 


## Task 4 
Implement different resource strategy pattern and use it in ReservationManager 







