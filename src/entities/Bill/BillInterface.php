<?php
namespace sorokinmedia\entities\Bill;

use yii\db\ActiveQuery;

/**
 * Interface BillInterface
 * @package sorokinmedia\entities\Bill
 *
 * Интерфейс для работы со счетом
 */
interface BillInterface
{
    /**
     * трансфер данных из формы в модель
     */
    public function getFromForm(): void;

    /**
     * добавление модели в БД
     * @return bool
     */
    public function insertModel(): bool;

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
     * геттер для ID счета админа
     * @return int
     */
    public function getAdminBillId(): int;

    /**
     * сеттер для ID счета админа
     * @param int $admin_bill_id
     */
    public function setAdminBillId(int $admin_bill_id): void;

    /**
     * геттер для ID админа
     * @return int
     */
    public function getAdminUserId(): int;

    /**
     * сеттер для ID админа
     * @param int $admin_user_id
     */
    public function setAdminUserId(int $admin_user_id): void;
}
