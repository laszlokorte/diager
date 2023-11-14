<?php

return new Level9\Diagram('Diagram', [
    new Level9\Entity('ERObject'),
    new Level9\Entity('Entity'),
    new Level9\Entity('Relation'),
    new Level9\Entity('Attribute'),
], [
    new Level9\Relation('Association'),
    new Level9\Relation('Consisting'),
    new Level9\Relation('Inherits'),
], [
    new Level9\Attribute('Id', false, true, 'string'),
    new Level9\Attribute('Multiple', false, false, 'bool'),
    new Level9\Attribute('IsKey', false, false, 'bool'),
    new Level9\Attribute('Type', false, false, 'mixed'),
    new Level9\Attribute('AssocEntityId', false, false, 'string'),
    new Level9\Attribute('AssocRelationId', false, false, 'string'),
    new Level9\Attribute('AssocMin', false, false, 'int'),
    new Level9\Attribute('AssocMax', false, false, '?int'),
    new Level9\Attribute('AssocExistence', false, false, 'bool'),
    new Level9\Attribute('AssocRole', false, true, '?string'),

    new Level9\Attribute('ConsistingERObjectId', false, false, 'string'),
    new Level9\Attribute('ConsistingAttributeId', false, false, 'string'),
    
    new Level9\Attribute('InheritsEntityParentId', false, false, 'string'),
    new Level9\Attribute('InheritsEntityChildId', false, false, 'string'),
], [
    new Level9\Association('Entity', 'Association', 0, null, false, null),
    new Level9\Association('Relation', 'Association', 0, null, false, null),
    new Level9\Association('ERObject', 'Consisting', 0, null, false, null),
    new Level9\Association('Attribute', 'Consisting', 0, null, false, null),
    new Level9\Association('Entity', 'Inherits', 0, null, false, 'parent'),
    new Level9\Association('Entity', 'Inherits', 0, 1, false, 'child'),
], [
    new Level9\Consisting('ERObject', 'Id'),
    new Level9\Consisting('Attribute', 'Multiple'),
    new Level9\Consisting('Attribute', 'IsKey'),
    new Level9\Consisting('Attribute', 'Type'),
    new Level9\Consisting('Association', 'AssocEntityId'),
    new Level9\Consisting('Association', 'AssocRelationId'),
    new Level9\Consisting('Association', 'AssocMin'),
    new Level9\Consisting('Association', 'AssocMax'),
    new Level9\Consisting('Association', 'AssocExistence'),
    new Level9\Consisting('Association', 'AssocRole'),
    new Level9\Consisting('Consisting', 'ConsistingERObjectId'),
    new Level9\Consisting('Consisting', 'ConsistingAttributeId'),
    new Level9\Consisting('Inherits', 'InheritsEntityParentId'),
    new Level9\Consisting('Inherits', 'InheritsEntityChildId'),
], [
    new Level9\Inherits('ERObject', 'Entity'),
    new Level9\Inherits('ERObject', 'Relation'),
    new Level9\Inherits('ERObject', 'Attribute'),
]);