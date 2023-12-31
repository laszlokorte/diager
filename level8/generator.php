<?php

namespace Level8;

class Generator {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    private function attrToParam($attr) {
        return sprintf('public %s $%s', $attr->AtrTyp, $attr->AtrId);
    }

    private function relAttrToParam($relAtr) {
        return sprintf('public %s $%s', $relAtr->RelAtrTyp, $relAtr->RelAtrId);
    }

    private function isAbtract($diagram, $entId) {
        foreach($diagram->listOfInherits AS $inherit) {
            if($inherit->InheritsEntityParentId === $entId) {
                return true;
            }
        }

        return false;
    }

    private function entityAttributes($diagram, $entId) {
        $parentsOrSelf = [$entId, ...$this->parentEntities($diagram, $entId)];

        return array_map(fn($cons) => current(array_filter($diagram->listOfAttribute, fn ($a) => $a->AtrId == $cons->ConsistingAttributeId)), array_filter($diagram->listOfConsisting, fn($cons) => in_array($cons->ConsistingEntityId, $parentsOrSelf)));
    }

    private function relationAttributes($diagram, $relId) {
        $parentsOrSelf = [$relId];

        return array_map(fn($att) => current(array_filter($diagram->listOfRelationAttribute, fn ($a) => $a->RelAtrId == $att->AttachedRelationAttributeId)), array_filter($diagram->listOfAttached, fn($att) => $att->AttachedRelationId === $relId));
    }

    private function parentEntities($diagram, $entId) {
        $result = [];

        foreach($diagram->listOfInherits AS $inherit) {
            if($inherit->InheritsEntityChildId === $entId) {
                $result[] = $inherit->InheritsEntityParentId;

                foreach($this->parentEntities($diagram, $inherit->InheritsEntityParentId) AS $trans) {
                    $result[] = $trans;
                }
            }
        }

        return $result;
    }

    public function generate(Diagram $diagram) {
        $attributes = implode(', ', [
            'public string $id',
            ...array_map(fn($ent) => <<<EO
            public \$listOf$ent->EntId = []
            EO, array_filter($diagram->listOfEntity, fn($ent) => !$this->isAbtract($diagram, $ent->EntId))),
            ...array_map(fn($rel) => <<<EO
            public \$listOf$rel->RelId = []
            EO, $diagram->listOfRelation)
        ]);

        $entities = implode(PHP_EOL, array_map(function($ent) use ($diagram) { 

            $attributes = implode(', ', array_map(fn($atr) => $this->attrToParam($atr), $this->entityAttributes($diagram, $ent->EntId)));

            $entityDecl = $this->isAbtract($diagram, $ent->EntId) ? 'abstract class' : 'class';

            return <<<EO
            $entityDecl $ent->EntId {
                function __construct($attributes) {
                }
            }
            EO;
        }, $diagram->listOfEntity));

        $relations = implode(PHP_EOL, array_map(function($rel) use($diagram) { 
            $params = implode(', ', [
                ...array_map(fn($att) => $this->relAttrToParam($att), $this->relationAttributes($diagram, $rel->RelId)),
                ...array_map(fn($att) => $this->attrToParam($att), $this->entityAttributes($diagram, $rel->RelId)),
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