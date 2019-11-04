<?php

namespace sorokinmedia\billing\handlers\Bill\actions;

use sorokinmedia\billing\entities\Bill\AbstractBill;
use sorokinmedia\billing\handlers\Bill\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\billing\handlers\Bill\actions
 *
 * @property AbstractBill $bill
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $bill;

    /**
     * AbstractAction constructor.
     * @param AbstractBill $bill
     */
    public function __construct(AbstractBill $bill)
    {
        $this->bill = $bill;
        return $this;
    }
}
