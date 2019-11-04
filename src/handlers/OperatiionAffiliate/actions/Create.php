<?php

namespace sorokinmedia\billing\handlers\OperationAffiliate\actions;

use Throwable;

/**
 * Class Create
 * @package sorokinmedia\billing\handlers\OperationAffiliate\actions
 */
class Create extends AbstractAction
{
    /**
     * @return bool|mixed
     * @throws Throwable
     */
    public function execute()
    {
        return $this->operation->insertModel();
    }
}
