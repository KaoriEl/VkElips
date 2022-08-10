<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

interface ApiBuilderContract
{
    public function __construct($method);

    public function setApiVersion();

    public function setApiAccessToken();

    public function setRandomId();

    public function setApiEndPoint();

    public function setApiMethod();

    public function getResult();
//    public function setApiMessage();
//    public function setApiPeerId();
//    public function setApiAttachment();

}
