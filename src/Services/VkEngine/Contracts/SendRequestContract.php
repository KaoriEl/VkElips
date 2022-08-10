<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

use Illuminate\Http\Client\Response;

interface SendRequestContract
{
    public function getRequest($url): string|Response;
    /*
     * TODO еще методов наделайте
     */

}
