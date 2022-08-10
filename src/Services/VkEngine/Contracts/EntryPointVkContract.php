<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

use Illuminate\Http\Client\Response;

interface EntryPointVkContract
{
    public function SendMessage($data): string|Response;

    public function SendMessageEventAnswer($data): string|Response;

    public function UploadImage($data): string|Response;

    public function SendMessageCarousel($data): string|Response;

}
