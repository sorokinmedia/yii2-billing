<?php

namespace sorokinmedia\billing\handlers\Bill\interfaces;

/**
 * Interface Decrease
 * @package sorokinmedia\billing\handlers\Bill\interfaces
 */
interface Decrease
{
    /**
     * @param float $sum
     * @return bool
     */
    public function decrease(float $sum = 0): bool;
}
