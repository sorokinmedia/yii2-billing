<?php

namespace sorokinmedia\billing\handlers\OperationType\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\billing\handlers\OperationType\interfaces
 */
interface ActionExecutable
{
    /**
     * @return mixed
     */
    public function execute();
}
