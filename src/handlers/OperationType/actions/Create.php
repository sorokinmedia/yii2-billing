<?php

namespace sorokinmedia\billing\handlers\OperationType\actions;

use Throwable;
use yii\db\Exception;

/**
 * Class Create
 * @package sorokinmedia\billing\handlers\OperationType\actions
 */
class Create extends AbstractAction
{
    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     */
    public function execute(): bool
    {
        $this->operation_type->insertModel();
        return true;
    }
}
