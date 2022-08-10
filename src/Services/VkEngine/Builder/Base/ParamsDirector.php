<?php

namespace Kaoriel\Vkelips\Services\VkEngine\Builder\Base;

use Kaoriel\Vkelips\Services\VkEngine\Contracts\ApiParamsBuilderContract;

class ParamsDirector
{
    public function build(ApiParamsBuilderContract $builder)
    {
        $builder->setApiMessage();
        $builder->setApiPeerId();
        $builder->setApiKeyboard();
        $builder->setApiTemplates();
        $builder->setApiAttachments();
        $builder->setApiEventId();
        $builder->setApiUserId();
        $builder->setPhoto();
        $builder->setServer();
        $builder->setHash();
        return $builder->getResult();
    }

}
