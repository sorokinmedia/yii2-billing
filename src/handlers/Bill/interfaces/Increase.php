<?php

namespace sorokinmedia\billing\handlers\Bill\interfaces;

/**
 * Interface Increase
 * @package sorokinmedia\billing\handlers\Bill\interfaces
 */
interface Increase
{
    /**
     * @param float $sum
     * @return bool
     */
    public function increase(float $sum = 0): bool;
}
