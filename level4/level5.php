<?php

return new Level4\Diagram('Diagram', [
    new Level4\Entity('Entity'),
    new Level4\Entity('Relation'),
    new Level4\Entity('Attribute'),
    new Level4\Entity('RelationAttribute'),
], [
    new Level4\Relation('Association'),
    new Level4\Relation('Consisting'),
    new Level4\Relation('Attached'),
], [
    new Level4\Attribute('id', 'no', 'yes'),
    new Level4\Attribute('id', 'no', 'yes'),
    new Level4\Attribute('id', 'no', 'yes'),
    new Level4\Attribute('id', 'no', 'yes'),
    new Level4\Attribute('multiple', 'no', 'no'),
    new Level4\Attribute('iskey', 'no', 'no'),
    new Level4\Attribute('multiple', 'no', 'no'),
    new Level4\Attribute('iskey', 'no', 'no'),
], [
    new Level4\Association(0, 0),
    new Level4\Association(1, 0),
    new Level4\Association(0, 1),
    new Level4\Association(2, 1),
    new Level4\Association(1, 2),
    new Level4\Association(3, 2),
], [
    new Level4\Consisting(0, 0),
    new Level4\Consisting(1, 1),
    new Level4\Consisting(2, 2),
    new Level4\Consisting(3, 3),
    new Level4\Consisting(2, 4),
    new Level4\Consisting(2, 5),
    new Level4\Consisting(3, 6),
    new Level4\Consisting(3, 7),
]);