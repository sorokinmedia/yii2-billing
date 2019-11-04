<?php

namespace sorokinmedia\billing\handlers\OperationType\interfaces;

/**
 * Interface Update
 * @package sorokinmedia\billing\handlers\OperationType\interfaces
 */
interface Update
{
    /**
     * @return bool
     */
    public function update(): bool;
}
