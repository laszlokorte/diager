<?php

namespace Level3;

class Diagram {
	function __construct(public string $id, public $listOfEntity = [], public $listOfRelation = [], public $listOfAssociation = []) {
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

class Association {
	function __construct(public $EntityIndex, public $RelationIndex) {
	}
}