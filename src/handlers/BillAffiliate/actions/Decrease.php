<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\actions;

use yii\db\Exception;

/**
 * Class Decrease
 * @package sorokinmedia\billing\handlers\BillAffiliate\actions
 */
class Decrease extends AbstractActionWithSum
{
    /**
     * @return bool
     * @throws Exception
     */
    public function execute(): bool
    {
        $this->bill->sum -= $this->sum;
        return $this->bill->updateModel();
    }
}
