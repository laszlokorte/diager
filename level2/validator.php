<?php

namespace Level2;

class Validator {
    public function validate(Diagram $schema, object $instance) {
        $expectedClass = __NAMESPACE__ . '\\' . $schema->id;

        if(get_class($instance) != $expectedClass) {
            return false;
        }

        $expectedEntityCount = count($schema->listOfEntity);
        $instanceVarsExceptId = array_values(array_filter(array_keys(get_object_vars($instance)), fn($var) => $var !== 'id'));

        if(count($instanceVarsExceptId) != $expectedEntityCount) {
            return false;
        }

        foreach ($instanceVarsExceptId as $index => $instanceField) {
            $schemaEntity = $schema->listOfEntity[$index];
            $expectedClass = __NAMESPACE__ . '\\' . $schemaEntity->id;


            foreach ($instance->$instanceField as $instanceFieldValue) {
                if(get_class($instanceFieldValue) !== $expectedClass) {
                    return false;
                }
            }

        }

        return true;
    }
}