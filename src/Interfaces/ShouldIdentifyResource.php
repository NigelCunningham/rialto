<?php

namespace NigelCunningham\Rialto\Interfaces;

use NigelCunningham\Rialto\Data\ResourceIdentity;

interface ShouldIdentifyResource
{
    /**
     * Return the identity of the resource.
     */
    public function getResourceIdentity(): ?ResourceIdentity;

    /**
     * Set the identity of the resource.
     *
     * @throws \RuntimeException if the resource identity has already been set.
     */
    public function setResourceIdentity(ResourceIdentity $identity): void;
}
