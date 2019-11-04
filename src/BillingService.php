<?php

namespace sorokinmedia\billing;

use sorokinmedia\billing\interfaces\HandlerInterface;
use yii\base\Component;

/**
 * Class BillingService
 * @package sorokinmedia\billing
 */
class BillingService extends Component
{
    /**
     * Services Initialization
     * @return void
     */
    public function init(): void
    {
        parent::init();
    }

    /**
     * @param HandlerInterface $handler
     * @return int
     */
    public function send(HandlerInterface $handler): int
    {
        return $handler->execute();
    }
}
