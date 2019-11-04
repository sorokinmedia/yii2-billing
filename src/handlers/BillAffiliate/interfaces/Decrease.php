<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\interfaces;

/**
 * Interface Decrease
 * @package sorokinmedia\billing\handlers\BillAffiliate\interfaces
 */
interface Decrease
{
    /**
     * @param float $sum
     * @return bool
     */
    public function decrease(float $sum = 0): bool;
}
