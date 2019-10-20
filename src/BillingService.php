<?php

namespace sorokinmedia\billing;

use yii\base\Component;

/**
 * Class BillingService
 * @package sorokinmedia\billing
 */
class BillingService extends Component
{
    public $services;
    public $outboxes;
    private $_loadedServices;
    private $_loadedOutboxes;

    /**
     * Services Initialization
     * @return void
     */
    public function init(): void
    {
        parent::init();
        foreach ($this->services as $name => $class) {
            $this->_loadedServices[$name] = new $class([
                //todo: add params 'viewPath' => $this->viewPath
            ]);
        }
        foreach ($this->outboxes as $name => $class) {
            $this->_loadedOutboxes[$name] = $class;
        }
    }

    /**
     * @param HandlerInterface $handler
     * @return void
     */
    public function send(HandlerInterface $handler): void
    {
        $outboxes = $handler->execute();
        foreach ($this->_loadedServices as $service) {
            /** @var ServiceInterface $service */
            foreach ($outboxes as $baseOutbox) {
                $service->send($baseOutbox, $this->_loadedOutboxes[$service->getName()]);
            }
        }
    }
}
