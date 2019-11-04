<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\actions;

use yii\db\Exception;

/**
 * Class Update
 * @package sorokinmedia\billing\handlers\BillAffiliate\actions
 */
class Update extends AbstractAction
{
    /**
     * @return bool
     * @throws Exception
     */
    public function execute(): bool
    {
        return $this->bill->updateModel();
    }
}
