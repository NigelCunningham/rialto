<?php

namespace NigelCunningham\Rialto\Data;

use NigelCunningham\Rialto\Exceptions\Node\Exception;
use NigelCunningham\Rialto\Interfaces\ShouldHandleProcessDelegation;
use NigelCunningham\Rialto\Interfaces\{ShouldIdentifyResource, ShouldCommunicateWithProcessSupervisor};

trait UnserializesData
{
    /**
     * Unserialize a value.
     */
    protected function unserialize($value)
    {
        if (!is_array($value)) {
            return $value;
        } else {
            if (($value['__rialto_error__'] ?? false) === true) {
                return new Exception($value, $this->options['debug']);
            } else if (($value['__rialto_resource__'] ?? false) === true) {
                if ($this->delegate instanceof ShouldHandleProcessDelegation) {
                    $classPath = $this->delegate->resourceFromOriginalClassName($value['class_name'])
                        ?: $this->delegate->defaultResource();
                } else {
                    $classPath = $this->defaultResource();
                }

                $resource = new $classPath;

                if ($resource instanceof ShouldIdentifyResource) {
                    $resource->setResourceIdentity(new ResourceIdentity($value['class_name'], $value['id']));
                }

                if ($resource instanceof ShouldCommunicateWithProcessSupervisor) {
                    $resource->setProcessSupervisor($this);
                }

                return $resource;
            } else {
                return array_map(function ($value) {
                    return $this->unserialize($value);
                }, $value);
            }
        }
    }
}
