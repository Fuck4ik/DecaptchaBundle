<?php

namespace Omasn\DecaptchaBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class AnticaptchaReCaptchaProxeless extends \jumper423\decaptcha\services\AnticaptchaReCaptchaProxeless
{
    /**
     * RuCaptcha constructor.
     *
     * @param $params
     * @param ContainerInterface $oContainer
     */
    public function __construct($params, $oContainer)
    {
        parent::__construct($params);
        $this->setParam(self::ACTION_FIELD_KEY, $oContainer->getParameter('omasn_decaptcha.anticaptcha.api_key'));

    }
}