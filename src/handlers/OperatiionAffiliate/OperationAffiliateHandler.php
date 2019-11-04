<?php

namespace sorokinmedia\billing\handlers\OperationAffiliate;

use sorokinmedia\billing\entities\OperationAffiliate\AbstractOperationAffiliate;
use sorokinmedia\billing\handlers\OperationAffiliate\interfaces\{AdminDelete, Create, Delete};
use Throwable;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class OperationAffiliateHandler
 * @package sorokinmedia\billing\handlers\OperationAffiliate
 *
 * @property AbstractOperationAffiliate $operation
 */
class OperationAffiliateHandler implements Create, Delete, AdminDelete
{
    private $operation;

    /**
     * OperationAffiliateHandler constructor.
     * @param AbstractOperationAffiliate $operation
     */
    public function __construct(AbstractOperationAffiliate $operation)
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return bool
     * @throws Throwable
     */
    public function create(): bool
    {
        return (new actions\Create($this->operation))->execute();
    }

    /**
     * @return bool
     * @throws Exception
     * @throws StaleObjectException
     * @throws Throwable
     * @throws \yii\base\Exception
     */
    public function delete(): bool
    {
        return (new actions\Delete($this->operation))->execute();
    }

    /**
     * @return bool
     * @throws StaleObjectException
     * @throws Throwable
     */
    public function adminDelete(): bool
    {
        return (new actions\AdminDelete($this->operation))->execute();
    }
}
