<?php

namespace Level9;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAttribute = [], public $listOfAssociation = [], public $listOfConsisting = [], public $listOfInherits = []) {

    }
}

abstract class ERObject  {
    function __construct(public string $Id) {
    }
}

class Entity extends ERObject {
    function __construct(public string $Id) {
    }
}

class Relation extends ERObject {
    function __construct(public string $Id) {
    }
}

class Attribute extends ERObject {
    function __construct(public string $Id, public bool $Multiple, public bool $IsKey, public mixed $Type) {
    }
}

class Association {
    function __construct(public string $AssocEntityId, public string $AssocRelationId, public int $AssocMin, public ?int $AssocMax, public bool $AssocExistence, public ?string $AssocRole) {
    }
}

class Consisting {
    function __construct(public string $ConsistingERObjectId, public string $ConsistingAttributeId) {
    }
}

class Inherits {
    function __construct(public string $InheritsEntityParentId, public string $InheritsEntityChildId) {
    }
}