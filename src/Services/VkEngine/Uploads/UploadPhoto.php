<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Uploads;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Builders;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendApiContract;
use App\Services\VkEngine\EntryPointVk;
use Kaoriel\Vkelips\Services\VkEngine\RequestSender\SendRequest;
use Exception;
use Illuminate\Support\Facades\Http;
use JsonException;

class UploadPhoto implements SendApiContract
{
    /**
     * @throws JsonException
     * @throws Exception
     */
    public function Send($params)
    {
        $server = json_decode((new EntryPointVk())->PhotosGetMessagesUploadServer($params)->body(), true, 512, JSON_THROW_ON_ERROR);

        $response = json_decode(Http::attach(
            'file', file_get_contents($params["object"]["file_url"]), 'photo.jpg'
        )->post($server["response"]["upload_url"])->body(), true, 512, JSON_THROW_ON_ERROR);

        $params = array(
            'photo' => $response["photo"],
            'server' => $response["server"],
            'hash' => $response["hash"],
        );

        $frameApi = (new Builders())->ApiFrameBuilder("photos.saveMessagesPhoto");
        $api = (new Builders())->AddParamsToFrameBuilder($params, $frameApi);
        return (new SendRequest())->getRequest($api->url);

    }

    private function upload()
    {

    }
}
