<?php

namespace Level2;

class Plotter {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    public function svg(Diagram $diagram) {
        $entities = implode(PHP_EOL, array_map(fn($e) => sprintf('<text text-anchor="middle" font-size="50" x="0" y="0">%s</text>', $e->id), $diagram->listOfEntity));
        
        $relations = implode(PHP_EOL, array_map(fn($e) => sprintf('<text text-anchor="middle" font-size="50" x="0" y="100">%s</text>', $e->id), $diagram->listOfRelation));

        return <<<EO
            <svg viewBox="-100 -100 200 200">
            $entities
            $relations
            </svg>
            EO;
    }
}