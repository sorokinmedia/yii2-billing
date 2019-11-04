<?php

namespace sorokinmedia\billing\handlers\BillAffiliate\actions;

use yii\db\Exception;

/**
 * Class Increase
 * @package sorokinmedia\billing\handlers\BillAffiliate\actions
 */
class Increase extends AbstractActionWithSum
{
    /**
     * @return bool
     * @throws Exception
     */
    public function execute(): bool
    {
        $this->bill->sum += $this->sum;
        return $this->bill->updateModel();
    }
}
