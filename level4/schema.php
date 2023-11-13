<?php

namespace Level4;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAttribute = [], public $listOfAssociation = [], public $listOfConsisting = []) {

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
class Attribute {
    function __construct(public string $id) {
    }
}

class Association {
    function __construct(public int $EntityIndex, public int $RelationIndex) {
    }
}
class Consisting {
    function __construct(public int $EntityIndex, public int $AttributeIndex) {
    }
}