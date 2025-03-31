<?php

namespace App\Core\Engine;
class Application
{
    /**
     * Конструктор:
     * Router и Response можно внедрять извне (DI),
     * либо создавать здесь (упрощённо).
     */
    public function __construct(){

    }

    /**
     * Запуск приложения, принимая Request (иначе создаём внутри).
     */
    public function start(): void
    {

    }
}