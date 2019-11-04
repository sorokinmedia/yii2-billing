<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\actions;

use sorokinmedia\billing\entities\BillAffiliate\AbstractBillAffiliate;
use sorokinmedia\billing\handlers\BillAffiliate\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\billing\handlers\BillAffiliate\actions
 *
 * @property AbstractBillAffiliate $bill
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $bill;

    /**
     * AbstractAction constructor.
     * @param AbstractBillAffiliate $bill
     */
    public function __construct(AbstractBillAffiliate $bill)
    {
        $this->bill = $bill;
        return $this;
    }
}
