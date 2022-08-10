<?php

namespace Kaoriel\Vkelips\Services\VkEngine;

use Kaoriel\Vkelips\Services\VkEngine\Contracts\EntryPointVkContract;
use Kaoriel\Vkelips\Services\VkEngine\SendMessage\SendMessage;
use Kaoriel\Vkelips\Services\VkEngine\SendMessage\SendMessageCarousel;
use Kaoriel\Vkelips\Services\VkEngine\SendMessage\SendMessageEventAnswer;
use Kaoriel\Vkelips\Services\VkEngine\Uploads\PhotosGetMessagesUploadServer;
use Kaoriel\Vkelips\Services\VkEngine\Uploads\UploadPhoto;
use Illuminate\Http\Client\Response;

class EntryPointVk implements EntryPointVkContract
{

    public function SendMessage($data = ["text" => "oops", "peer_id" => "9999999999"]): string|Response
    {
        return (new SendMessage())->Send($data);
    }


    public function SendMessageEventAnswer($data = ["event_id" => "1", "user_id" => "1", "peer_id" => "9999999999"]): string|Response
    {
        return (new SendMessageEventAnswer())->Send($data);
    }

    public function UploadImage($data = ["event_id" => "1", "user_id" => "1", "peer_id" => "9999999999"]): string|Response
    {
        return (new UploadPhoto())->Send($data);
    }

    public function PhotosGetMessagesUploadServer($data = ["event_id" => "1", "user_id" => "1", "peer_id" => "9999999999"]): string|Response
    {
        return (new PhotosGetMessagesUploadServer())->Send($data);
    }


    public function SendMessageCarousel($data = ["text" => "1", "peer_id" => "1", 'template' => '1']): string|Response
    {
        return (new SendMessageCarousel())->Send($data);
    }


}
