<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Logger;
use Illuminate\Support\Facades\Log;

class Logger implements \Kaoriel\Vkelips\Services\VkEngine\Contracts\LoggerContract
{

    public function LaravelLog($msg)
    {
        Log::error($msg);
    }

    public function Phplog($msg)
    {
        error_log($msg);
    }

    public function allLog($msg)
    {
        Log::error($msg);
        error_log($msg);
    }
}