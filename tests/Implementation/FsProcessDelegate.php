<?php

namespace NigelCunningham\Rialto\Tests\Implementation;

use NigelCunningham\Rialto\Traits\UsesBasicResourceAsDefault;
use NigelCunningham\Rialto\Interfaces\ShouldHandleProcessDelegation;

class FsProcessDelegate implements ShouldHandleProcessDelegation
{
    use UsesBasicResourceAsDefault;

    public function resourceFromOriginalClassName(string $className): ?string
    {
        $class = __NAMESPACE__."\\Resources\\$className";

        return class_exists($class) ? $class : null;
    }
}
