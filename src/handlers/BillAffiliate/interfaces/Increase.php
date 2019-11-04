<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\interfaces;

/**
 * Interface Increase
 * @package sorokinmedia\billing\handlers\BillAffiliate\interfaces
 */
interface Increase
{
    /**
     * @param float $sum
     * @return bool
     */
    public function increase(float $sum = 0): bool;
}
