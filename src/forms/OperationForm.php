<?php

namespace sorokinmedia\billing\forms;

use sorokinmedia\entities\Operation\AbstractOperation;
use Yii;
use yii\base\Model;

/**
 * Class OperationForm
 * @package sorokinmedia\billing\forms
 *
 * @property integer $bill_id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $model_id
 * @property float $sum
 * @property float $sum_prev
 * @property string $comment
 */
class OperationForm extends Model
{
    public $bill_id;
    public $type_id;
    public $user_id;
    public $model_id;
    public $sum;
    public $sum_prev;
    public $comment;

    /**
     * OperationForm constructor.
     * @param array $config
     * @param AbstractOperation|null $operation
     */
    public function __construct(array $config = [], AbstractOperation $operation = null)
    {
        if ($operation !== null) {
            $this->bill_id = $operation->bill_id;
            $this->type_id = $operation->type_id;
            $this->user_id = $operation->user_id;
            $this->model_id = $operation->model_id;
            $this->sum = $operation->sum;
            $this->sum_prev = $operation->sum_prev;
            $this->comment = $operation->comment;
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
            'bill_id' => Yii::t('app', 'Счет'),
            'type_id' => Yii::t('app', 'Тип операции'),
            'user_id' => Yii::t('app', 'Пользователь'),
            'model_id' => Yii::t('app', 'Связанная модель'),
            'sum' => Yii::t('app', 'Сумма'),
            'sum_prev' => Yii::t('app', 'Сумма до операции'),
            'comment' => Yii::t('app', 'Комментарий'),
        ];
    }
}
