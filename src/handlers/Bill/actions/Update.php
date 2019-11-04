<?php

namespace sorokinmedia\billing\handlers\Bill\actions;

use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class Update
 * @package sorokinmedia\billing\handlers\Bill\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws Throwable
     * @throws Exception
     * @throws StaleObjectException
     */
    public function execute(): bool
    {
        return $this->bill->updateModel();
    }
}
