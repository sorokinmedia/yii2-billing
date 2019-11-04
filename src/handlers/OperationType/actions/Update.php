<?php

namespace sorokinmedia\billing\handlers\OperationType\actions;

use Throwable;
use yii\db\Exception;

/**
 * Class Update
 * @package sorokinmedia\billing\handlers\OperationType\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws Throwable
     * @throws Exception
     */
    public function execute(): bool
    {
        $this->operation_type->updateModel();
        return true;
    }
}
