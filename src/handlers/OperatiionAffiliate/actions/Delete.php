<?php

namespace sorokinmedia\billing\handlers\OperationAffiliate\actions;

use RuntimeException;
use sorokinmedia\billing\entities\Operation\AbstractOperation;
use Throwable;
use Yii;
use yii\db\Exception;
use yii\db\StaleObjectException;

/**
 * Class Delete
 * @package sorokinmedia\billing\handlers\OperationAffiliate\actions
 */
class Delete extends AbstractAction
{
    /**
     * @return bool|mixed
     * @throws Throwable
     * @throws \yii\base\Exception
     * @throws Exception
     * @throws StaleObjectException
     */
    public function execute()
    {
        //todo: refactor
        /** @var AbstractOperation $last_operation */
        $last_operation = $this->operation->bill->lastOperation;
        if ($last_operation->id !== $this->operation->id) {
            throw new RuntimeException(Yii::t('app', 'Не последняя операция. Удаление запрещено. Обратитесь к админу'));
        }
        return $this->operation->deleteModel();
    }
}
