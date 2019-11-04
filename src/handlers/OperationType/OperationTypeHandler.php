<?php

namespace sorokinmedia\billing\handlers\OperationType;

use sorokinmedia\billing\entities\OperationType\AbstractOperationType;
use sorokinmedia\billing\handlers\OperationType\interfaces\{Create, Delete, Update};
use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class TaskTypeHandler
 * @package common\components\task\handlers\TaskType
 *
 * @property AbstractOperationType $operation_type
 */
class OperationTypeHandler implements Create, Update, Delete
{
    private $operation_type;

    /**
     * OperationTypeHandler constructor.
     * @param AbstractOperationType $operationType
     */
    public function __construct(AbstractOperationType $operationType)
    {
        $this->operation_type = $operationType;
        return $this;
    }

    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     */
    public function create(): bool
    {
        return (new actions\Create($this->operation_type))->execute();
    }

    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     */
    public function update(): bool
    {
        return (new actions\Update($this->operation_type))->execute();
    }

    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function delete(): bool
    {
        return (new actions\Delete($this->operation_type))->execute();
    }
}

