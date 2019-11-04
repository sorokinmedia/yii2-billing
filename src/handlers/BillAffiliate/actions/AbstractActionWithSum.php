<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\actions;

use sorokinmedia\billing\entities\BillAffiliate\AbstractBillAffiliate;
use sorokinmedia\billing\handlers\BillAffiliate\interfaces\ActionExecutable;

/**
 * Class AbstractActionWithSum
 * @package sorokinmedia\billing\handlers\BillAffiliate\actions
 *
 * @property AbstractBillAffiliate $bill
 * @property float $sum
 */
abstract class AbstractActionWithSum implements ActionExecutable
{
    protected $bill;
    protected $sum;

    /**
     * AbstractActionWithSum constructor.
     * @param AbstractBillAffiliate $bill
     * @param float $sum
     */
    public function __construct(AbstractBillAffiliate $bill, float $sum)
    {
        $this->bill = $bill;
        $this->sum = $sum;
        return $this;
    }
}
