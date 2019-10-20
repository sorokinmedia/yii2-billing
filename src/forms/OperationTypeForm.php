<?php

namespace sorokinmedia\billing\forms;

use sorokinmedia\billing\entities\OperationType\AbstractOperationType;
use Yii;
use yii\base\Model;

/**
 * Class OperationTypeForm
 * @package sorokinmedia\forms
 *
 * @property string $name
 * @property string $role
 * @property integer $transact_type
 */
class OperationTypeForm extends Model
{
    public $name;
    public $role;
    public $transact_type;

    /**
     * OperationTypeForm constructor.
     * @param array $config
     * @param AbstractOperationType|null $operationType
     */
    public function __construct(array $config = [], AbstractOperationType $operationType = null)
    {
        if ($operationType !== null) {
            $this->name = $operationType->name;
            $this->role = $operationType->role;
            $this->transact_type = $operationType->transact_type;
        }
        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['name', 'role', 'transact_type'], 'required'],
            [['name', 'role'], 'string'],
            [['name'], 'string', 'max' => 300],
            [['role'], 'string', 'max' => 255],
            [['transact_type'], 'in', 'range' => [AbstractOperationType::TYPE_INCREASE, AbstractOperationType::TYPE_DECREASE]],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels(): array
    {
        return [
            'name' => Yii::t('app', 'Название'),
            'transact_type' => Yii::t('app', 'Тип транзакции'),
            'role' => Yii::t('app', 'Роль'),
        ];
    }
}
