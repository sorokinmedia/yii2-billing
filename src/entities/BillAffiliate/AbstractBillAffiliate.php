<?php

namespace sorokinmedia\billing\entities\BillAffiliate;

use sorokinmedia\ar_relations\RelationInterface;
use Throwable;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\{ActiveQuery, ActiveRecord, Exception};

/**
 * This is the model class for table "affiliate_bill".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $sum
 */
abstract class AbstractBillAffiliate extends ActiveRecord implements RelationInterface, BillAffiliateInterface
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'bill_affiliate';
    }

    /**
     * статический конструктор
     * @param int $user_id
     * @return self
     * @throws Exception
     * @throws Throwable
     */
    public static function create(int $user_id): self
    {
        $bill_affiliate = self::findOne(['user_id' => $user_id]);
        if ($bill_affiliate instanceof self) {
            return $bill_affiliate;
        }
        $bill_affiliate = new static([
            'user_id' => $user_id,
            'sum' => 0,
        ]);
        if (!$bill_affiliate->insert()) {
            throw new Exception(Yii::t('app', 'Ошибка при создании счета'));
        }
        return $bill_affiliate;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['sum'], 'number'],
            [['sum'], 'default', 'value' => 0]
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'sum' => Yii::t('app', 'Сумма на счете'),
            'updated_at' => Yii::t('app', 'Дата обновления')
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
                'createdAtAttribute' => false,
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }

    /**
     * @return ActiveQuery
     */
    abstract public function getUser(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getOperations(): ActiveQuery;

    /**
     * обновление модели
     * @return bool
     * @throws Exception
     */
    public function updateModel(): bool
    {
        if (!$this->save()) {
            throw new Exception(Yii::t('app', 'Ошибка при обновлении модели в БД'));
        }
        return true;
    }
}
