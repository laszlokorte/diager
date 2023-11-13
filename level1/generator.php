<?php

namespace Level1;

class Generator {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    public function generate(Diagram $diagram) {
        $attributes = implode(', ', [
            'public string $id',
            ...array_map(fn($ent) => <<<EO
            public \$listOf$ent->id = []
            EO, $diagram->listOfEntity)
        ]);

        $entities = implode(PHP_EOL, array_map(fn($ent) => <<<EO
            class $ent->id {
                function __construct(public string \$id) {
                }
            }
            EO, $diagram->listOfEntity));

        return <<<EO
            <?php

            namespace $this->namespace;

            class $diagram->id {
                function __construct($attributes) {

                }
            }

            $entities
            EO;
    }
}