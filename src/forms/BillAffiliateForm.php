<?php

namespace sorokinmedia\billing\forms;

use sorokinmedia\billing\entities\BillAffiliate\AbstractBillAffiliate;
use Yii;
use yii\base\Model;

/**
 * Class BillAffiliateForm
 * @package sorokinmedia\billing\forms
 *
 * @property integer $user_id
 * @property float $sum
 */
class BillAffiliateForm extends Model
{
    public $user_id;
    public $sum;

    /**
     * BillAffiliateForm constructor.
     * @param array $config
     * @param AbstractBillAffiliate|null $bill
     */
    public function __construct(array $config = [], AbstractBillAffiliate $bill = null)
    {
        if ($bill !== null) {
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
