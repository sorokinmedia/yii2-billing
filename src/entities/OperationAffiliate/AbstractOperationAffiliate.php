<?php

namespace common\components\affiliate\entities\AffiliateOperation;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\billing\entities\Operation\OperationAffiliateInterface;
use Throwable;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\{ActiveQuery, ActiveRecord, Exception, StaleObjectException};

/**
 * This is the model class for table "affiliate_operation".
 *
 * @property integer $id
 * @property integer $bill_id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $affiliate_user_id
 * @property integer $model_id
 * @property float $sum
 * @property float $sum_prev
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 */
abstract class AbstractOperationAffiliate extends ActiveRecord implements RelationInterface, OperationAffiliateInterface
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'operation_affiliate';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['bill_id', 'type_id', 'sum', 'comment'], 'required'],
            [['bill_id', 'type_id', 'user_id', 'affiliate_user_id', 'model_id'], 'integer'],
            [['sum', 'sum_prev'], 'number'],
            [['comment'], 'string'],
        ];
    }

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'bill_id' => Yii::t('app', 'Счет'),
            'type_id' => Yii::t('app', 'Тип операции'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'affiliate_user_id' => Yii::t('app', 'Аффилированный пользователь'),
            'model_id' => Yii::t('app', 'Связанная модель'),
            'sum' => Yii::t('app', 'Сумма'),
            'sum_prev' => Yii::t('app', 'Сумма до операции'),
            'comment' => Yii::t('app', 'Комментарий'),
            'created_at' => Yii::t('app', 'Добавлено'),
            'updated_at' => Yii::t('app', 'Обновлено'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    abstract public function getBill(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getUser(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getAffiliateUser(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getType(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getModel(): ActiveQuery;

    /**
     * Создать модель
     * @return bool
     * @throws Exception
     */
    public function insertModel(): bool
    {
        if (!$this->save()) {
            throw new Exception(Yii::t('app', 'Ошибка при обновлении модели в БД'));
        }
        return true;
    }

    /**
     * Удаление модели
     * @return bool
     * @throws Exception
     * @throws \Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function deleteModel(): bool
    {
        if (!$this->delete()) {
            throw new Exception(Yii::t('app', 'Ошибка при удалении модели в БД'));
        }
        return true;
    }
}
