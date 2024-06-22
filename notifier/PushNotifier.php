<?php

require_once 'Notifier.php';

class PushNotifier implements Notifier
{
    public function update($action, $resource)
    {
        echo 'PushNotifier: ' . $action . '-' . json_encode($resource) . ' | ';
    }
}