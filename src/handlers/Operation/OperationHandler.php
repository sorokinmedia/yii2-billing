<?php

namespace sorokinmedia\billing\handlers\Operation;

use sorokinmedia\billing\entities\Operation\AbstractOperation;
use sorokinmedia\billing\handlers\Operation\interfaces\{AdminDelete, Create, Delete, Update};
use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class OperationHandler
 * @package sorokinmedia\billing\handlers\Operation
 *
 * @property AbstractOperation $operation
 */
class OperationHandler implements Create, Update, Delete, AdminDelete
{
    private $operation;

    /**
     * OperationHandler constructor.
     * @param AbstractOperation $operation
     */
    public function __construct(AbstractOperation $operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return bool
     * @throws Throwable
     */
    public function create(): bool
    {
        return (new actions\Create($this->operation))->execute();
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function update(): bool
    {
        return (new actions\Update($this->operation))->execute();
    }


    /**
     * @return bool
     * @throws Exception
     * @throws StaleObjectException
     * @throws Throwable
     * @throws \yii\base\Exception
     */
    public function delete(): bool
    {
        return (new actions\Delete($this->operation))->execute();
    }

    /**
     * @return bool
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function adminDelete(): bool
    {
        return (new actions\AdminDelete($this->operation))->execute();
    }
}
