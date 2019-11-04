<?php
namespace sorokinmedia\billing\handlers\Bill\actions;

use sorokinmedia\billing\handlers\Bill\interfaces\ActionExecutable;
use sorokinmedia\entities\Bill\AbstractBill;

/**
 * Class AbstractActionWithSum
 * @package sorokinmedia\billing\handlers\Bill\actions
 *
 * @property AbstractBill $bill
 * @property float $sum
 */
abstract class AbstractActionWithSum implements ActionExecutable
{
    protected $bill;
    protected $sum;

    /**
     * AbstractActionWithSum constructor.
     * @param AbstractBill $bill
     * @param float $sum
     */
    public function __construct(AbstractBill $bill, float $sum)
    {
        $this->bill = $bill;
        $this->sum = $sum;
        return $this;
    }
}
