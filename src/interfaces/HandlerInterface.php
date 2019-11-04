<?php

namespace sorokinmedia\billing\interfaces;

/**
 * Interface HandlerInterface
 * @package sorokinmedia\billing\interfaces
 */
interface HandlerInterface
{
    /**
     * выполнить хендлер
     * вернет ID добавленной операции
     * @return int
     */
    public function execute(): int;

    /**
     * получить данные необходимые в хендлере
     * @return array
     */
    public function getData(): array;

    /**
     * сгенерировать текст комментария
     * @return string
     */
    public function generateMessage(): string;
}
