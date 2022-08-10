<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

interface ElementBuilderContract
{
    public function addText();

    public function addButton();

    public function addPhoto();

    public function getResult();
}
