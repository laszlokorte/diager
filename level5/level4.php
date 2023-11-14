<?php

return new Level5\Diagram('Diagram', [
    new Level5\Entity('Entity'),
    new Level5\Entity('Relation'),
    new Level5\Entity('Attribute'),
], [
    new Level5\Relation('Association'),
    new Level5\Relation('Consisting'),
], [
    new Level5\Attribute('id', 'no', 'yes'),
    new Level5\Attribute('id', 'no', 'yes'),
    new Level5\Attribute('id', 'no', 'yes'),
    new Level4\Attribute('multiple', 'no', 'no'),
    new Level4\Attribute('iskey', 'no', 'no'),
], [
], [
    new Level5\Association(0, 0, '0', 'n', 'no', '...'),
    new Level5\Association(1, 0, '0', 'n', 'no', '...'),
    new Level5\Association(0, 1, '0', 'n', 'no', '...'),
    new Level5\Association(2, 1, '0', 'n', 'no', '...'),
    new Level5\Association(1, 2, '0', 'n', 'no', '...'),
], [
    new Level5\Consisting(0, 0),
    new Level5\Consisting(1, 1),
    new Level5\Consisting(2, 2),
    new Level4\Consisting(2, 3),
    new Level4\Consisting(2, 4),
], [
]);