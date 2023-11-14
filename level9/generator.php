<?php

namespace Level9;

class Generator {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    private function attrToParam($attr) {
        return sprintf('public %s $%s', $attr->Type, $attr->Id);
    }


    private function isAbtract($diagram, $entId) {
        foreach($diagram->listOfInherits AS $inherit) {
            if($inherit->InheritsEntityParentId === $entId) {
                return true;
            }
        }

        return false;
    }

    private function getParents($diagram, $entId) {
        $result = [];

        foreach($diagram->listOfInherits AS $inherit) {
            if($inherit->InheritsEntityChildId === $entId) {
                $result[] = $inherit->InheritsEntityParentId;
            }
        }

        return $result;
    }

    private function entityAttributes($diagram, $entId) {
        $parentsOrSelf = [$entId, ...$this->parentEntities($diagram, $entId)];

        return array_map(fn($cons) => current(array_filter($diagram->listOfAttribute, fn ($a) => $a->Id == $cons->ConsistingAttributeId)), array_filter($diagram->listOfConsisting, fn($cons) => in_array($cons->ConsistingERObjectId, $parentsOrSelf)));
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
            public \$listOf$ent->Id = []
            EO, array_filter($diagram->listOfEntity, fn($ent) => !$this->isAbtract($diagram, $ent->Id))),
            ...array_map(fn($rel) => <<<EO
            public \$listOf$rel->Id = []
            EO, $diagram->listOfRelation)
        ]);

        $entities = implode(PHP_EOL, array_map(function($ent) use ($diagram) { 

            $attributes = implode(', ', array_map(fn($atr) => $this->attrToParam($atr), $this->entityAttributes($diagram, $ent->Id)));

            $entityDecl = $this->isAbtract($diagram, $ent->Id) ? 'abstract class' : 'class';
            $parents = $this->getParents($diagram, $ent->Id);
            $extends = empty($parents) ? ' ' : 'extends ' . implode(', ', $parents) . ' ';

            return <<<EO
            $entityDecl $ent->Id $extends{
                function __construct($attributes) {
                }
            }

            EO;
        }, $diagram->listOfEntity));

        $relations = implode(PHP_EOL, array_map(function($rel) use($diagram) { 
            $params = implode(', ', array_map(fn($att) => $this->attrToParam($att), $this->entityAttributes($diagram, $rel->Id)));

            return <<<EO
            class $rel->Id {
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