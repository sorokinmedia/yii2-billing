<?php

namespace sorokinmedia\billing\handlers\Bill\actions;

use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class Increase
 * @package sorokinmedia\billing\handlers\Bill\actions
 */
class Increase extends AbstractActionWithSum
{
    /**
     * @return bool
     * @throws Throwable
     * @throws Exception
     * @throws StaleObjectException
     */
    public function execute(): bool
    {
        $this->bill->sum += $this->sum;
        return $this->bill->updateModel();
    }
}
