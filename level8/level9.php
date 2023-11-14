<?php

// TODO Add Inheritance for ERObject

return new Level8\Diagram('Diagram', [
    new Level8\Entity('Entity'),
    new Level8\Entity('Relation'),
    new Level8\Entity('Attribute'),
    new Level8\Entity('ERObject'),
], [
    new Level8\Relation('Association'),
    new Level8\Relation('Consisting'),
    new Level8\Relation('Attached'),
    new Level8\Relation('Inherits'),
], [
    new Level8\Attribute('EntId', false, true, 'string'),
    new Level8\Attribute('RelId', false, true, 'string'),
    new Level8\Attribute('AtrId', false, true, 'string'),
    new Level8\Attribute('RelAtrId', false, true, 'string'),
    new Level8\Attribute('AtrMul', false, false, 'bool'),
    new Level8\Attribute('AtrKey', false, false, 'bool'),
    new Level8\Attribute('RelAtrMul', false, false, 'bool'),
    new Level8\Attribute('RelAtrKey', false, false, 'bool'),
    new Level8\Attribute('AtrTyp', false, false, 'mixed'),
    new Level8\Attribute('RelAtrTyp', false, false, 'mixed'),
], [
    new Level8\RelationAttribute('AssocEntityId', false, false, 'string'),
    new Level8\RelationAttribute('AssocRelationId', false, false, 'string'),
    new Level8\RelationAttribute('AssocMin', false, false, 'int'),
    new Level8\RelationAttribute('AssocMax', false, false, '?int'),
    new Level8\RelationAttribute('AssocExistence', false, false, 'bool'),
    new Level8\RelationAttribute('AssocRole', false, true, '?string'),

    new Level8\RelationAttribute('ConsistingEntityId', false, false, 'string'),
    new Level8\RelationAttribute('ConsistingAttributeId', false, false, 'string'),

    new Level8\RelationAttribute('AttachedRelationId', false, false, 'string'),
    new Level8\RelationAttribute('AttachedRelationAttributeId', false, false, 'string'),
    
    new Level8\RelationAttribute('InheritsEntityParentId', false, false, 'string'),
    new Level8\RelationAttribute('InheritsEntityChildId', false, false, 'string'),
], [
    new Level8\Association('Entity', 'Association', 0, null, false, null),
    new Level8\Association('Relation', 'Association', 0, null, false, null),
    new Level8\Association('Entity', 'Consisting', 0, null, false, null),
    new Level8\Association('Attribute', 'Consisting', 0, null, false, null),
    new Level8\Association('Relation', 'Attached', 0, null, false, null),
    new Level8\Association('RelationAttribute', 'Attached', 0, null, false, null),
    new Level8\Association('Entity', 'Inherits', 0, null, false, 'parent'),
    new Level8\Association('Entity', 'Inherits', 0, 1, false, 'child'),

], [
    new Level8\Consisting('Entity', 'EntId'),
    new Level8\Consisting('Relation', 'RelId'),
    new Level8\Consisting('Attribute', 'AtrId'),
    new Level8\Consisting('Attribute', 'AtrMul'),
    new Level8\Consisting('Attribute', 'AtrKey'),
    new Level8\Consisting('RelationAttribute', 'RelAtrId'),
    new Level8\Consisting('RelationAttribute', 'RelAtrMul'),
    new Level8\Consisting('RelationAttribute', 'RelAtrKey'),
    new Level8\Consisting('Attribute', 'AtrTyp'),
    new Level8\Consisting('RelationAttribute', 'RelAtrTyp'),
], [
    new Level8\Attached('Association', 'AssocEntityId'),
    new Level8\Attached('Association', 'AssocRelationId'),
    new Level8\Attached('Association', 'AssocMin'),
    new Level8\Attached('Association', 'AssocMax'),
    new Level8\Attached('Association', 'AssocExistence'),
    new Level8\Attached('Association', 'AssocRole'),
    new Level8\Attached('Consisting', 'ConsistingEntityId'),
    new Level8\Attached('Consisting', 'ConsistingAttributeId'),
    new Level8\Attached('Attached', 'AttachedRelationId'),
    new Level8\Attached('Attached', 'AttachedRelationAttributeId'),
    new Level8\Attached('Inherits', 'InheritsEntityParentId'),
    new Level8\Attached('Inherits', 'InheritsEntityChildId'),
], []);