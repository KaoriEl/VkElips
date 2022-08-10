<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Carousel\Elements;

use Kaoriel\Vkelips\Services\VkEngine\Carousel\Element;
use Kaoriel\Vkelips\Services\VkEngine\Keyboard\Harder\Buttons;

class Text extends Element
{
    public string $title; // Заголовок элемента
    public string $description; // Описание элемента
    public string $photo = "-109837093_457242811"; //id фото;

    /**
     * Конструктор элемента
     *
     * @param string $title - заголовок элемента
     * [@param string $description = null] - описание элемента
     * [@param Buttons $buttons = null]    - кнопки элемента
     */
    public function __construct(string $title, string $description = null, Buttons $buttons = null)
    {
        $this->title = $title;
        $this->description = $description ?: '';

        $this->buttons = $buttons ?: new Buttons;
    }

    /**
     * Получение массива представления элемента
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'photo_id' => $this->photo,
            'buttons' => $this->getButtons(),
            'action' => $this->action
        ];
    }
}
