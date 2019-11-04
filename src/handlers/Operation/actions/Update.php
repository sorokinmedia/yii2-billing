<?php

namespace sorokinmedia\billing\handlers\Operation\actions;

use yii\db\Exception;

/**
 * Class Update
 * @package sorokinmedia\billing\handlers\Operation\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool|mixed
     * @throws Exception
     */
    public function execute()
    {
        return $this->operation->updateModel();
    }
}
