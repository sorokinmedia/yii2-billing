<?php

namespace sorokinmedia\billing\handlers\Operation\actions;

use Throwable;
use yii\db\StaleObjectException;

/**
 * Class AdminDelete
 * @package sorokinmedia\billing\handlers\Operation\actions
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
