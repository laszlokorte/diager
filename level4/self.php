<?php

return new Level4\Diagram('Diagram', [
    new Level4\Entity('Entity'),
    new Level4\Entity('Relation'),
    new Level4\Entity('Attribute'),
], [
    new Level4\Relation('Association'),
    new Level4\Relation('Consisting'),
], [
    new Level4\Attribute('id'),
    new Level4\Attribute('id'),
    new Level4\Attribute('id'),
], [
    new Level4\Association(0, 0),
    new Level4\Association(1, 0),
    new Level4\Association(0, 1),
    new Level4\Association(2, 1),
], [
    new Level4\Consisting(0, 0),
    new Level4\Consisting(1, 1),
    new Level4\Consisting(2, 2),
]);