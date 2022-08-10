<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Uploads;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Builders;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendApiContract;
use Kaoriel\Vkelips\Services\VkEngine\RequestSender\SendRequest;
use Illuminate\Http\Client\Response;

class PhotosGetMessagesUploadServer implements SendApiContract
{
    public function Send($params): string|Response
    {
        $params = [
            'peer_id' => $params["object"]["peer_id"],
        ];
        $frameApi = (new Builders())->ApiFrameBuilder("photos.getMessagesUploadServer");
        $api = (new Builders())->AddParamsToFrameBuilder($params, $frameApi);
        return (new SendRequest())->getRequest($api->url);
    }
}
