<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Keyboard\Harder\Buttons;

class Location
{
    /**
     * Конструктор
     *
     * [@param array $payload = []] - нагрузка кнопки
     */
    public function __construct(array $payload = [])
    {
        $this->action = [
            'type' => 'location',
            'payload' => $payload
        ];
    }
}
