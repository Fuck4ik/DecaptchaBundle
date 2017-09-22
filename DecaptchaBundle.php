<?php

namespace Omasn\DecaptchaBundle;

use Omasn\DecaptchaBundle\DependencyInjection\OmasnDecaptchaExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DecaptchaBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new OmasnDecaptchaExtension();
    }
}
