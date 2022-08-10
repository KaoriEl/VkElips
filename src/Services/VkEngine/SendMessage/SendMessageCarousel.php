<?php

namespace Kaoriel\Vkelips\Services\VkEngine\SendMessage;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Builders;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendApiContract;
use Kaoriel\Vkelips\Services\VkEngine\RequestSender\SendRequest;
use Illuminate\Support\Facades\Log;

class SendMessageCarousel implements SendApiContract
{
    public function Send($params)
    {
        $frameApi = (new Builders())->ApiFrameBuilder("messages.send");
        $api = (new Builders())->AddParamsToFrameBuilder($params, $frameApi);
        return (new SendRequest())->getRequest($api->url);
    }
}
