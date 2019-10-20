<?php
namespace sorokinmedia\billing\forms;

use sorokinmedia\entities\Bill\AbstractBill;
use Yii;
use yii\base\Model;

/**
 * Class BillForm
 * @package sorokinmedia\billing\forms
 *
 * @property integer $user_id
 * @property float $sum
 */
class BillForm extends Model
{
    public $user_id;
    public $sum;

    /**
     * BillForm constructor.
     * @param array $config
     * @param AbstractBill|null $bill
     */
    public function __construct(array $config = [], AbstractBill $bill = null)
    {
        if ($bill !== null){
            $this->user_id = $bill->user_id;
            $this->sum = $bill->sum;
        }
        parent::__construct($config);
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
            'user_id' => Yii::t('app', 'Пользователь'),
            'sum' => Yii::t('app', 'Сумма на счете'),
        ];
    }
}
