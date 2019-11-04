<?php

namespace sorokinmedia\billing\handlers\Operation\interfaces;

/**
 * Interface Delete
 * @package sorokinmedia\billing\handlers\Operation\interfaces
 */
interface Delete
{
    /**
     * @return bool
     */
    public function delete(): bool;
}
