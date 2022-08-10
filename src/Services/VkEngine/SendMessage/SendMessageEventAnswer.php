<?php

namespace Kaoriel\Vkelips\Services\VkEngine\SendMessage;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Builders;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendApiContract;
use Kaoriel\Vkelips\Services\VkEngine\RequestSender\SendRequest;
use Illuminate\Http\Client\Response;

class SendMessageEventAnswer implements SendApiContract
{

    public function Send($params): string|Response
    {
        $params = [
            'event_id' => $params["object"]["event_id"],
            'user_id' => $params["object"]["user_id"],
            'peer_id' => $params["object"]["peer_id"],
        ];
        $frameApi = (new Builders())->ApiFrameBuilder("messages.sendMessageEventAnswer");
        $api = (new Builders())->AddParamsToFrameBuilder($params, $frameApi);

        return (new SendRequest())->getRequest($api->url);
    }

}
