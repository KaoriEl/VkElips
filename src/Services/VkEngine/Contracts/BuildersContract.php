<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

interface BuildersContract
{
    public function ApiFrameBuilder($method);

    public function AddParamsToFrameBuilder($params, $frameApi);

}
