<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Builder\Base;

use Kaoriel\Vkelips\Services\VkEngine\Contracts\ApiBuilderContract;

class ApiDirector
{
    public function build(ApiBuilderContract $builder)
    {
        $builder->setApiVersion();
        $builder->setApiAccessToken();
        $builder->setRandomId();
        $builder->setApiEndPoint();
        $builder->setApiMethod();

        return $builder->getResult();
    }
}
