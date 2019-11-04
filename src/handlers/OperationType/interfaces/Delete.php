<?php

namespace sorokinmedia\billing\handlers\OperationType\interfaces;

/**
 * Interface Delete
 * @package sorokinmedia\billing\handlers\OperationType\interfaces
 */
interface Delete
{
    /**
     * @return bool
     */
    public function delete(): bool;
}
