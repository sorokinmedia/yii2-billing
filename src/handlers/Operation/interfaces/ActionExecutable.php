<?php

namespace sorokinmedia\billing\handlers\Operation\interfaces;

/**
 * Interface ActionExecutable
 * @package sorokinmedia\billing\handlers\Operation\interfaces
 */
interface ActionExecutable
{
    /**
     * @return mixed
     */
    public function execute();
}
