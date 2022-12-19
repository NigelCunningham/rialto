<?php

namespace NigelCunningham\Rialto\Data;

use NigelCunningham\Rialto\Traits\{IdentifiesResource, CommunicatesWithProcessSupervisor};
use NigelCunningham\Rialto\Interfaces\{ShouldIdentifyResource, ShouldCommunicateWithProcessSupervisor};

class BasicResource implements ShouldIdentifyResource, ShouldCommunicateWithProcessSupervisor, \JsonSerializable
{
    use IdentifiesResource, CommunicatesWithProcessSupervisor;

    /**
     * Serialize the object to a value that can be serialized natively by {@see json_encode}.
     */
    public function jsonSerialize(): ResourceIdentity
    {
        return $this->getResourceIdentity();
    }
}
