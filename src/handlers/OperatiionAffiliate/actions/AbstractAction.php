<?php

namespace sorokinmedia\billing\handlers\OperationAffiliate\actions;

use sorokinmedia\billing\entities\OperationAffiliate\AbstractOperationAffiliate;
use sorokinmedia\billing\handlers\OperationAffiliate\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\billing\handlers\OperationAffiliate\actions
 *
 * @property AbstractOperationAffiliate $operation
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $operation;

    /**
     * AbstractAction constructor.
     * @param AbstractOperationAffiliate $operation
     */
    public function __construct(AbstractOperationAffiliate $operation)
    {
        $this->operation = $operation;
        return $this;
    }
}
