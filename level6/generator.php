<?php

namespace Level6;

class Generator {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    public function generate(Diagram $diagram) {
        $attributes = implode(', ', [
            'public string $id',
            ...array_map(fn($ent) => <<<EO
            public \$listOf$ent->id = []
            EO, $diagram->listOfEntity),
            ...array_map(fn($rel) => <<<EO
            public \$listOf$rel->id = []
            EO, $diagram->listOfRelation)
        ]);

        $entities = implode(PHP_EOL, array_map(function($entIndex, $ent) use ($diagram) { 

            $attributes = implode(', ', array_map(fn($cons) => sprintf('public %s $%s', $diagram->listOfAttribute[$cons->AttributeIndex]->type, $diagram->listOfAttribute[$cons->AttributeIndex]->id), array_filter($diagram->listOfConsisting, fn($cons) => $cons->EntityIndex === $entIndex)));

            return <<<EO
            class $ent->id {
                function __construct($attributes) {
                }
            }
            EO;
        }, array_keys($diagram->listOfEntity), $diagram->listOfEntity));

        $relations = implode(PHP_EOL, array_map(function($relIndex, $rel) use($diagram) { 
            $params = implode(', ', [
                ...array_map(
                    fn ($assoc) => sprintf('public int $%sIndex', $diagram->listOfEntity[$assoc->EntityIndex]->id), 
                    array_filter($diagram->listOfAssociation, fn ($a) => $a->RelationIndex == $relIndex)),
                ...array_map(fn($att) => sprintf('public %s $%s', $diagram->listOfRelationAttribute[$att->RelationAttributeIndex]->type, $diagram->listOfRelationAttribute[$att->RelationAttributeIndex]->id), array_filter($diagram->listOfAttached, fn($att) => $att->RelationIndex === $relIndex))
            ]);

            return <<<EO
            class $rel->id {
                function __construct($params) {
                }
            }
            EO;
        }, array_keys($diagram->listOfRelation), $diagram->listOfRelation));

        return <<<EO
            <?php

            namespace $this->namespace;

            class $diagram->id {
                function __construct($attributes) {

                }
            }

            $entities

            $relations
            EO;
    }
}