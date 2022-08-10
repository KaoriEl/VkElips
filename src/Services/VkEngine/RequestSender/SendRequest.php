<?php

namespace Kaoriel\Vkelips\Services\VkEngine\RequestSender;

use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendRequestContract;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class SendRequest implements SendRequestContract
{

    public function getRequest($url): string|Response
    {
        try {
            $response = Http::get($url);
        } catch (HttpClientException $e) {
            $response = "Не удалось отправить сообщение: ";
            Log::error($response, (array)$e);
            error_log($response . "\n Message: " . $e->getMessage() . "\n" . "Trace: " . $e->getTraceAsString());
        }
        return $response;
    }
}
