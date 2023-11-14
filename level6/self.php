<?php

return new Level6\Diagram('Diagram', [
    new Level6\Entity('Entity'),
    new Level6\Entity('Relation'),
    new Level6\Entity('Attribute'),
    new Level6\Entity('RelationAttribute'),
], [
    new Level6\Relation('Association'),
    new Level6\Relation('Consisting'),
    new Level6\Relation('Attached'),
], [
    new Level6\Attribute('id', 'no', 'yes', 'string'),
    new Level6\Attribute('id', 'no', 'yes', 'string'),
    new Level6\Attribute('id', 'no', 'yes', 'string'),
    new Level6\Attribute('id', 'no', 'yes', 'string'),
    new Level6\Attribute('multiple', 'no', 'no', 'string'),
    new Level6\Attribute('iskey', 'no', 'no', 'string'),
    new Level6\Attribute('multiple', 'no', 'no', 'string'),
    new Level6\Attribute('iskey', 'no', 'no', 'string'),
    new Level6\Attribute('type', 'no', 'no', 'string'),
    new Level6\Attribute('type', 'no', 'no', 'string'),
], [
    new Level6\RelationAttribute('min', 'no', 'no', 'string'),
    new Level6\RelationAttribute('max', 'no', 'no', 'string'),
    new Level6\RelationAttribute('existence', 'no', 'no', 'string'),
    new Level6\RelationAttribute('role', 'no', 'yes', 'string'),
], [
    new Level6\Association(0, 0, '0', 'n', 'no', '...'),
    new Level6\Association(1, 0, '0', 'n', 'no', '...'),
    new Level6\Association(0, 1, '0', 'n', 'no', '...'),
    new Level6\Association(2, 1, '0', 'n', 'no', '...'),
    new Level6\Association(1, 2, '0', 'n', 'no', '...'),
    new Level6\Association(3, 2, '0', 'n', 'no', '...'),
], [
    new Level6\Consisting(0, 0),
    new Level6\Consisting(1, 1),
    new Level6\Consisting(2, 2),
    new Level6\Consisting(2, 4),
    new Level6\Consisting(2, 5),
    new Level6\Consisting(3, 3),
    new Level6\Consisting(3, 6),
    new Level6\Consisting(3, 7),
    new Level6\Consisting(2, 8),
    new Level6\Consisting(3, 9),
], [
    new Level6\Attached(0, 0),
    new Level6\Attached(0, 1),
    new Level6\Attached(0, 2),
    new Level6\Attached(0, 3),
]);