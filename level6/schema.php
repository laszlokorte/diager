<?php

namespace Level6;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAttribute = [], public $listOfRelationAttribute = [], public $listOfAssociation = [], public $listOfConsisting = [], public $listOfAttached = []) {

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
    function __construct(public string $id, public string $multiple, public string $iskey, public mixed $typ) {
    }
}
class RelationAttribute {
    function __construct(public string $id, public string $multiple, public string $iskey, public mixed $typ) {
    }
}

class Association {
    function __construct(public int $EntityIndex, public int $RelationIndex, public string $min, public string $max, public string $existence, public string $role) {
    }
}
class Consisting {
    function __construct(public int $EntityIndex, public int $AttributeIndex) {
    }
}
class Attached {
    function __construct(public int $RelationIndex, public int $RelationAttributeIndex) {
    }
}
