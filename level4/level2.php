<?php

return new Level4\Diagram('Diagram', [
    new Level4\Entity('Entity'),
    new Level4\Entity('Relation'),
], [
], [
    new Level4\Attribute('id', 'no', 'yes'),
    new Level4\Attribute('id', 'no', 'yes'),
], [], [
    new Level4\Consisting(0, 0),
    new Level4\Consisting(1, 1),
]);