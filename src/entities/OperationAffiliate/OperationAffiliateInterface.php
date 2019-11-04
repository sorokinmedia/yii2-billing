<?php
namespace sorokinmedia\billing\entities\Operation;

use yii\db\ActiveQuery;

interface OperationAffiliateInterface
{
    /**
     * получение связанного счета
     * @return ActiveQuery
     */
    public function getBill(): ActiveQuery;

    /**
     * получение связанного типа операции
     * @return ActiveQuery
     */
    public function getType(): ActiveQuery;

    /**
     * получение связанной модели
     * @return ActiveQuery
     */
    public function getModel(): ActiveQuery;

    /**
     * получение связанного пользователя
     * @return ActiveQuery
     */
    public function getUser(): ActiveQuery;

    /**
     * добавление модели в БД
     * @return bool
     */
    public function insertModel(): bool;

    /**
     * удаление модели из БД
     * @return bool
     */
    public function deleteModel(): bool;
}
