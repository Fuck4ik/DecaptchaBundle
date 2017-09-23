<?php

namespace Omasn\DecaptchaBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Anticaptcha extends \jumper423\decaptcha\services\Anticaptcha
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

    public function init()
    {
        parent::init();
        $this->actions[static::ACTION_RECOGNIZE][static::ACTION_FIELDS][static::ACTION_FIELD_SOFT_ID][static::PARAM_SLUG_DEFAULT] = 825;
    }
}