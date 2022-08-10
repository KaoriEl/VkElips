<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Builder\Request;

use Kaoriel\Vkelips\Services\VkEngine\Builder\Base\Api;
use Kaoriel\Vkelips\Services\VkEngine\Contracts\ApiBuilderContract;
use Exception;

class SendMessageRequestBuilder implements ApiBuilderContract
{

    private Api $apiRequest;
    private $method;


    public function __construct($method)
    {
        $this->method = $method;
        $this->apiRequest = new Api();
    }

    public function setApiVersion()
    {
        $this->apiRequest->params["v"] = config("app.VK_API_VERSION");
    }

    public function setApiAccessToken()
    {
        $this->apiRequest->params["access_token"] = config("app.VK_BOT_API_KEY");
    }


    /**
     * @throws Exception
     */
    public function setRandomId()
    {
        $this->apiRequest->params["random_id"] = random_int(1, 999999999999999);
    }


    public function setApiEndPoint()
    {
        $this->apiRequest->endPoint = config("app.VK_API_ENDPOINT");
    }

    public function setApiMethod()
    {
        $this->apiRequest->method = $this->method;
    }


    public function getResult()
    {
        $this->apiRequest->url = $this->apiRequest->endPoint . $this->apiRequest->method . '?';
        return $this->apiRequest;
    }


}
