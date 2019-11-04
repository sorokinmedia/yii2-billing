<?php

namespace sorokinmedia\billing\handlers\OperationType\interfaces;

/**
 * Interface Create
 * @package sorokinmedia\billing\handlers\OperationType\interfaces
 */
interface Create
{
    /**
     * @return bool
     */
    public function create(): bool;
}
