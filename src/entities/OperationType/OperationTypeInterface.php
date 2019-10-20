<?php
namespace sorokinmedia\billing\entities\OperationType;

use yii\db\ActiveQuery;

/**
 * Interface OperationTypeInterface
 * @package sorokinmedia\entities\OperationType
 *
 * Интерфейс для работы с типами операций
 */
interface OperationTypeInterface
{
    /**
     * получить связанные операции
     * @return ActiveQuery
     */
    public function getOperations(): ActiveQuery;

    /**
     * получить типы по роли
     * @param string $role
     * @return array
     */
    public static function findByRole(string $role): array;

    /**
     * получить массив всех типов
     * @return array
     */
    public static function getTypesArray(): array;

    /**
     * получить массив всех повышающих типов
     * @return array
     */
    public static function getIncreaseTypesArray(): array;

    /**
     * получить массив всех понижающих типов
     * @return array
     */
    public static function getDecreaseTypesArray(): array;

    /**
     * трансфер данных из формы
     */
    public function getFromForm(): void;

    /**
     * добавление модели в БД
     * @return bool
     */
    public function insertModel(): bool;

    /**
     * обновление модели в БД
     * @return bool
     */
    public function updateModel(): bool;

    /**
     * удаление модели из БД
     * @return bool
     */
    public function deleteModel(): bool;

    /**
     * действия перед удалением из БД
     * @return bool
     */
    public function beforeDeleteModel(): bool;
}
