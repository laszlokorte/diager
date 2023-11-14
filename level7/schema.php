<?php

namespace Level7;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAttribute = [], public $listOfRelationAttribute = [], public $listOfAssociation = [], public $listOfConsisting = [], public $listOfAttached = []) {

    }
}

class Entity {
    function __construct(public string $EntId) {
    }
}
class Relation {
    function __construct(public string $RelId) {
    }
}
class Attribute {
    function __construct(public string $AtrId, public bool $AtrMul, public bool $AtrKey, public mixed $AtrTyp) {
    }
}
class RelationAttribute {
    function __construct(public string $RelAtrId, public bool $RelAtrMul, public bool $RelAtrKey, public mixed $RelAtrTyp) {
    }
}

class Association {
    function __construct(public string $AssocEntityId, public string $AssocRelationId, public int $AssocMin, public ?int $AssocMax, public bool $AssocExistence, public ?string $AssocRole) {
    }
}
class Consisting {
    function __construct(public string $ConsistingEntityId, public string $ConsistingAttributeId) {
    }
}
class Attached {
    function __construct(public string $AttachedRelationId, public string $AttachedRelationAttributeId) {
    }
}