<?php

namespace NigelCunningham\Rialto\Tests\Implementation;

use NigelCunningham\Rialto\ProcessSupervisor;
use NigelCunningham\Rialto\AbstractEntryPoint;

class FsWithProcessDelegation extends AbstractEntryPoint
{
    protected $forbiddenOptions = ['stop_timeout', 'foo'];

    public function __construct(array $userOptions = [])
    {
        parent::__construct(__DIR__.'/FsConnectionDelegate.js', new FsProcessDelegate, [], $userOptions);
    }

    public function getProcessSupervisor(): ProcessSupervisor
    {
        return parent::getProcessSupervisor();
    }
}
