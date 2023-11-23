<?php

namespace Level5;

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
                return sprintf('<line stroke="red" x1="%d" y1="%d" x2="%d" y2="%d" />', $entityStartX + $entityStepX * $a->EntityIndex, $entityY, $relationStartX + $relationStepX * $a->RelationIndex, $relationY);
            }, 
            $diagram->listOfAssociation, 
            array_keys($diagram->listOfAssociation))
        );

        $attributeCount = count($diagram->listOfAttribute) - 1;
        $attributeY = -100;
        $attributeStepX = 500;
        $attributeStartX = -($attributeCount * $attributeStepX) / 2;
        
        $attributes = implode(PHP_EOL, array_map(fn($e, $eidx) => sprintf('<text text-anchor="middle" font-size="50" x="%d" y="%d">%s</text>', $attributeStartX + $attributeStepX * $eidx, $attributeY, $e->id), $diagram->listOfAttribute, array_keys($diagram->listOfAttribute)));

        $consistings = implode(PHP_EOL, array_map(
            function($c, $cidx) use ($diagram, $entityStepX, $entityStartX, $entityY, $attributeStepX, $attributeStartX, $attributeY) {
                return sprintf('<line stroke="blue" x1="%d" y1="%d" x2="%d" y2="%d" />', $entityStartX + $entityStepX * $c->EntityIndex, $entityY, $attributeStartX + $attributeStepX * $c->AttributeIndex, $attributeY);
            }, 
            $diagram->listOfConsisting, 
            array_keys($diagram->listOfConsisting))
        );


        $relationAttributeCount = count($diagram->listOfRelationAttribute) - 1;
        $relationAttributeY = 200;
        $relationAttributeStepX = 500;
        $relationAttributeStartX = -($relationAttributeCount * $relationAttributeStepX) / 2;
        
        $relationAttributes = implode(PHP_EOL, array_map(fn($e, $eidx) => sprintf('<text text-anchor="middle" font-size="50" x="%d" y="%d">%s</text>', $relationAttributeStartX + $relationAttributeStepX * $eidx, $relationAttributeY, $e->id), $diagram->listOfRelationAttribute, array_keys($diagram->listOfRelationAttribute)));

        $attachments = implode(PHP_EOL, array_map(
            function($c, $cidx) use ($diagram, $relationStepX, $relationStartX, $relationY, $relationAttributeStepX, $relationAttributeStartX, $relationAttributeY) {
                return sprintf('<line stroke="green" x1="%d" y1="%d" x2="%d" y2="%d" />', $relationStartX + $relationStepX * $c->RelationIndex, $relationY, $relationAttributeStartX + $relationAttributeStepX * $c->RelationAttributeIndex, $relationAttributeY);
            }, 
            $diagram->listOfAttached, 
            array_keys($diagram->listOfAttached))
        );

        return <<<EO
            <svg viewBox="-100 -300 200 600">
            $entities
            $relations
            $associations
            $attributes
            $consistings
            $relationAttributes
            $attachments
            </svg>
            EO;
    }
}