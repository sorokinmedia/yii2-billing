<?php

namespace sorokinmedia\billing\handlers\Operation\actions;

use sorokinmedia\billing\entities\Operation\AbstractOperation;
use sorokinmedia\billing\handlers\Operation\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package sorokinmedia\billing\handlers\Operation\actions
 *
 * @property AbstractOperation $operation
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $operation;

    /**
     * AbstractAction constructor.
     * @param AbstractOperation $operation
     */
    public function __construct(AbstractOperation $operation)
    {
        $this->operation = $operation;
        return $this;
    }
}
