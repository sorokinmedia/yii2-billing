<?php

namespace sorokinmedia\entities\Bill;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\billing\forms\BillForm;
use Throwable;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\{ActiveQuery, ActiveRecord, Exception, StaleObjectException};

/**
 * This is the model class for table "bill".
 *
 * @property integer $id
 * @property integer $user_id
 * @property double $sum
 * @property integer $updated_at
 *
 * @property integer $_admin_user_id
 * @property integer $_admin_bill_id
 *
 * @property BillForm $form
 */
abstract class AbstractBill extends ActiveRecord implements RelationInterface, BillInterface
{
    public $form;

    private $_admin_user_id;
    private $_admin_bill_id;

    /**
     * AbstractBill constructor.
     * @param array $config
     * @param BillForm|null $form
     */
    public function __construct(array $config = [], BillForm $form = null)
    {
        if ($form !== null) {
            $this->form = $form;
        }
        parent::__construct($config);
    }

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'bill';
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
            'updated_at' => Yii::t('app', 'Дата обновления'),
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
     * @return bool
     * @throws Throwable
     */
    public function insertModel(): bool
    {
        $this->getFromForm();
        if (!$this->insert()) {
            throw new Exception(Yii::t('app', 'Ошибка при добавлении счета в БД'));
        }
        return true;
    }

    /**
     * трансфер данных из формы в модель
     */
    public function getFromForm(): void
    {
        if ($this->form !== null) {
            $this->user_id = $this->form->user_id;
            $this->sum = $this->form->sum;
        }
    }

    /**
     * обновление модели в БД
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function updateModel(): bool
    {
        $this->getFromForm();
        if (!$this->update()) {
            throw new Exception(Yii::t('app', 'Ошибка при обновлении счета в БД'));
        }
        return $this->afterUpdateModel();
    }

    /**
     * действия после обновления счета
     * @return bool
     */
    abstract public function afterUpdateModel(): bool;

    /**
     * @return ActiveQuery
     */
    abstract public function getUser(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getOperations(): ActiveQuery;

    /**
     * @return int
     */
    public function getAdminUserId(): int
    {
        return $this->_admin_user_id;
    }

    /**
     * @param int $admin_user_id
     */
    public function setAdminUserId(int $admin_user_id): void
    {
        $this->_admin_user_id = $admin_user_id;
    }

    /**
     * @return int
     */
    public function getAdminBillId(): int
    {
        return $this->_admin_bill_id;
    }

    /**
     * @param int $admin_bill_id
     */
    public function setAdminBillId(int $admin_bill_id): void
    {
        $this->_admin_bill_id = $admin_bill_id;
    }
}
