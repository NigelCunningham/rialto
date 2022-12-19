<?php

namespace NigelCunningham\Rialto\Tests\Implementation;

use NigelCunningham\Rialto\AbstractEntryPoint;

class FsWithoutProcessDelegation extends AbstractEntryPoint
{
    public function __construct()
    {
        parent::__construct(__DIR__.'/FsConnectionDelegate.js');
    }
}
