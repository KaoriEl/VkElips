<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Keyboard\Simple;

use JsonException;

class KeyboardGenerator
{
    /**
     * TODO Отрефакторить эту хуйню
     */
    private array $keyboard;


    public function __construct()
    {
        $this->keyboard = [
            "one_time" => false,
            "inline" => false,
            "buttons" => [[
            ]]];
    }

    /**
     * @param array $data The delimiter for text and callback data is: "," Callback data must be written with a lowercase letter. For example $data = ["text_button,callback_data,text_button,callback_data"];
     * @param string $options = "base" use a default keyboard, "new" generate a full new keyboard
     * @param array $params $params=["one_time" => false, "slit" => false, "index" => 0, "inline" => false, "break_point" => 2]
     * @return bool|string
     * @throws JsonException
     */
    public function generate(array $data = array(), string $options = "base", array $params = array())
    {

        switch ($options) {
            case "base":
                return $this->new_base_keyboard($data, $params["split"] ?? false, $params["break_point"] ?? 2, $params["index"] ?? 0, $params["inline"] ?? false);
                break;
            case "new":
                return $this->new_keyboard($data, $params["one_time"] ?? false, $params["inline"] ?? false);
                break;
        }
    }


    /**
     * generate new keyboard based on the base provided in the class
     * @param $data
     * @return string|false
     * @throws JsonException
     */
    public function new_base_keyboard($data, $split, $break_point, $index, $inline): bool|string
    {
        if ($inline) {
            $this->keyboard["inline"] = $inline;
        }
        $keyboard = $this->keyboard;
        $count = 0;
        if (!$split) {
            foreach ($data as $pair) {
                $torn_pair = $this->regex_data($pair);
                $keyboard["buttons"][$index][]["action"] = ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label' => $torn_pair[2]];
                $index++;
            }
        } else {
            $index = 0;
            foreach ($data as $pair) {
                if ($count >= $break_point) {
                    $break_point *= 2;
                    $index++;
                }
                $count++;
                $torn_pair = $this->regex_data($pair);
                $keyboard["buttons"][$index][]["action"] = ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label' => $torn_pair[2]];

            }
        }

        return json_encode($keyboard, JSON_THROW_ON_ERROR);
    }

    /**
     * Separate text and callback data
     * @param $pair
     * @return false|string[]
     */
    public function regex_data($pair)
    {
        return explode('|', $pair);
    }

    /**
     * generate a completely new keyboard not based on the base provided in the class
     * @param $data
     * @return string|false
     * @throws JsonException
     */
    public function new_keyboard($data, $one_time, $inline): bool|string
    {
        if ($inline) {
            $keyboard = ["one_time" => $one_time, "inline" => $inline];
        } else {
            $keyboard = ["one_time" => $one_time];
        }
        foreach ($data as $pair) {
            $torn_pair = $this->regex_data($pair);
            $keyboard["buttons"][][]["action"] = ['type' => $torn_pair[0], 'payload' => $torn_pair[1], 'label' => $torn_pair[2]];

        }
        return json_encode($keyboard, JSON_THROW_ON_ERROR);

    }

    public function default_keyboard(): array
    {
        return $this->keyboard;

    }

}
