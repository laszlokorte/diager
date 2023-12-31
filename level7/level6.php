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
], [
    new Level7\Attribute('id', false, true, 'string'),
    new Level7\Attribute('multiple', false, false, 'string'),
    new Level7\Attribute('iskey', false, false, 'string'),
    new Level7\Attribute('typ', false, false, 'mixed'),
], [
    new Level7\RelationAttribute('min', false, false, 'string'),
    new Level7\RelationAttribute('max', false, false, 'string'),
    new Level7\RelationAttribute('existence', false, false, 'string'),
    new Level7\RelationAttribute('role', false, true, 'string'),
    new Level7\RelationAttribute('EntityIndex', false, false, 'int'),
    new Level7\RelationAttribute('AttributeIndex', false, false, 'int'),
    new Level7\RelationAttribute('RelationIndex', false, false, 'int'),
    new Level7\RelationAttribute('RelationAttributeIndex', false, false, 'int'),
], [
    new Level7\Association('Entity', 'Association', 0, null, false, null),
    new Level7\Association('Relation', 'Association', 0, null, false, null),
    new Level7\Association('Entity', 'Consisting', 0, null, false, null),
    new Level7\Association('Attribute', 'Consisting', 0, null, false, null),
    new Level7\Association('Relation', 'Attached', 0, null, false, null),
    new Level7\Association('RelationAttribute', 'Attached', 0, null, false, null),
], [
    new Level7\Consisting('Entity', 'id'),
    new Level7\Consisting('Relation', 'id'),
    new Level7\Consisting('Attribute', 'id'),
    new Level7\Consisting('Attribute', 'multiple'),
    new Level7\Consisting('Attribute', 'iskey'),
    new Level7\Consisting('RelationAttribute', 'id'),
    new Level7\Consisting('RelationAttribute', 'multiple'),
    new Level7\Consisting('RelationAttribute', 'iskey'),
    new Level7\Consisting('Attribute', 'typ'),
    new Level7\Consisting('RelationAttribute', 'typ'),
], [
    new Level7\Attached('Association', 'EntityIndex'),
    new Level7\Attached('Association', 'RelationIndex'),
    new Level7\Attached('Association', 'min'),
    new Level7\Attached('Association', 'max'),
    new Level7\Attached('Association', 'existence'),
    new Level7\Attached('Association', 'role'),
    new Level7\Attached('Consisting', 'EntityIndex'),
    new Level7\Attached('Consisting', 'AttributeIndex'),
    new Level7\Attached('Attached', 'RelationIndex'),
    new Level7\Attached('Attached', 'RelationAttributeIndex'),
]);