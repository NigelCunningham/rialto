<?php

namespace NigelCunningham\Rialto\Traits;

use RuntimeException;
use NigelCunningham\Rialto\Data\ResourceIdentity;

trait IdentifiesResource
{
    /**
     * The identity of the resource.
     *
     * @var \NigelCunningham\Rialto\ResourceIdentity
     */
    protected $resourceIdentity;

    /**
     * Return the identity of the resource.
     */
    public function getResourceIdentity(): ?ResourceIdentity
    {
        return $this->resourceIdentity;
    }

    /**
     * Set the identity of the resource.
     *
     * @throws \RuntimeException if the resource identity has already been set.
     */
    public function setResourceIdentity(ResourceIdentity $identity): void
    {
        if ($this->resourceIdentity !== null) {
            throw new RuntimeException('The resource identity has already been set.');
        }

        $this->resourceIdentity = $identity;
    }
}
