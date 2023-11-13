<?php

namespace Level4;

class Validator {
    public function validate(Diagram $schema, object $instance) {
        $expectedClass = __NAMESPACE__ . '\\' . $schema->id;

        if(get_class($instance) != $expectedClass) {
            return false;
        }

        $expectedEntityCount = count($schema->listOfEntity);
        $expectedRelationCount = count($schema->listOfRelation);

        $exptectedFieldCount = $expectedEntityCount + $expectedRelationCount;

        $instanceVarsExceptId = array_values(array_filter(array_keys(get_object_vars($instance)), fn($var) => $var !== 'id'));

        if(count($instanceVarsExceptId) != $exptectedFieldCount) {
            return false;
        }

        foreach ($schema->listOfEntity as $schemaEntity) {
            $expectedClass = __NAMESPACE__ . '\\' . $schemaEntity->id;
            $instanceField = 'listOf' . $schemaEntity->id;

            if(!is_array($instance->$instanceField)) {
                return false;
            }

            foreach ($instance->$instanceField as $instanceFieldValue) {
                if(get_class($instanceFieldValue) !== $expectedClass) {
                    return false;
                }
            }
        }

        foreach ($schema->listOfRelation as $schemaRelation) {
            $expectedClass = __NAMESPACE__ . '\\' . $schemaRelation->id;
            $instanceField = 'listOf' . $schemaRelation->id;

            if(!is_array($instance->$instanceField)) {
                return false;
            }

            foreach ($instance->$instanceField as $instanceFieldValue) {
                if(get_class($instanceFieldValue) !== $expectedClass) {
                    return false;
                }
            }
        }

        return true;
    }
}