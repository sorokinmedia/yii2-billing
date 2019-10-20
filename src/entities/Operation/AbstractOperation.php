<?php

namespace sorokinmedia\entities\Operation;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\billing\forms\OperationForm;
use Throwable;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\{ActiveQuery, ActiveRecord, Exception, StaleObjectException};

/**
 * Class Operation
 * @package sorokinmedia\entities\Operation
 *
 * @property integer $id
 * @property integer $bill_id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $model_id
 * @property float $sum
 * @property float $sum_prev
 * @property string $comment
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property OperationForm $form
 */
abstract class AbstractOperation extends ActiveRecord implements RelationInterface, OperationInterface
{
    public $form;

    /**
     * AbstractOperation constructor.
     * @param array $config
     * @param OperationForm|null $form
     */
    public function __construct(array $config = [], OperationForm $form = null)
    {
        if ($form !== null) {
            $this->form = $form;
        }
        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['bill_id', 'type_id', 'sum', 'comment'], 'required'],
            [['bill_id', 'type_id', 'user_id', 'model_id'], 'integer'],
            [['sum', 'sum_prev'], 'number'],
            [['comment'], 'string'],
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
    abstract public function getType(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getModel(): ActiveQuery;

    /**
     * @return ActiveQuery
     */
    abstract public function getUser(): ActiveQuery;

    /**
     * @return array
     */
    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
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
            throw new Exception(Yii::t('app', 'Ошибка при добавлении операции в БД'));
        }
        return true;
    }

    /**
     * трансфер данных из формы в модель
     */
    public function getFromForm(): void
    {
        if ($this->form !== null) {
            $this->bill_id = $this->form->bill_id;
            $this->type_id = $this->form->type_id;
            $this->user_id = $this->form->user_id;
            $this->model_id = $this->form->model_id;
            $this->sum = $this->form->sum;
            $this->sum_prev = $this->form->sum_prev;
            $this->comment = $this->form->comment;
        }
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function updateModel(): bool
    {
        $this->getFromForm();
        if (!$this->save()) {
            throw new Exception(Yii::t('app', 'Ошибка при обновлении операции в БД'));
        }
        return true;
    }

    /**
     * @return bool
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function deleteModel(): bool
    {
        $this->getFromForm();
        if (!$this->delete()) {
            throw new Exception(Yii::t('app', 'Ошибка при удалении операции в БД'));
        }
        return true;
    }
}
