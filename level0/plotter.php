<?php

namespace Level0;

class Plotter {
    public function __construct(public $namespace = __NAMESPACE__) {

    }

    public function svg(Diagram $diagram) {
        return <<<EO
            <svg viewBox="0 0 500 500">

            </svg>
            EO;
    }
}