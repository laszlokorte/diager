<?php

return new Level7\Diagram('Diagram', [
    new Level7\Entity('Entity'),
    new Level7\Entity('Relation'),
    new Level7\Entity('Attribute'),
    new Level7\Entity('RelationAttribute'),
], [
    new Level7\Relation('Association'),
    new Level7\Relation('Consisting'),
    new Level7\Relation('Attached'),
    new Level7\Relation('Inherits'),
], [
    new Level7\Attribute('EntId', false, true, 'string'),
    new Level7\Attribute('RelId', false, true, 'string'),
    new Level7\Attribute('AtrId', false, true, 'string'),
    new Level7\Attribute('RelAtrId', false, true, 'string'),
    new Level7\Attribute('AtrMul', false, false, 'bool'),
    new Level7\Attribute('AtrKey', false, false, 'bool'),
    new Level7\Attribute('RelAtrMul', false, false, 'bool'),
    new Level7\Attribute('RelAtrKey', false, false, 'bool'),
    new Level7\Attribute('AtrTyp', false, false, 'mixed'),
    new Level7\Attribute('RelAtrTyp', false, false, 'mixed'),
], [
    new Level7\RelationAttribute('AssocEntityId', false, false, 'string'),
    new Level7\RelationAttribute('AssocRelationId', false, false, 'string'),
    new Level7\RelationAttribute('AssocMin', false, false, 'int'),
    new Level7\RelationAttribute('AssocMax', false, false, '?int'),
    new Level7\RelationAttribute('AssocExistence', false, false, 'bool'),
    new Level7\RelationAttribute('AssocRole', false, true, '?string'),

    new Level7\RelationAttribute('ConsistingEntityId', false, false, 'string'),
    new Level7\RelationAttribute('ConsistingAttributeId', false, false, 'string'),

    new Level7\RelationAttribute('AttachedRelationId', false, false, 'string'),
    new Level7\RelationAttribute('AttachedRelationAttributeId', false, false, 'string'),
    
    new Level7\RelationAttribute('InheritsEntityParentId', false, false, 'string'),
    new Level7\RelationAttribute('InheritsEntityChildId', false, false, 'string'),
], [
    new Level7\Association('Entity', 'Association', 0, null, false, null),
    new Level7\Association('Relation', 'Association', 0, null, false, null),
    new Level7\Association('Entity', 'Consisting', 0, null, false, null),
    new Level7\Association('Attribute', 'Consisting', 0, null, false, null),
    new Level7\Association('Relation', 'Attached', 0, null, false, null),
    new Level7\Association('RelationAttribute', 'Attached', 0, null, false, null),
    new Level7\Association('Entity', 'Inherits', 0, null, false, 'parent'),
    new Level7\Association('Entity', 'Inherits', 0, 1, false, 'child'),

], [
    new Level7\Consisting('Entity', 'EntId'),
    new Level7\Consisting('Relation', 'RelId'),
    new Level7\Consisting('Attribute', 'AtrId'),
    new Level7\Consisting('Attribute', 'AtrMul'),
    new Level7\Consisting('Attribute', 'AtrKey'),
    new Level7\Consisting('RelationAttribute', 'RelAtrId'),
    new Level7\Consisting('RelationAttribute', 'RelAtrMul'),
    new Level7\Consisting('RelationAttribute', 'RelAtrKey'),
    new Level7\Consisting('Attribute', 'AtrTyp'),
    new Level7\Consisting('RelationAttribute', 'RelAtrTyp'),
], [
    new Level7\Attached('Association', 'AssocEntityId'),
    new Level7\Attached('Association', 'AssocRelationId'),
    new Level7\Attached('Association', 'AssocMin'),
    new Level7\Attached('Association', 'AssocMax'),
    new Level7\Attached('Association', 'AssocExistence'),
    new Level7\Attached('Association', 'AssocRole'),
    new Level7\Attached('Consisting', 'ConsistingEntityId'),
    new Level7\Attached('Consisting', 'ConsistingAttributeId'),
    new Level7\Attached('Attached', 'AttachedRelationId'),
    new Level7\Attached('Attached', 'AttachedRelationAttributeId'),
    new Level7\Attached('Inherits', 'InheritsEntityParentId'),
    new Level7\Attached('Inherits', 'InheritsEntityChildId'),
]);