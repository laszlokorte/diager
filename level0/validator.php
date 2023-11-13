<?php


namespace Level0;

class Validator {
    public function validate(Diagram $schema, object $instance) {
        $expectedClass = __NAMESPACE__ . '\\' . $schema->id;
        return $schema == $instance && get_class($instance) == $expectedClass;
    }
}