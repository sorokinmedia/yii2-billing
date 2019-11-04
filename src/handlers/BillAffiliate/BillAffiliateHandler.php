<?php

namespace sorokinmedia\billing\handlers\BillAffiliate;

use sorokinmedia\billing\entities\BillAffiliate\AbstractBillAffiliate;
use sorokinmedia\billing\handlers\Bill\interfaces\{Decrease, Increase, Update};
use yii\db\Exception;

/**
 * Class BillAffiliateHandler
 * @package sorokinmedia\billing\handlers\BillAffiliate
 *
 * @property AbstractBillAffiliate $bill
 */
class BillAffiliateHandler implements Increase, Decrease, Update
{
    public $bill;

    /**
     * BillAffiliateHandler constructor.
     * @param AbstractBillAffiliate $bill
     */
    public function __construct(AbstractBillAffiliate $bill)
    {
        $this->bill = $bill;
        return $this;
    }

    /**
     * @param float $sum
     * @return bool
     * @throws Exception
     */
    public function increase(float $sum = 0): bool
    {
        return (new actions\Increase($this->bill, $sum))->execute();
    }

    /**
     * @param float $sum
     * @return bool
     * @throws Exception
     */
    public function decrease(float $sum = 0): bool
    {
        return (new actions\Decrease($this->bill, $sum))->execute();
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function update(): bool
    {
        return (new actions\Update($this->bill))->execute();
    }
}
