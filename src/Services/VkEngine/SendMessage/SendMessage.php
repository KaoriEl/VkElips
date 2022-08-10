<?php

namespace Kaoriel\Vkelips\Services\VkEngine\SendMessage;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Builders;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendApiContract;
use Kaoriel\Vkelips\Services\VkEngine\RequestSender\SendRequest;
use Illuminate\Http\Client\Response;

class SendMessage implements SendApiContract
{
    public function Send($params): string|Response
    {
        $frameApi = (new Builders())->ApiFrameBuilder("messages.send");
        $api = (new Builders())->AddParamsToFrameBuilder($params, $frameApi);

        return (new SendRequest())->getRequest($api->url);
    }


}
