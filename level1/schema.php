<?php

namespace Level1;

class Diagram {
    function __construct(public string $id, public $listOfEntity = []) {
    }
}

class Entity {
    function __construct(public string $id) {
    }
}