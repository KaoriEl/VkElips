<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Keyboard\Harder\Buttons;

class VKPay
{
    /**
     * Конструктор
     *
     * @param string $hash - конфигурация оплаты VK Pay
     * [@param array $payload = []] - нагрузка кнопки
     */
    public function __construct(string $hash, array $payload = [])
    {
        $this->action = [
            'type' => 'vkpay',
            'hash' => $hash,
            'payload' => $payload
        ];
    }
}
