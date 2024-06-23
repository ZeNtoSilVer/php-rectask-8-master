<?php

class Context { 
    private $resourceStrategy;

    public function __construct(ResourceStrategy $resourceStrategy)
    {
        $this->resourceStrategy = $resourceStrategy;
    }

    public function setStrategy(ResourceStrategy $resourceStrategy) {
        $this->resourceStrategy = $resourceStrategy;
    }

    public function create($data) {
        return $this->resourceStrategy->create($data);
    }
}