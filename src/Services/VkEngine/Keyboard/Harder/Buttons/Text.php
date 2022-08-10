<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Keyboard\Harder\Buttons;

use Kaoriel\Vkelips\Services\VkEngine\Keyboard\Buttons\Button;

class Text extends \Kaoriel\Vkelips\Services\VkEngine\Keyboard\Harder\Button
{
    public string $color = 'primary'; // Цвет кнопки (primary, secondary, positive или negative)

    /**
     * Конструктор
     *
     * @param string $label - текст кнопки
     * [@param array $payload = []] - нагрузка кнопки
     */
    public function __construct(string $label, array $payload = [])
    {
        $this->action = [
            'type' => 'text',
            'label' => $label,
            'payload' => $payload
        ];
    }

    /**
     * Установка цвета кнопки
     *
     * @param string $color - цвет для установки (см. выше)
     *
     * @return Button - возвращает сам себя
     */
    public function setColor(string $color): Button
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Получение массива кнопки
     *
     * @return array - возвращает массив кнопки
     */
    public function toArray(): array
    {
        return [
            'color' => $this->color,
            'action' => $this->action
        ];
    }

}
