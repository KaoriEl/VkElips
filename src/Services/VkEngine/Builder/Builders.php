<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Builder;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Base\ApiDirector;
use Kaoriel\Vkelips\Services\VkEngine\Builder\Base\ParamsDirector;
use Kaoriel\Vkelips\Services\VkEngine\Builder\Request\SendMessageParamsBuilder;
use Kaoriel\Vkelips\Services\VkEngine\Builder\Request\SendMessageRequestBuilder;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\BuildersContract;

class Builders implements BuildersContract
{

    public function ApiFrameBuilder($method)
    {
        $director = new apiDirector();
        $sendMessageRequestBuilder = new SendMessageRequestBuilder($method);
        return $director->build($sendMessageRequestBuilder);
    }

    public function AddParamsToFrameBuilder($params, $frameApi)
    {
        $directorParams = new ParamsDirector();
        $setParamsBuilder = new SendMessageParamsBuilder($params, $frameApi);
        return $directorParams->build($setParamsBuilder);
    }
}
