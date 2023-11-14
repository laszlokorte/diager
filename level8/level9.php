<?php

return new Level8\Diagram('Diagram', [
    new Level8\Entity('Entity'),
    new Level8\Entity('Relation'),
    new Level8\Entity('Attribute'),
    new Level8\Entity('ERObject'),
], [
    new Level8\Relation('Association'),
    new Level8\Relation('Consisting'),
    new Level8\Relation('Inherits'),
], [
    new Level8\Attribute('Id', false, true, 'string'),
    new Level8\Attribute('Multiple', false, false, 'bool'),
    new Level8\Attribute('IsKey', false, false, 'bool'),
    new Level8\Attribute('Type', false, false, 'mixed'),
    new Level8\Attribute('AssocEntityId', false, false, 'string'),
    new Level8\Attribute('AssocRelationId', false, false, 'string'),
    new Level8\Attribute('AssocMin', false, false, 'int'),
    new Level8\Attribute('AssocMax', false, false, '?int'),
    new Level8\Attribute('AssocExistence', false, false, 'bool'),
    new Level8\Attribute('AssocRole', false, true, '?string'),

    new Level8\Attribute('ConsistingERObjectId', false, false, 'string'),
    new Level8\Attribute('ConsistingAttributeId', false, false, 'string'),
    
    new Level8\Attribute('InheritsEntityParentId', false, false, 'string'),
    new Level8\Attribute('InheritsEntityChildId', false, false, 'string'),
], [
], [
    new Level8\Association('Entity', 'Association', 0, null, false, null),
    new Level8\Association('Relation', 'Association', 0, null, false, null),
    new Level8\Association('ERObject', 'Consisting', 0, null, false, null),
    new Level8\Association('Attribute', 'Consisting', 0, null, false, null),
    new Level8\Association('Entity', 'Inherits', 0, null, false, 'parent'),
    new Level8\Association('Entity', 'Inherits', 0, 1, false, 'child'),
], [
    new Level8\Consisting('ERObject', 'Id'),
    new Level8\Consisting('Attribute', 'Multiple'),
    new Level8\Consisting('Attribute', 'IsKey'),
    new Level8\Consisting('Attribute', 'Type'),
    new Level8\Consisting('Association', 'AssocEntityId'),
    new Level8\Consisting('Association', 'AssocRelationId'),
    new Level8\Consisting('Association', 'AssocMin'),
    new Level8\Consisting('Association', 'AssocMax'),
    new Level8\Consisting('Association', 'AssocExistence'),
    new Level8\Consisting('Association', 'AssocRole'),
    new Level8\Consisting('Consisting', 'ConsistingERObjectId'),
    new Level8\Consisting('Consisting', 'ConsistingAttributeId'),
    new Level8\Consisting('Inherits', 'InheritsEntityParentId'),
    new Level8\Consisting('Inherits', 'InheritsEntityChildId'),
], [
], [
    new Level8\Inherits('ERObject', 'Entity'),
    new Level8\Inherits('ERObject', 'Relation'),
    new Level8\Inherits('ERObject', 'Attribute'),
]);