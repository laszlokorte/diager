<?php

namespace Level1;

class Plotter {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    public function svg(Diagram $diagram) {
        $entityCount = count($diagram->listOfEntity) - 1;
        $entityStepX = 500;
        $entityStartX = -($entityCount * $entityStepX) / 2;
        
        $entities = implode(PHP_EOL, array_map(fn($e, $eidx) => sprintf('<text text-anchor="middle" font-size="50" x="%d" y="0">%s</text>', $entityStartX + $entityStepX * $eidx, $e->id), $diagram->listOfEntity, array_keys($diagram->listOfEntity)));

        return <<<EO
            <svg viewBox="-100 -100 200 200">
            $entities
            </svg>
            EO;
    }
}