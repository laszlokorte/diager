<?php

namespace Level3;

class Plotter {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    public function svg(Diagram $diagram) {
        $entityCount = count($diagram->listOfEntity) - 1;
        $entityY = 0;
        $entityStepX = 500;
        $entityStartX = -($entityCount * $entityStepX) / 2;
        
        $entities = implode(PHP_EOL, array_map(fn($e, $eidx) => sprintf('<text text-anchor="middle" font-size="50" x="%d" y="%d">%s</text>', $entityStartX + $entityStepX * $eidx, $entityY, $e->id), $diagram->listOfEntity, array_keys($diagram->listOfEntity)));

        $relationCount = count($diagram->listOfRelation) - 1;
        $relationY = 100;
        $relationStepX = 500;
        $relationStartX = -($relationCount * $relationStepX) / 2;

        $relations = implode(PHP_EOL, array_map(
            fn($r, $ridx) => sprintf('<text text-anchor="middle" font-size="50" x="%d" y="%d">%s</text>', $relationStartX + $relationStepX * $ridx, $relationY, $r->id), 
            $diagram->listOfRelation, 
            array_keys($diagram->listOfRelation))
        );

        $associations = implode(PHP_EOL, array_map(
            function($a, $aidx) use ($diagram, $entityStepX, $entityStartX, $entityY, $relationStepX, $relationStartX, $relationY) {
                return sprintf('<line stroke="black" x1="%d" y1="%d" x2="%d" y2="%d" />', $entityStartX + $entityStepX * $a->EntityIndex, $entityY, $relationStartX + $relationStepX * $a->RelationIndex, $relationY);
            }, 
            $diagram->listOfAssociation, 
            array_keys($diagram->listOfAssociation))
        );

        return <<<EO
            <svg viewBox="-100 -200 200 400">
            $entities
            $relations
            $associations
            </svg>
            EO;
    }
}