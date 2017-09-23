<?php

namespace Omasn\DecaptchaBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class RuCaptcha extends \jumper423\decaptcha\services\RuCaptcha
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
        $this->setParams([
            self::ACTION_FIELD_KEY => $oContainer->getParameter('omasn_decaptcha.ru_captcha.api_key'),
        ]);

    }

    public function init()
    {
        parent::init();
        $this->actions[static::ACTION_RECOGNIZE][static::ACTION_FIELDS][static::ACTION_FIELD_SOFT_ID][static::PARAM_SLUG_DEFAULT] = 1709;
    }
}