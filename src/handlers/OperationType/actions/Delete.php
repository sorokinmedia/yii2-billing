<?php

namespace sorokinmedia\billing\handlers\OperationType\actions;

use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class Delete
 * @package sorokinmedia\billing\handlers\OperationType\actions
 */
class Delete extends AbstractAction
{
    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function execute(): bool
    {
        $this->operation_type->deleteModel();
        return true;
    }
}
