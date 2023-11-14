<?php

namespace Level7;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAttribute = [], public $listOfRelationAttribute = [], public $listOfAssociation = [], public $listOfConsisting = [], public $listOfAttached = []) {

    }
}

class Entity {
    function __construct(public int $id) {
    }
}
class Relation {
    function __construct(public int $id) {
    }
}
class Attribute {
    function __construct(public int $id, public bool $multiple, public bool $iskey, public mixed $type) {
    }
}
class RelationAttribute {
    function __construct(public int $id, public bool $multiple, public bool $iskey, public mixed $type) {
    }
}

class Association {
    function __construct(public int $EntityIndex, public int $RelationIndex, public int? $min, public int? $max, public bool $existence, public string $role) {
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