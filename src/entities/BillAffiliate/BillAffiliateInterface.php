<?php
namespace sorokinmedia\billing\entities\BillAffiliate;

use yii\db\ActiveQuery;

/**
 * Interface BillAffiliateInterface
 * @package sorokinmedia\entities\Bill
 *
 * Интерфейс для работы с аффилиатным счетом
 */
interface BillAffiliateInterface
{
    /**
     * получение связанного пользователя
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery;

    /**
     * получения связанных операций
     * @return ActiveQuery
     */
    public function getOperations(): ActiveQuery;

    /**
     * @param int $user_id
     * @return AbstractBillAffiliate
     */
    public static function create(int $user_id): AbstractBillAffiliate;

    /**
     * @return bool
     */
    public function updateModel(): bool;
}
