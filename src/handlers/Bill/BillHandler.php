<?php

namespace sorokinmedia\billing\handlers\Bill;

use sorokinmedia\billing\handlers\Bill\interfaces\{Decrease, Increase, Update};
use sorokinmedia\entities\Bill\AbstractBill;
use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class BillHandler
 * @package sorokinmedia\billing\handlers\Bill
 *
 * @property AbstractBill $bill
 */
class BillHandler implements Increase, Decrease, Update
{
    public $bill;

    /**
     * BillHandler constructor.
     * @param AbstractBill $bill
     */
    public function __construct(AbstractBill $bill)
    {
        $this->bill = $bill;
        return $this;
    }

    /**
     * @param float $sum
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function increase(float $sum = 0): bool
    {
        return (new actions\Increase($this->bill, $sum))->execute();
    }

    /**
     * @param float $sum
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function decrease(float $sum = 0): bool
    {
        return (new actions\Decrease($this->bill, $sum))->execute();
    }

    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function update(): bool
    {
        return (new actions\Update($this->bill))->execute();
    }
}
