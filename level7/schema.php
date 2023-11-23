<?php

namespace Level7;

class Diagram {
    function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAttribute = [], public $listOfRelationAttribute = [], public $listOfAssociation = [], public $listOfConsisting = [], public $listOfAttached = []) {

    }

    public function getEntityIndex(string $EntId) {
        foreach($this->listOfEntity AS $id => $Entity) {
            if($Entity->EntId == $EntId) {
                return $id;
            }
        }

        return null;
    }

    public function getRelationIndex(string $RelId) {
        foreach($this->listOfRelation AS $id => $Relation) {
            if($Relation->RelId == $RelId) {
                return $id;
            }
        }

        return null;
    }

    public function getAttributeIndex(string $AtrId) {
        foreach($this->listOfAttribute AS $id => $Attribute) {
            if($Attribute->AtrId == $AtrId) {
                return $id;
            }
        }

        return null;
    }

    public function getRelationAttributeIndex(string $RelAtrId) {
        foreach($this->listOfRelationAttribute AS $id => $RelationAttribute) {
            if($RelationAttribute->RelAtrId == $RelAtrId) {
                return $id;
            }
        }

        return null;
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