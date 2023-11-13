<?php

namespace Level2;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = []) {

    }
}

class Entity {
    function __construct(public string $id) {
    }
}
class Relation {
    function __construct(public string $id) {
    }
}