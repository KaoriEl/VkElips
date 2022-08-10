<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Contracts;

interface LoggerContract
{
    public function LaravelLog($msg);
    public function Phplog($msg);
    public function allLog($msg);

}