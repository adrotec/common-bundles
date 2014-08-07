<?php

namespace Adrotec\Common\CoreBundle\EventListener\Doctrine;

interface HasSequenceInterface {
        
    public function getSequenceProperty();
    public function setSequenceValue($sequenceValue);
    public function sequenceConditionWhere($alias);
    public function sequenceConditionParameters();
    
}
