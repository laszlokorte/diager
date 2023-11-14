<?php

namespace Level7;

class Generator {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    private function attrToParam($attr) {
        return sprintf('public %s $%s', $attr->AtrTyp, $attr->AtrId);
    }

    private function relAttrToParam($relAtr) {
        return sprintf('public %s $%s', $relAtr->RelAtrTyp, $relAtr->RelAtrId);
    }

    public function generate(Diagram $diagram) {
        $attributes = implode(', ', [
            'public string $id',
            ...array_map(fn($ent) => <<<EO
            public \$listOf$ent->EntId = []
            EO, $diagram->listOfEntity),
            ...array_map(fn($rel) => <<<EO
            public \$listOf$rel->RelId = []
            EO, $diagram->listOfRelation)
        ]);

        $entities = implode(PHP_EOL, array_map(function($ent) use ($diagram) { 

            $attributes = implode(', ', array_map(fn($cons) => $this->attrToParam(current(array_filter($diagram->listOfAttribute, fn ($a) => $a->AtrId == $cons->ConsistingAttributeId))), array_filter($diagram->listOfConsisting, fn($cons) => $cons->ConsistingEntityId === $ent->EntId)));

            return <<<EO
            class $ent->EntId {
                function __construct($attributes) {
                }
            }
            EO;
        }, $diagram->listOfEntity));

        $relations = implode(PHP_EOL, array_map(function($rel) use($diagram) { 
            $params = implode(', ', [
                ...array_map(fn($att) => $this->relAttrToParam(current(array_filter($diagram->listOfRelationAttribute, fn ($a) => $a->RelAtrId == $att->AttachedRelationAttributeId))), array_filter($diagram->listOfAttached, fn($att) => $att->AttachedRelationId === $rel->RelId))
            ]);

            return <<<EO
            class $rel->RelId {
                function __construct($params) {
                }
            }
            EO;
        }, $diagram->listOfRelation));

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