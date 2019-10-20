<?php

namespace sorokinmedia\billing\entities\OperationType;

use sorokinmedia\ar_relations\RelationInterface;
use sorokinmedia\billing\forms\OperationTypeForm;
use Throwable;
use Yii;
use yii\db\{ActiveRecord, Exception, StaleObjectException};

/**
 * This is the model class for table "operation_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $transact_type
 * @property string $role
 */
abstract class AbstractOperationType extends ActiveRecord implements RelationInterface, OperationTypeInterface
{
    public const TYPE_INCREASE = 0;
    public const TYPE_DECREASE = 1;
    public $form;

    /**
     * AbstractNotificationType constructor.
     * @param array $config
     * @param OperationTypeForm|null $form
     */
    public function __construct(array $config = [], OperationTypeForm $form = null)
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
        return 'operation_type';
    }

    /**
     * получаем дефолтный набор для роли
     * @param string $role
     * @return array
     */
    public static function findByRole(string $role): array
    {
        return static::find()->where(['role' => $role])->all();
    }

    /**
     * @return array
     */
    public static function getTypesArray(): array
    {
        return static::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->orderBy(['name' => SORT_ASC])
            ->column();
    }

    /**
     * @return array
     */
    public static function getIncreaseTypesArray(): array
    {
        return static::find()
            ->select(['name', 'id'])
            ->where(['transact_type' => self::TYPE_INCREASE])
            ->indexBy('id')
            ->orderBy(['name' => SORT_ASC])
            ->column();
    }

    /**
     * @return array
     */
    public static function getDecreaseTypesArray(): array
    {
        return static::find()
            ->select(['name', 'id'])
            ->where(['transact_type' => self::TYPE_DECREASE])
            ->indexBy('id')
            ->orderBy(['name' => SORT_ASC])
            ->column();
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
            [['transact_type'], 'in', 'range' => [self::TYPE_INCREASE, self::TYPE_DECREASE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название'),
            'transact_type' => Yii::t('app', 'Тип транзакции'),
            'role' => Yii::t('app', 'Роль'),
        ];
    }

    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     */
    public function insertModel(): bool
    {
        $this->getFromForm();
        if (!$this->insert()) {
            throw new Exception(Yii::t('app', 'Ошибка при добавлении нового типа операции в БД'));
        }
        $this->refresh();
        return true;
    }

    /**
     * трансфер данных из формы
     */
    public function getFromForm(): void
    {
        if ($this->form !== null) {
            $this->name = $this->form->name;
            $this->role = $this->form->role;
            $this->transact_type = $this->form->transact_type;
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
            throw new Exception(Yii::t('app', 'Ошибка при сохранении типа операции в БД'));
        }
        return true;
    }

    /**
     * @return bool
     * @throws Exception
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function deleteModel(): bool
    {
        $this->beforeDeleteModel();
        if (!$this->delete()) {
            throw new Exception(Yii::t('app', 'Ошибка при удалении типа операции из БД'));
        }
        return true;
    }

    /**
     * @return bool
     */
    abstract public function beforeDeleteModel(): bool;
}
