<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Carousel;

use Exception;
use JsonException;

class Carousel
{
    protected array $elements = []; // Список элементов карусели

    /**
     * Конструктор карусели
     *
     * @param VK $API - объект VK API
     * [@param array $elements = []] - список элементов для карусели
     */
    public function __construct(array $elements = [])
    {

        foreach ($elements as $id => $element)
            if ($element instanceof Element)
                $this->elements[] = $element;

            else throw new Exception ('Array of elements must contain only Carousel Elements, ' . get_class($element) . ' processed at index ' . $id);
    }

    /**
     * Добавить элемент в карусель
     *
     * @param Element $element - элемент для добавления
     *
     * @return Carousel
     */
    public function add(Element $element): Carousel
    {
        $this->elements[] = $element;

        return $this;
    }

    /**
     * Добавить элемент в карусель по заданному индексу
     *
     * @param int $id - индекс для добавления
     * @param Element $element - элемент для добавления
     *
     * @return Carousel
     */
    public function set(int $id, Element $element): Carousel
    {
        $this->elements[$id] = $element;

        return $this;
    }

    /**
     * Удаление элемента из карусели
     *
     * @param int $id - индекс элемента
     *
     * @return Carousel
     */
    public function remove(int $id): Carousel
    {
        unset ($this->carousel[$id]);

        return $this;
    }

    /**
     * Получение списка элементов или самого элемента
     *
     * [@param int $id = null] - индекс элемента для получения
     *
     * @return mixed
     */
    public function get(int $id = null)
    {
        return $id === null ?
            $this->elements : $this->elements[$id];
    }

    /**
     * Получение массива карусели
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'type' => 'carousel',
            'elements' => array_map(static fn($element) => $element->toArray(), $this->elements)
        ];
    }


    /**
     * Получение массива карусели
     *
     * @return string|false
     * @throws JsonException
     */
    public function toJson(): bool|string
    {
        return json_encode([
            'type' => 'carousel',
            'elements' => array_map(static fn($element) => $element->toArray(), $this->elements)
        ], JSON_THROW_ON_ERROR);
    }

}
