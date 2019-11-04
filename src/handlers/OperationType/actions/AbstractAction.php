<?php

namespace sorokinmedia\billing\handlers\OperationType\actions;

use sorokinmedia\billing\entities\OperationType\AbstractOperationType;
use sorokinmedia\billing\handlers\OperationType\interfaces\ActionExecutable;

/**
 * Class AbstractAction
 * @package common\components\task\handlers\TaskType\actions
 *
 * @property AbstractOperationType $operation_type
 */
abstract class AbstractAction implements ActionExecutable
{
    protected $operation_type;

    /**
     * AbstractAction constructor.
     * @param AbstractOperationType $operationType
     */
    public function __construct(AbstractOperationType $operationType)
    {
        $this->operation_type = $operationType;
        return $this;
    }
}
