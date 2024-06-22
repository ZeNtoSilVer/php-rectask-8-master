<?php
interface Observer {
    public function update($action, $resource);
}
