<?php

namespace Kaoriel\Vkelips\Services\VkEngine\RequestSender;

use Kaoriel\Vkelips\Services\VkEngine\Contracts\SendRequestContract;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Kaoriel\Vkelips\Services\VkEngine\Logger\Logger;
use SebastianBergmann\Environment\Console;

class SendRequest implements SendRequestContract
{

    public function getRequest($url): string|Response
    {
        try {
            $response = Http::get($url);
        } catch (HttpClientException $e) {
            $response = "Не удалось отправить сообщение: ";
            (new Logger())->allLog($response . "\nMessage: " . $e->getMessage() . "\n" . "Trace: " . $e->getTraceAsString());
        }
        return $response;
    }
}
