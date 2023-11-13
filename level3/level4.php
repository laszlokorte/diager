<?php

return new Level3\Diagram('Diagram', [
	new Level3\Entity('Entity'),
	new Level3\Entity('Relation'),
	new Level3\Entity('Attribute'),
], [
	new Level3\Relation('Association'),
	new Level3\Relation('Consisting'),
], [
	new Level3\Association(0, 1),
	new Level3\Association(0, 2),
]);