<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

interface ApiParamsBuilderContract
{

    public function __construct($params, $sendMessageRoute);

    public function setApiMessage();

    public function setApiPeerId();

    public function setApiKeyboard();

    public function setApiTemplates();

    public function setApiAttachments();

    public function setApiEventId();

    public function setApiUserId();

    public function setPhoto();

    public function setServer();

    public function setHash();

    public function getResult();

}
