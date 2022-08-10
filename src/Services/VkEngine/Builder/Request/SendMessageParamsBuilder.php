<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Builder\Request;

use Kaoriel\Vkelips\Services\VkEngine\Contracts\ApiParamsBuilderContract;

class SendMessageParamsBuilder implements ApiParamsBuilderContract
{
    private $params;
    private $sendMessageRoute;

    public function __construct($params, $sendMessageRoute)
    {
        $this->params = $params;
        $this->sendMessageRoute = $sendMessageRoute;

    }

    public function setApiMessage()
    {
        if (isset($this->params["text"])) {
            $this->sendMessageRoute->params["message"] = $this->params["text"];
        }
    }

    public function setApiPeerId()
    {
        if (isset($this->params["peer_id"])) {
            $this->sendMessageRoute->params["peer_id"] = $this->params["peer_id"];
        }
    }

    public function setApiKeyboard()
    {
        if (isset($this->params["keyboard"])) {
            $this->sendMessageRoute->params["keyboard"] = $this->params["keyboard"];
        }
    }

    public function setApiTemplates()
    {
        if (isset($this->params["template"])) {
            $this->sendMessageRoute->params["template"] = $this->params["template"];
        }
    }

    public function setApiAttachments()
    {
        if (isset($this->params["attachment"])) {
            $this->sendMessageRoute->params["attachment"] = $this->params["attachment"];
        }
    }

    public function setApiEventId()
    {
        if (isset($this->params["event_id"])) {
            $this->sendMessageRoute->params["event_id"] = $this->params["event_id"];
        }
    }

    public function setApiUserId()
    {
        if (isset($this->params["user_id"])) {
            $this->sendMessageRoute->params["user_id"] = $this->params["user_id"];
        }
    }


    public function setPhoto()
    {
        if (isset($this->params["photo"])) {
            $this->sendMessageRoute->params["photo"] = $this->params["photo"];
        }
    }

    public function setServer()
    {
        if (isset($this->params["server"])) {
            $this->sendMessageRoute->params["server"] = $this->params["server"];
        }
    }

    public function setHash()
    {
        if (isset($this->params["hash"])) {
            $this->sendMessageRoute->params["hash"] = $this->params["hash"];
        }
    }

    public function getResult()
    {
        $this->sendMessageRoute->url .= http_build_query($this->sendMessageRoute->params);
        return $this->sendMessageRoute;
    }


}
