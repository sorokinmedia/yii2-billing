<?php

namespace sorokinmedia\billing\handlers\OperationAffiliate\actions;

use Throwable;
use yii\db\StaleObjectException;

/**
 * Class AdminDelete
 * @package sorokinmedia\billing\handlers\OperationAffiliate\actions
 */
class AdminDelete extends AbstractAction
{
    /**
     * @return bool|mixed
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function execute()
    {
        return $this->operation->deleteModel();
    }
}
